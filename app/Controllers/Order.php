<?php

namespace App\Controllers;

class Order extends BaseController
{
     public function index()
     {
          $data = [
               'title' => 'Order',
               'subtitle' => 'Order List'
          ];

          return view('order_list', $data);
     }
     public function show()
     {
          $data = [
               'title' => 'Order',
               'subtitle' => 'Order List'
          ];

          return view('order_list', $data);
     }
     public function detail($id)
     {
          $data = [
               'title' => 'Order',
               'subtitle' => 'Order Detail'
          ];

          return view('order_detail', $data);
     }
     public function create()
     {
          $data = [
               'title' => 'Order',
               'subtitle' => 'Order Create'
          ];

          return view('order_create', $data);
     }
     public function save()
     {
          return redirect()->to('/Order');
     }
     public function edit($id)
     {
          $data = [
               'title' => 'Order',
               'subtitle' => 'Order Edit'
          ];

          return view('order_create', $data);
     }
     public function update($id)
     {
          return redirect()->to('/Order');
     }
     public function delete($id)
     {
          return redirect()->to('/Order');
     }
}