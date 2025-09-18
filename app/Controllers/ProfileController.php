<?php
namespace App\Controllers;

use App\Models\AuthModel;

class ProfileController extends BaseController
{
    public function show()
    {
        $model = new AuthModel();
        $data = $model->where('id', session('user_id'))->find();
        // dd($data);
        return view('Authentification/Profile', ['data' => $data[0]]);
    }

    public function misajour()
    {
        $model = new AuthModel();
        $user_id = session('user_id');

        // Anciennes données
        $ancien = $model->find($user_id);

        // Gérer l'upload de l'image
        $file = $this->request->getFile('pdp');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // nom unique
            $file->move(FCPATH . 'uploads/profiles', $newName); // stocker dans public/uploads/profiles
            $pdpPath = 'uploads/profiles/' . $newName;
        } else {
            $pdpPath = $ancien['pdp']; // garder l’ancienne photo
        }

        // Autres champs
        $input = [
            'age' => $this->request->getPost('age'),
            'name_profile' => $this->request->getPost('name_profile'),
            'city' => $this->request->getPost('city'),
            'job' => $this->request->getPost('job'),
            'about_me' => $this->request->getPost('about_me'),
            'centre_interet' => $this->request->getPost('centre_interet'),
            'situation_amoureuse' => $this->request->getPost('situation_amoureuse'),
        ];

        // Fusionner : garder ancienne valeur si champ vide
        $data = ['pdp' => $pdpPath];
        foreach ($input as $key => $value) {
            $data[$key] = !empty($value) ? $value : $ancien[$key];
        }

        $model->update($user_id, $data);

        return redirect()->to('/profile')->with('success', 'Profil mis à jour.');
    }
}