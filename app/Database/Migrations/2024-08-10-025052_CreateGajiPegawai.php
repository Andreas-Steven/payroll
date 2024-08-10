<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGajiPegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pegawai_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'gaji_pokok' => [
                'type' => 'INT',
                'null' => true,

            ],
            'jumlah_hari_terlambat' => [
                'type' => 'INT',
                'null' => true,
            ],
            'denda' => [
                'type' => 'INT',
                'null' => true,
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
        $this->forge->addForeignKey('pegawai_id', 'pegawai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('gaji');
    }

    public function down()
    {
        $this->forge->dropTable('gaji');
    }
}
