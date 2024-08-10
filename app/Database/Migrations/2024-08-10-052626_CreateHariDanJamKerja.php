<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHariDanJamKerja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hari' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jam_masuk' => [
                'type' => 'TIME',
            ],
            'jam_pulang' => [
                'type' => 'TIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hari_dan_jam_kerja');
    }

    public function down()
    {
        $this->forge->dropTable('hari_dan_jam_kerja');
    }
}
