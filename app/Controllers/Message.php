<?php
namespace App\Controllers;

use App\Models\Mes;

class Message extends BaseController
{
    public function index(){
        return view('MessageView');
    }
}