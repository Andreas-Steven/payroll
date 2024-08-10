<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\GajiModel;
use App\Models\HariDanJamModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AbsensiController extends BaseController
{
    private $absensi;
    private $gaji;

    public function __construct()
    {
        $this->absensi = new AbsensiModel();
        $this->gaji = new GajiModel();
        $this->hari = new HariDanJamModel();
    }

    public function checkin($id)
    {
        $data = [
            'pegawai_id' => $this->request->getPost('pegawai_id'),
            'tanggal' => date('Y-m-d'),
            'jam_masuk' => date('H:i:s')
        ];
        $this->absensi->save($data);
        $absensiID = $this->absensi->getInsertID();

        // Hitung keterlambatan
        $gaji = $this->gaji->find($this->request->getPost('pegawai_id'));
        $absen = $this->absensi->find($absensiID);

        $jamMasuk = date('Y-m-d') . ' ' . '08:00:00';
        $jamMasukKaryawan = $absen['tanggal'] . ' ' .$absen['jam_masuk'];
        $from = strtotime($jamMasuk);
        $to = strtotime($jamMasukKaryawan);
        $diff = round(abs($to - $from) / 60);
        
        if($gaji['jumlah_hari_terlambat'] == null) {
            $jumalHariTerlambat = 0;
        } else {
            $jumalHariTerlambat = $gaji['jumlah_hari_terlambat'];
        }

        if($diff > 15) {
            $jumalHariTerlambat += 1;
        }
        
        
        if($jumalHariTerlambat > 0 || $jumalHariTerlambat != null) {
            if($gaji['denda'] == null) {
                $denda = $gaji['denda'];
            } else {
                $denda = 0;
            }

            $denda += ($jumalHariTerlambat * 10000);
            
            $this->gaji->set('denda', $denda);
            $this->gaji->where('id', $gaji['id']);
            $this->gaji->update(); 
        }

        $this->gaji->set('jumlah_hari_terlambat', $jumalHariTerlambat);
        $this->gaji->where('id', $gaji['id']);
        $this->gaji->update();  

        return redirect()->to('/');
    }

    public function checkout($id)
    {
        $this->absensi->set('jam_pulang', date('H:i:s'));
        $this->absensi->where('id', $id);
        $this->absensi->update();

        return redirect()->to('/');
    }
}
