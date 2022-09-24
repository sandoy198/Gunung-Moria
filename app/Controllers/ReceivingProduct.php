<?php

namespace App\Controllers;

class ReceivingProduct extends BaseController
{

     protected $itemModel;
     protected $salesOrderModel;
     protected $salesOrderDetailModel;
     protected $purchasingOrderModel;
     protected $purchasingOrderDetailModel;

     public function __construct()
     {
          $this->itemModel = new \App\Models\ItemModel();
          $this->salesOrderModel = new \App\Models\SalesOrderModel();
          $this->salesOrderDetailModel = new \App\Models\SalesOrdereDetailModel();
          $this->purchasingOrderModel = new \App\Models\PurchasingOrderModel();
          $this->purchasingOrderDetailModel = new \App\Models\PurchasingOrderDetailModel();
     }

     public function index()
     {
          $model = $this->purchasingOrderModel->where('receiver !=', null);

          $data = [
               'title' => 'Receiving Product',
               'subtitle' => 'Receiving Product List',
               'po' => $model->paginate(10, 'group1'),
               'pager' => $model->pager,
          ];

          return view('receiving_product_list', $data);
     }
     public function show()
     {
          $data = [
               'title' => 'Receiving Product',
               'subtitle' => 'Receiving Product List'
          ];

          return view('receiving_product_list', $data);
     }
     public function detail($id)
     {
          $data = [
               'title' => 'Receiving Product',
               'subtitle' => 'Receiving Product Detail'
          ];

          return view('receiving_product_detail', $data);
     }
     public function create()
     {
          $model = $this->purchasingOrderModel->where('receiver', null);
          $data = [
               'title' => 'Receiving Product',
               'subtitle' => 'Receiving Product Create',
               'po' => $model->paginate(10, 'group1'),
               'pager' => $model->pager,
          ];

          return view('receiving_product_create', $data);
     }

     public function ReceiveDetail($id)
     {
          $po = $this->purchasingOrderModel->find($id);
          $item = $this->purchasingOrderDetailModel->getItem($id);

          // dd($po);
          $data = [
               'title' => 'Receiving Product',
               'subtitle' => 'Receiving Product Create',
               'po' => $po,
               'items' => $item,
          ];

          return view('receiving_product_create_detail', $data);
     }


     public function save($id)
     {
          $form = $this->request->getVar();
          // dd($form);

          $po = $this->purchasingOrderModel->find($id);
          $po->receiving_date = $form['receiving_Date'];
          $po->receiver = $form['receiver'];
          $this->purchasingOrderModel->save($po);

          $added = ($this->purchasingOrderModel->builder()->db()->affectedRows() > 0) ? true : false;

          if ($added) {
               $this->session->setFlashdata('success', 'Received successfully.');
          }


          return redirect()->to('/ReceivingProduct');
     }
     public function edit($id)
     {
          $data = [
               'title' => 'Receiving Product',
               'subtitle' => 'Receiving Product Edit'
          ];

          return view('receiving_product_create', $data);
     }
     public function update($id)
     {
          return redirect()->to('/ReceivingProduct');
     }
     public function delete($id)
     {
          return redirect()->to('/ReceivingProduct');
     }
}