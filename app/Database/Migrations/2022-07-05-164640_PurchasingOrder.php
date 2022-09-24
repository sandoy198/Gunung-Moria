<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PurchasingOrder extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'purchasing_order_number'       => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'user_id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'order_date'     => ['type' => 'datetime', 'null' => true],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addUniqueKey('purchasing_order_number');
        $this->forge->createTable('purchasing_order', true);

        $this->forge->addField([
            'id'                     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'purchasing_order_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'item_id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'jumlah'                 => ['type' => 'double', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('item_id', 'item', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('purchasing_order_id', 'purchasing_order', 'id', '', 'CASCADE');

        // NOTE: Do NOT delete the user_id or identifier when the user is deleted for security audits
        $this->forge->createTable('purchasing_order_detail', true);
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('purchasing_order', true);
        $this->forge->dropTable('purchasing_order_detail', true);

        $this->db->enableForeignKeyChecks();
    }
}