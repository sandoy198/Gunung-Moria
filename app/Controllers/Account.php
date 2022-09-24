<?php

namespace App\Controllers;

class Account extends BaseController
{
     public function index($id)
     {

          // dd(auth()->user()->addPermission('users.create'));
          $data = [
               'title' => 'Home',
               'subtitle' => 'Dasboard'
          ];


          return view('index', $data);
     }
}