<?php

namespace App\Controllers;

class SendingOrder extends BaseController
{
     protected $itemModel;
     protected $salesOrderModel;
     protected $salesOrderDetailModel;

     public function __construct()
     {
          $this->itemModel = new \App\Models\ItemModel();
          $this->salesOrderModel = new \App\Models\SalesOrderModel();
          $this->salesOrderDetailModel = new \App\Models\SalesOrdereDetailModel();
     }

     public function index()
     {
          $model = $this->salesOrderModel->where('status', 'send');

          $data = [
               'title' => 'Sending Order',
               'subtitle' => 'Sending Order List',
               'salesOrder' => $model->paginate(10, 'group1'),
               'pager' => $model->pager,

          ];

          return view('sending_order_list', $data);
     }
     public function show()
     {
          $data = [
               'title' => 'Sending Order',
               'subtitle' => 'Sending Order List'
          ];

          return view('sending_order_list', $data);
     }
     public function detail($id)
     {
          $data = [
               'title' => 'Sending Order',
               'subtitle' => 'Sending Order Detail'
          ];

          return view('sending_order_detail', $data);
     }
     public function create()
     {
          $model = $this->salesOrderModel->where('status', 'new');

          $data = [
               'title' => 'Sending Order',
               'subtitle' => 'Sending Order Create',
               'salesOrder' => $model->paginate(10, 'group1'),
               'pager' => $model->pager,

          ];

          return view('sending_order_create', $data);
     }
     public function CreateDetail($id)
     {

          $data = [
               'title' => 'Sending Order',
               'subtitle' => 'Sending Order Create',
               'items' => $this->salesOrderDetailModel->getSoDetail($id),
               'salesOrder' => $this->salesOrderModel->find($id)
          ];

          return view('sending_order_create_detail', $data);
     }
     public function save($id)
     {
          $form = $this->request->getVar();
          $salesOrder = $this->salesOrderModel->find($id);
          $salesOrder->status = 'send';
          $salesOrder->alamat = $form['alamat'];
          $this->salesOrderModel->save($salesOrder);


          return redirect()->to('/SendingOrder');
     }
     public function edit($id)
     {
          $data = [
               'title' => 'Sending Order',
               'subtitle' => 'Sending Order Edit'
          ];

          return view('sending_order_create', $data);
     }
     public function update($id)
     {
          return redirect()->to('/SendingOrder');
     }
     public function delete($id)
     {
          return redirect()->to('/SendingOrder');
     }
}