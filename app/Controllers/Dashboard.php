<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\HariDanJamModel;
use App\Models\GajiModel;
use App\Models\AbsensiModel;

use \Dompdf\Dompdf;
helper('auth');

class Dashboard extends BaseController
{
    private $pegawai;
    private $hari;
    private $gaji;
    private $absensi;

    public function __construct()
    {
        $this->pegawai  = new PegawaiModel();
        $this->hari     = new HariDanJamModel();
        $this->gaji     = new GajiModel();
        $this->absensi  = new AbsensiModel();
    }

    public function index()
    {
        if(logged_in()) {
            $check = $this->pegawai->where('email', user()->email)->first();

            if($check['role_id'] == 1) {
                $DATA = [
                    'data' => $this->pegawai->getRoleName()
                ];
    
                return view('layout/admin', $DATA);
            }
        }
        $sql = "SELECT * FROM pegawai WHERE id NOT IN (SELECT absensi.pegawai_id FROM absensi WHERE tanggal = ?)";
        $DATA = [
            'data' => $this->pegawai->query($sql, array(date('Y-m-d')))->getResult(),
            'absen' => $this->absensi->where('tanggal', date('Y-m-d'))->getPegawaiName()
        ];

        return view('layout/absen', $DATA);
    }

    public function indexGaji()
    {
        $DATA = [
            'data' => $this->gaji->getPegawaiName()
        ];

        return view('layout/gaji', $DATA);
    }

    public function indexHari()
    {
        $DATA = [
            'data' => $this->hari->findAll()
        ];

        return view('layout/hari', $DATA);
    }

    public function indexSlipGaji()
    {
        $DATA = [
            'data' => $this->gaji->getPegawaiName()
        ];

        return view('layout/slip', $DATA);
    }

    public function create()
    {
        $validation = $this->validate([
            'nama'              => 'required',
            'email'            => 'required|valid_email'
        ]); 
        
        if (!$validation) {
            return redirect()->back()->withInput();
        }

        $dataPegawai = [
            'nama'          => $this->request->getPost('nama'),
            'email'         => $this->request->getPost('email'),
            'role_id'       => 2
        ];
        $pegawaiID = $this->pegawai->insert($dataPegawai);

        $dataGaji = [
            'pegawai_id'    => $pegawaiID,
            'gaji_pokok'    => 5500000,
        ];
        $gajiID = $this->gaji->insert($dataGaji);

        if ($pegawaiID) {
            return redirect()->to('/'); 
        }

        return redirect()->to('/'); 
    }

    public function update($id)
    {
        $check =$check = $this->pegawai->find($id);
        if($check['role_id'] != 1) {
            $dataPegawai = [
                'role_id'   => 1
            ];
        } else {
            $dataPegawai = [
                'role_id'   => 2
            ];
        }

        $this->pegawai->update($id, $dataPegawai);

        return redirect()->to('/'); 
    }

    public function destroy($id)
    {
        $this->pegawai->delete($id);
        return redirect()->to('/');
    }

    public function print() 
    {
        $dompdf = new Dompdf();
        $gaji = $this->gaji->where('pegawai_id', $this->request->getPost('id'))->getPegawaiName();

        $DATA = [
            'data' => $gaji
        ];
        
        // return view('layout/print', $DATA);

        $html = view('layout/print', $DATA);
        $dompdf->loadhtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}