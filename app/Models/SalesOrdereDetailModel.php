<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesOrdereDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sales_order_detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\SalesOrdereDetailEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sales_order_id', 'item_id', 'jumlah', 'status'];

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

    public function getSoDetail($id = false)
    {
        if ($id == false) {
            return $this
                ->select('sales_order_detail.*,i.id as id,i.name as name,so.tujuan,so.sales_order_number,so.sales,i.category')
                ->join('item as i', 'i.id = sales_order_detail.item_id')
                ->join('sales_order as so', 'so.id = sales_order_detail.sales_order_id')
                ->where('so.status', 'new');
        }
        return $this->asArray()
            ->join('item as i', 'i.id = sales_order_detail.item_id')
            ->where('sales_order_detail.sales_order_id', $id)
            ->findAll();
    }

    public function getItem($id = false, $soDetailId = false)
    {
        if ($id == false && $soDetailId == false) {
            return $this
                ->select('sales_order_detail.*,i.id as item_id,i.name as name,so.tujuan,so.sales_order_number,so.sales,i.category')
                ->join('item as i', 'i.id = sales_order_detail.item_id')
                ->join('sales_order as so', 'so.id = sales_order_detail.sales_order_id')
                ->where('sales_order_detail.status', 'new');
        }
        if (is_array($id) && is_array($soDetailId))
            return $this
                ->select('sales_order_detail.*,i.id as item_id,i.name as name,so.tujuan,so.sales_order_number,so.sales,i.category')
                ->join('item as i', 'i.id = sales_order_detail.item_id')
                ->join('sales_order as so', 'so.id = sales_order_detail.sales_order_id')
                ->where('sales_order_detail.status', 'new')
                ->whereNotIn('sales_order_detail.id', $soDetailId);
        return $this
            ->select('sales_order_detail.*,i.id as item_id,i.name as name,so.tujuan,so.sales_order_number,so.sales,i.category')
            ->join('item as i', 'i.id = sales_order_detail.item_id')
            ->join('sales_order as so', 'so.id = sales_order_detail.sales_order_id')
            ->where('sales_order_detail.id', $soDetailId)
            ->where('sales_order_detail.item_id', $id);
    }
}