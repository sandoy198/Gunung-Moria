<?php

namespace App\Controllers;

class Report extends BaseController
{
     public function index()
     {
          $data = [
               'title' => 'Report',
               'subtitle' => 'Report List'
          ];

          return view('report_list', $data);
     }
     public function PurchasingOrder()
     {
          $data = [
               'title' => 'Report',
               'subtitle' => 'Report Purchasing Order'
          ];

          return view('report_purchasing_order', $data);
     }

     public function SendingOrder()
     {
          $data = [
               'title' => 'Report',
               'subtitle' => 'Report Sending Order'
          ];

          return view('report_sending_order', $data);
     }
}