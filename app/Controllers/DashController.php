<?php

namespace App\Controllers;

use App\Models\AuthModel;

class DashController extends BaseController
{
    function show_dash()
    {
        return view('Authentification/Dash');
    }
    function show_users()
    {

        $model = new AuthModel();
        $data = $model->where('id !=', session('user_id'))->findAll();
        // dd($data);
        return view('Authentification/Dash', ['data'=>$data]);
    }
}
