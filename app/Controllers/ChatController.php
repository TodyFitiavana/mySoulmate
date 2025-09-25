<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\MembreConversationModel;
use App\Services\ConversationServices;
use App\Models\MessageModel;

class ChatController extends BaseController
{
    public function show()
    {
        $user_id = session('user_id'); // utilisateur courant
        $db = \Config\Database::connect();

        // Sous-requête : toutes les conversations de l'utilisateur
        $subQuery = $db->table('membre_conversation')
            ->select('id_conversation')
            ->where('id_user', $user_id)
            ->getCompiledSelect();

        // Requête principale : récupérer les autres utilisateurs dans ces conversations
        $builder = $db->table('utilisateur u')
            ->select('DISTINCT u.id, u.first_name, u.last_name, u.matricule, u.email, u.name_profile, u.pdp', false)
            ->join('membre_conversation mc', 'mc.id_user = u.id')
            ->where("mc.id_conversation IN ($subQuery)", null, false)
            ->where('u.id !=', $user_id);
        $users = $builder->get()->getResultArray(); // <-- retourne un tableau associatif

        return view('Authentification/Chat', ['users' => $users]);
    }

    public function show_mess($id_recepteur)
    {
        $user_id = session('user_id');
        $model = new MessageModel();
        $user_model = new AuthModel();

        $messages = $model
            ->groupStart()
            ->where('id_expediteur', $user_id)
            ->where('id_recepteur', $id_recepteur)
            ->groupEnd()
            ->orGroupStart()
            ->where('id_expediteur', $id_recepteur)
            ->where('id_recepteur', $user_id)
            ->groupEnd()
            ->orderBy('created_at', 'ASC') // tri par date
            ->findAll();

        $exp_user = $user_model->where('id', $id_recepteur)->find();
        // dd($exp_user);
        return view('Authentification/Message', ['messages' => $messages, 'id_recepteur' => $id_recepteur, 'name_profile' => $exp_user[0]['name_profile'], 'pdp' => $exp_user[0]['pdp']]);
    }

    public function fetchMessages($id_recepteur)
    {
        $user_id = session('user_id');
        $model = new MessageModel();

        $messages = $model
            ->groupStart()
            ->where('id_expediteur', $user_id)
            ->where('id_recepteur', $id_recepteur)
            ->groupEnd()
            ->orGroupStart()
            ->where('id_expediteur', $id_recepteur)
            ->where('id_recepteur', $user_id)
            ->groupEnd()
            ->orderBy('created_at', 'ASC')
            ->findAll();

        return $this->response->setJSON($messages);
    }


    public function mess()
    {
        $model_membre_conversation = new MembreConversationModel();

        $receiver_name = $this->request->getPost('receiver_name');
        $message = "Hello babe ".$receiver_name;
        $receiver_id = $this->request->getPost('receiver_id');
        $sender_id = session('user_id');

        $conversation_service = new ConversationServices();
        $conversation_exist = $conversation_service->getConversation($sender_id, $receiver_id);

        if ($conversation_exist) {
            $conversation_service->addMessage($message, $conversation_exist->id, $sender_id, $receiver_id);
            return redirect()->to("/chat1/{$receiver_id}");
        }
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            //1. Insersation new conversation
            $conversation_id = $conversation_service->insertionConversation();

            // 2. Ajouter les membres
            foreach ([$receiver_id, $sender_id] as $user_id) {
                $model_membre_conversation->insert([
                    'id_conversation' => $conversation_id,
                    'id_user' => $user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }

            // 3. Ajouter le message
            $conversation_service->addMessage($message, $conversation_id, $sender_id, $receiver_id);

            if ($db->transStatus() === false) {
                $db->transRollback();
                return "Erreur lors de l'insertion.";
            } else {
                $db->transCommit();
                return "<script>alert('Message envoyé avec succès !'); window.location.href='/chat1/{$receiver_id}';</script>";
            }
            return redirect()->to("/chat1/{$receiver_id}");
        } catch (\Exception $e) {
            $db->transRollback();
            return "Erreur : " . $e->getMessage();
        }
    }
}
