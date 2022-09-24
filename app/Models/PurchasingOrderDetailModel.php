<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchasingOrderDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'purchasing_order_detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\PurchasingOrderDetailEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['purchasing_order_id', 'item_id', 'jumlah'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getItem($id = false)
    {
        if ($id == false) {
            return $this
                ->select('purchasing_order_detail.*,item.name as name,item.category as category')
                ->join('item', 'item.id = purchasing_order_detail.item_id')
                ->findAll();
        }
        return $this
            ->select('purchasing_order_detail.*,item.name as name,item.category as category')
            ->join('item', 'item.id = purchasing_order_detail.item_id')
            ->where('purchasing_order_id', $id)
            ->findAll();
    }
}