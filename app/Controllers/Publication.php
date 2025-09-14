<?php
    namespace App\Controllers;

    use App\Models\PublicationModel;

    class Publication extends BaseController{
        public function index(){
            $pubModel = new PublicationModel();
            $data['publication'] = $pubModel->findAll();
            return view('PublicationView',$data);
        }

        public function creation(){
            $pubModel = new PublicationModel();
            if($this->request->getPost()){
                $imageFile = $this->request->getFile('image');
                $imageNom = null;

                if($imageFile && $imageFile->isValid() && ! $imageFile->hasMoved()){
                    $imageNom = $imageFile->getRandomName();
                    $imageFile->move(FCPATH . 'uploads' , $imageNom);
                }

                $data = [
                    'contenu'=> $this->request->getPost('contenu'),
                    'image'=>$imageNom,
                    '_date'=>date('Y-m-d H:i:s')

                ];

                $pubModel->save($data);
                return redirect()->to(base_url(''));
            }
            
            return view('Publication');
        }
    }
?>