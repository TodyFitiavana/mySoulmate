<?php

namespace App\Controllers;

use App\Models\AuthModel;

class AuthController extends BaseController
{
    public function index()
    {
        if (session()->has('isLoggedIn') && session('isLoggedIn') === true) {
            // Rediriger vers une autre page  
            return redirect()->to('/dashboard');
        }

        return view('Authentification/Auth');
    }

    public function save()
    {
        $model = new AuthModel();
        $matricule = strtolower($this->request->getPost('matricule'));
        $password = $this->request->getPost('password');

        // Mot de passe:
        $password = $this->request->getPost('password');
        if (strlen($password) < 8) {
            $data = ['error_message' => 'Le mot de passe doit contenir au moins 8 caractères'];
            return view('Authentification/Auth', $data);
            // return redirect()->back()->with('error', 'Le mot de passe doit contenir au moins 8 caractères.');
        }



        // Vérifie si le matricule existe déjà
        if ($model->where('matricule', $matricule)->first()) {
            $data = ['error_message' => 'Ce matricule existe déjà'];
            return view('Authentification/Auth', $data);
        }

        $data = [
            'first_name' => strtolower($this->request->getPost('first_name')),
            'last_name' => strtolower($this->request->getPost('last_name')),
            'matricule' => strtolower($this->request->getPost('matricule')),
            'email' => strtolower($this->request->getPost('email')),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'name_profile' => strtolower($this->request->getPost('last_name'))
        ];

        $model->insert($data);
        return redirect()->to('/dashboard')->with('message', 'Utilisateur enregistré avec succès!!');
    }

    public function signup()
    {
        if (session()->has('isLoggedIn') && session('isLoggedIn') === true) {
            // Rediriger vers une autre page  
            $message = ['message' => 'Ce matricule existe déjà!'];
            return view('Authentification/Auth')
                . view('Authentification/Error', $message);
        }

        // Sinon, afficher la page de connection
        return view('Authentification/SignUp');
    }

    public function dash()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/auth');
        }
        return view('Authentification/Dash');
    }

    public function sign()
    {
        $model = new AuthModel();

        $matricule = $this->request->getPost('matricule');
        $password = $this->request->getPost('password');

        echo $matricule;

        $user = $model->where('matricule', $matricule)->first();
        

        if ($user) {
            // dd($password, $user['password_hash']);
            if (password_verify($password, $user['password_hash'])) {
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'first_name' => $user['first_name'],
                    'last_name'=>$user['last_name'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ]);

                return redirect()->to('/dashboard');
            } else {
                $message = ['message' => 'Mot de passe Incorrect'];
                return view('Authentification/SignUp')
                    . view('Authentification/Error', $message);
            }
        } else {
            $message = ['message' => 'Utilisateur non trouvé'];
            return view('Authentification/SignUp')
                . view('Authentification/Error', $message);
        }
    }

    public function deconnexion()
    {
        try {
            // Détruire toute la session
            session()->destroy();

            // Rediriger vers la page de login
            return redirect()->to('/signup');
        } catch (\Throwable $th) {
        }
    }
}
