<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tanaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tanaman' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_tanaman' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_ilmiah' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('id_tanaman', true);
        $this->forge->createTable('uplant');
    }

    public function down()
    {
        $this->forge->dropTable('uplant');
    }
}
