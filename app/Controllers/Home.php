<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Home');
    }

    public function about():string
    {
        return view('About');
    }

    public function pub():string
    {
        return view('Publication');
    }
 }
