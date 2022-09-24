<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class PurchasingOrder extends BaseController
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

        $model = new $this->purchasingOrderModel();

        $data = [
            'title' => 'Purchasing Order',
            'subtitle' => 'Purchasing Order List',
            'po' => $model->paginate(10, 'group1'),
            'pager' => $model->pager,

        ];

        return view('purchasing_order_list', $data);
    }
    public function Approval()
    {

        $model = $this->purchasingOrderModel->where('status', 'new');

        $data = [
            'title' => 'Purchasing Order',
            'subtitle' => 'Approval Purchasing Order List',
            'po' => $model->paginate(10, 'group1'),
            'pager' => $model->pager,

        ];

        return view('approval_purchasing_order_list', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Purchasing Order',
            'subtitle' => 'Purchasing Order Detail'
        ];

        return view('purchasing_order_detail', $data);
    }
    public function PopupItem()
    {
        $items = session()->get('items');
        if ($items != null) {
            if (is_array(dot_array_search('*.id', $items))) {
                $soDetailId = dot_array_search('*.id', $items);
                $itemId = dot_array_search('*.item_id', $items);
            } else {
                $soDetailId[] = dot_array_search('*.id', $items);
                $itemId[] = dot_array_search('*.item_id', $items);
            }
        } else {
            $itemId = false;
            $soDetailId = false;
        }
        $model = $this->salesOrderDetailModel->getItem($itemId, $soDetailId);
        $data = [
            'title' => 'Item',
            'subtitle' => 'Item List',
            'items' => $model->paginate(10, 'group1'),
            'pager' => $model->pager,
        ];

        return view('sales_order_detail_popup', $data);
    }
    public function create()
    {
        $items = session()->get('items');
        // session()->remove('items');

        if ($items == null) {
            $items = [];
            session()->set('items', $items);
        }


        $data = [
            'title' => 'Purchasing Order',
            'subtitle' => 'Purchasing Order Create',
            'items' => $items
        ];

        return view('purchasing_order_create', $data);
    }
    public function save()
    {
        $items = session()->get('items');

        $form = $this->request->getPost();
        if ($form['subaction'] == 'add') {
            // dd($form);
            $item = $this->salesOrderDetailModel->getItem($form['id'], $form['soDetailId'])->first();
            // dd($item);
            $itemArray = $item->toArray();
            $items[] = $itemArray;
            session()->set('items', $items);
            return redirect()->to('/PurchasingOrder/Create')->withInput();
        }

        if ($form['subaction'] == 'remove') {

            if (is_array(dot_array_search('*.id', $items))) {
                if (($key = array_search($form['id'], dot_array_search('*.id', $items))) !== false) {
                    unset($items[$key]);
                    $items = array_values($items);
                    // dd($items);
                    session()->set('items', $items);
                    return redirect()->to('/PurchasingOrder/Create')->withInput();
                }
            } else {
                session()->remove('items');
                return redirect()->to('/PurchasingOrder/Create')->withInput();
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

        $purchasingOrder = new \App\Entities\PurchasingOrderEntity();
        $purchasingOrder->user_id = auth()->id();
        $purchasingOrder->order_date = $form['tglBuat'];
        $purchasingOrder->distributor = $form['distributor'];

        $this->purchasingOrderModel->save($purchasingOrder);

        $id = $this->purchasingOrderModel->getInsertID();

        $purchasingOrder = $this->purchasingOrderModel->find($id);
        $purchasingOrder->purchasing_order_number = $number + $id;

        $this->purchasingOrderModel->save($purchasingOrder);


        foreach ($items as $key) {
            $purchasingOrderDetail = new \App\entities\PurchasingOrderDetailEntity();
            $purchasingOrderDetail->jumlah = $key['jumlah'];
            $purchasingOrderDetail->item_id = $key['item_id'];
            $purchasingOrderDetail->purchasing_order_id = $id;
            $this->purchasingOrderDetailModel->save($purchasingOrderDetail);

            $salesOrderDetail = $this->salesOrderDetailModel->find($key['id']);
            $salesOrderDetail->status = 'order';
            // dd($salesOrderDetail);
            $this->salesOrderDetailModel->save($salesOrderDetail);
        }

        $added = ($this->purchasingOrderModel->builder()->db()->affectedRows() > 0) ? true : false;

        if ($added) {
            $this->session->setFlashdata('success', 'Added successfully.');
        }

        session()->remove('items');

        return redirect()->to('/PurchasingOrder');
    }

    public function Approve($id)
    {
        $purchasingOrder = $this->purchasingOrderModel->find($id);
        $purchasingOrder->status = 'Approve';
        // dd($purchasingOrder);
        $this->purchasingOrderModel->save($purchasingOrder);

        $added = ($this->purchasingOrderModel->builder()->db()->affectedRows() > 0) ? true : false;

        if ($added) {
            $this->session->setFlashdata('success', 'Purchasing Order telah di Approve.');
        }

        return redirect()->to('/PurchasingOrder/Approval');
    }
    public function Reject($id)
    {
        $purchasingOrder = $this->purchasingOrderModel->find($id);
        $purchasingOrder->status = 'Reject';
        // dd($purchasingOrder);
        $this->purchasingOrderModel->save($purchasingOrder);

        $added = ($this->purchasingOrderModel->builder()->db()->affectedRows() > 0) ? true : false;

        if ($added) {
            $this->session->setFlashdata('danger', 'Purchasing Order telah di Reject.');
        }

        return redirect()->to('/PurchasingOrder/Approval');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Purchasing Order',
            'subtitle' => 'Purchasing Order Edit'
        ];

        return view('purchasing_order_create', $data);
    }
    public function update($id)
    {
        return redirect()->to('/PurchasingOrder');
    }
    public function delete($id)
    {
        return redirect()->to('/PurchasingOrder');
    }
}