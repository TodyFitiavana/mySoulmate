<?php
namespace App\Controllers;

use App\Models\PubModel;
use App\Models\LikeModel;
class Pub extends BaseController
{
    // Mur général (tous les posts)
    public function allPublication()
    {
        $pubModel = new PubModel();
        $data['publication'] = $pubModel->getAllPublications();
        return view('PublicationView', $data);
    }

    // Mur personnel (posts utilisateur connecté)
    public function index($userId = null)
    {
        $pubModel = new PubModel();

        if (!$userId) {
            $userId = session()->get('user_id');
        }

        $data['publication'] = $pubModel->getPublicationsByUser($userId);

        return view('PublicationView', $data);
    }

    // Création de publication
    public function creation($userId = null)
    {
        $pubModel = new PubModel();

        if (!$userId) {
            $userId = session()->get('user_id');
        }

        if ($this->request->getPost()) {
            $imageFile = $this->request->getFile('image');
            $imageNom = null;

            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $imageNom = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH . 'public/uploads', $imageNom);
            }
            $data = [
                'contenu'        => $this->request->getPost('contenu'),
                'image'          => $imageNom,
                '_date'          => date('Y-m-d H:i:s'),
                'id_utilisateur' => $userId
            ];

            $pubModel->save($data);

            return redirect()->to(base_url($userId.'/AllPublication'));
        }

        return view('Publication');
    }


    public function suppression($pubId, $userId)
    {
        $pubModel = new PubModel();

        $publication = $pubModel->find($pubId);
        if ($publication && $publication['id_utilisateur'] == $userId) {
            $pubModel->delete($pubId);
            return redirect()->to(base_url($userId.'/AllPublication'));
        } else {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer cette publication.');
        }
    }

    public function likeAjout($publicationID,$userId=null){
        $likeModel = new LikeModel();
        $pubModel = new PublicationModel();
        $publication = $pubModel->find($publicationID);
        $publication = $pubModel->getPublicationWithUser($publicationID);
        $auteurName = $publication['userName'];
        $message = 'salut'.$auteurName;

        if (!$userId) {
            $userId = session()->get('id_utilisateur');
        }

        $data = [
            'id_utilisateur'=>$userId,
            'id_publication'=>$publicationID,
            'message'=> $message
        ];

        $likeModel->save($data);

        return redirect()->to(base_url($userId . '/message'));
    }
}
    // namespace App\Controllers;

    // use App\Models\PublicationModel;

    // class Publication extends BaseController{
    //     public function index(){
    //         $pubModel = new PublicationModel();
    //         $data['publication'] = $pubModel->findAll();
    //         return view('PublicationView',$data);
    //     }

    //     public function creation(){
    //         $pubModel = new PublicationModel();
    //         if($this->request->getPost()){
    //             $imageFile = $this->request->getFile('image');
    //             $imageNom = null;

    //             if($imageFile && $imageFile->isValid() && ! $imageFile->hasMoved()){
    //                 $imageNom = $imageFile->getRandomName();
    //                 $imageFile->move(FCPATH . 'uploads' , $imageNom);
    //             }

    //             $data = [
    //                 'contenu'=> $this->request->getPost('contenu'),
    //                 'image'=>$imageNom,
    //                 '_date'=>date('Y-m-d H:i:s')

    //             ];

    //             $pubModel->save($data);
    //             return redirect()->to(base_url(''));
    //         }
            
    //         return view('Publication');
    //     }
    // }
?>
