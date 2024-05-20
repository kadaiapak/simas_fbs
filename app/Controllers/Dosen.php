<?php

namespace App\Controllers;

use App\Models\SkripsiModel;
use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $skripsiModel;
    protected $dosenModel;
    public function __construct()
    {
        $this->skripsiModel = new SkripsiModel();
        $this->dosenModel = new DosenModel();
    }

    public function index()
    {
        $departemen = session()->get('departemen');
        $semuaDosen = $this->dosenModel->getAll($departemen);
        $data = [
            'judul' => 'Dosen Pembimbing',
            'semua_dosen' => $semuaDosen
        ];
        return view('dosen/v_dosen', $data);
    }

    public function detail($nidn)
    {
        if($nidn != null) {
            $satuDosen = $this->dosenModel->getDetail($nidn);
            if (!$satuDosen) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } else {
                $pa = $this->skripsiModel->getAllMahasiswaByDosenPa($nidn);
                $pembimbing = $this->skripsiModel->getAllMahasiswaByDosenPembimbing($nidn);
                $pengujiSatu = $this->skripsiModel->getAllMahasiswaByDosenPengujiSatu($nidn);
                $pengujiDua = $this->skripsiModel->getAllMahasiswaByDosenPengujiDua($nidn);
                $data = [
                    'judul' => 'Detail Dosen',
                    'satuDosen' => $satuDosen,
                    'pa' => $pa,
                    'pembimbing' => $pembimbing,
                    'pengujiSatu' => $pengujiSatu,
                    'pengujiDua' => $pengujiDua,
                ];
                return view('dosen/v_detail_dosen', $data);
            }   
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
   
}
