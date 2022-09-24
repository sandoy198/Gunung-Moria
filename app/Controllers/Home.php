<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Home',
            'subtitle' => 'Dasboard'
        ];


        return view('index', $data);
    }
}