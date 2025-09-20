<?php

namespace App\Services;

use App\Models\ConversationModel;
use App\Models\MessageModel;

class ConversationServices
{
    public  function getConversation($sender_id, $receiver_id)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('conversation c')
            ->select('c.*, COUNT(DISTINCT mc.id_user) as user_count')
            ->join('membre_conversation mc', 'mc.id_conversation = c.id')
            ->whereIn('mc.id_user', [$sender_id, $receiver_id])
            ->groupBy('c.id')
            ->having('user_count = 2');

        $conversation = $builder->get()->getRow();
        return $conversation;
    }

    public function insertionConversation()
    {
        $model_conversation = new ConversationModel();
        $model_conversation->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $model_conversation->getInsertID();
    }

    public function addMessage($message, $conversation_id, $sender_id, $receiver_id)
    {
        $model_message = new MessageModel();
        $model_message->insert([
            'contenu' => $message, // <-- utilisation de la variable récupérée
            'id_conversation' => $conversation_id,
            'id_expediteur' => $sender_id,
            'id_recepteur' => $receiver_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
