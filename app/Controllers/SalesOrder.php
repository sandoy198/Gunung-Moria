<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class SalesOrder extends BaseController
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
        $model = new $this->salesOrderModel();

        $data = [
            'title' => 'Sales Order',
            'subtitle' => 'Sales Order List',
            'salesOrder' => $model->paginate(10, 'group1'),
            'pager' => $model->pager,

        ];

        return view('sales_order_list', $data);
    }
    public function show()
    {
        $data = [
            'title' => 'Sales Order',
            'subtitle' => 'Sales Order List'
        ];

        return view('sales_order_list', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Sales Order',
            'subtitle' => 'Sales Order Detail',
            'items' => $this->salesOrderDetailModel->getSoDetail($id),
            'salesOrder' => $this->salesOrderModel->find($id)
        ];


        return view('sales_order_detail', $data);
    }
    public function create()
    {
        $items = session()->get('items');
        if ($items == null) {
            $items = [];
            session()->set('items', $items);
        }

        $data = [
            'title' => 'Sales Order',
            'subtitle' => 'Sales Order Create',
            'items' => $items
        ];


        return view('sales_order_create', $data);
    }
    public function PopupItem()
    {
        $model = new $this->itemModel();

        $data = [
            'title' => 'Item',
            'subtitle' => 'Item List',
            'items' => $model->paginate(10, 'group1'),
            'pager' => $model->pager,
        ];

        return view('item_popup', $data);
    }
    public function save()
    {
        $items = session()->get('items');

        $form = $this->request->getPost();
        if ($form['subaction'] == 'add') {
            $item = $this->itemModel->find($form['id']);
            //belum bisa tambah entity ke array
            $itemArray = $item->toArray();
            $itemArray['jumlah'] = $form['jumlah'];
            $items[] = $itemArray;
            session()->set('items', $items);
            return redirect()->to('/SalesOrder/create')->withInput();
        }

        if ($form['subaction'] == 'remove') {

            if (is_array(dot_array_search('*.id', $items))) {
                if (($key = array_search($form['id'], dot_array_search('*.id', $items))) !== false) {
                    unset($items[$key]);
                    $items = array_values($items);
                    // dd($items);
                    session()->set('items', $items);
                    return redirect()->to('/SalesOrder/create');
                }
            } else {
                session()->remove('items');
                return redirect()->to('/SalesOrder/create')->withInput();
            }
        }
        $time = Time::today();
        $year = $time->getYear() * 100;
        $month = $time->getMonth();
        $number = $year + $month;
        $number = $number * 1000;

        if (count($items) == null || count($items) == 0) {
            $this->session->setFlashdata('danger', 'Item Masih Kosong.');
            return redirect()->to('/SalesOrder/create')->withInput();
        }

        $salesOrder = new \App\Entities\SalesOrderEntity();
        $salesOrder->user_id = auth()->id();
        $salesOrder->order_date = $form['tglBuat'];
        $salesOrder->sales = $form['sales'];
        $salesOrder->tujuan = $form['tujuan'];

        // dd($salesOrder);
        $this->salesOrderModel->save($salesOrder);

        $id = $this->salesOrderModel->getInsertID();

        $salesOrder = $this->salesOrderModel->find($id);
        $salesOrder->sales_order_number = $number + $id;

        $this->salesOrderModel->save($salesOrder);

        foreach ($items as $key) {
            $salesOrderDetail = new \App\entities\SalesOrdereDetailEntity();
            $salesOrderDetail->jumlah = $key['jumlah'];
            $salesOrderDetail->item_id = $key['id'];
            $salesOrderDetail->sales_order_id = $id;
            $this->salesOrderDetailModel->save($salesOrderDetail);
        }

        $added = ($this->salesOrderModel->builder()->db()->affectedRows() > 0) ? true : false;

        if ($added) {
            $this->session->setFlashdata('success', 'Added successfully.');
        }
        session()->remove('items');
        return redirect()->to('/SalesOrder');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Sales Order',
            'subtitle' => 'Sales Order Edit'
        ];

        return view('sales_order_create', $data);
    }
    public function update($id)
    {
        return redirect()->to('/SalesOrder');
    }
    public function delete($id)
    {
        return redirect()->to('/SalesOrder');
    }
}