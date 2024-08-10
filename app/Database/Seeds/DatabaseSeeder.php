<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $dataRole = [
            [
                'role' => 'Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'role' => 'Pegawai',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('roles')->insertBatch($dataRole);

        $dataHariDanJamKerja = [
            [
                'hari'       => 'Senin',
                'jam_masuk'  => '08:00:00',
                'jam_pulang' => '17:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'hari'       => 'Selasa',
                'jam_masuk'  => '08:00:00',
                'jam_pulang' => '17:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'hari'       => 'Rabu',
                'jam_masuk'  => '08:00:00',
                'jam_pulang' => '17:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'hari'       => 'Kamis',
                'jam_masuk'  => '08:00:00',
                'jam_pulang' => '17:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'hari'       => 'Jumat',
                'jam_masuk'  => '08:00:00',
                'jam_pulang' => '17:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('hari_dan_jam_kerja')->insertBatch($dataHariDanJamKerja);
    }
}
