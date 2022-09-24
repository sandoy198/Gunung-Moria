<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Item extends BaseController
{
    protected $itemModel;

    public function __construct()
    {
        $this->itemModel = new \App\Models\ItemModel();
    }

    public function index()
    {
        $model = new $this->itemModel();

        $data = [
            'title' => 'Item',
            'subtitle' => 'Item List',
            'users' => $model->paginate(10, 'group1'),
            'pager' => $model->pager,
        ];

        return view('item_list', $data);
    }
    public function show()
    {
        $data = [
            'title' => 'Item',
            'subtitle' => 'Item List'
        ];

        return view('item_list', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Item',
            'subtitle' => 'Item Detail'
        ];

        return view('item_detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Item',
            'subtitle' => 'Item Create'
        ];

        return view('item_create', $data);
    }
    public function save()
    {

        //dd($this->request->getPost('subaction'));
        if ($this->request->getPost('subaction') == 'back') {
            return redirect('item');
        }

        $data = $this->request->getPost();
        $item = new \App\Entities\ItemEntity();
        $item->fill($data);
        $this->itemModel->save($item);

        $added = ($this->itemModel->builder()->db()->affectedRows() > 0) ? true : false;

        if ($added) {
            $this->session->setFlashdata('success', 'Added successfully.');
            return redirect('item');
        }
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Item',
            'subtitle' => 'Item Edit',
            'item'  => $this->itemModel->find($id)
        ];

        return view('item_create', $data);
    }
    public function update($id)
    {

        if ($this->request->getPost('subaction') == 'back') {
            return redirect('item');
        }

        $data = $this->request->getPost();
        $item = $this->itemModel->find($id);
        $item->fill($data);

        $this->itemModel->save($item);

        $this->session->setFlashdata('success', 'Added successfully.');
        return redirect('item');
    }
    public function delete($id)
    {
        return redirect()->to('Item');
    }
}