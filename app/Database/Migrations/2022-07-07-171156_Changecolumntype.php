<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Changecolumntype extends Migration
{
    public function up()
    {
        $fields = [
            'name' => [
                'type' => 'varchar', 'constraint' => 255, 'null' => false
            ],
        ];
        $this->forge->modifyColumn('item', $fields);
    }

    public function down()
    {
        $fields = [
            'name'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        ];
        $this->forge->modifyColumn('item', $fields);
    }
}