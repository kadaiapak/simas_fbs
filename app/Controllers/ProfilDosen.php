<?php

namespace App\Controllers;
use App\Models\DosenModel;
use App\Models\DepartemenModel;


class ProfilDosen extends BaseController
{
    protected $dosenModel;
    protected $departemenModel;
    public function __construct()
    {
        helper('form');
        $this->dosenModel = new DosenModel();
        $this->departemenModel = new DepartemenModel();
    }

    public function index()
    {
        $username = session()->get('username');
        $detailProfil = $this->dosenModel->getDetail($username);
        // dd($detailProfil);
        $data = [  
            'judul' => 'Profil',
            'detail_profil' => $detailProfil
        ];
        return view('profil_dosen/v_profil_dosen', $data);
    }

    public function tambah()
    {
        $semuaDepartemen = $this->departemenModel->findAll();
        $data = [
            'judul' => 'Tambah Data Dosen',
            'semua_departemen' => $semuaDepartemen,
        ];
        return view('profil_dosen/v_tambah_profil_dosen', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nidn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIDN harus diisikan'
                ]
            ],
            'nama_lengkap' => [
                'rules' => 'required|is_unique[fip_dosen.peg_nama]',
                'errors' => [
                    'required' => 'Tuliskan nama lengkap',
                    'is_unique' => 'Nama sudah terdaftar'
                ]
            ],
            'peg_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih status kepegawaian'
                ]
            ],
            'pex_sex' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin'
                ]
            ],
            'alamat_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan Alamat Lengkap'
                ]
            ],
            'no_wa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan Nomor Whatsapp'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        if($this->request->getVar('peg_status') == "NONASN"){
            $status_kepegawaian = null;
        }else {
            $status_kepegawaian = $this->request->getVar('peg_status');
        }
        $data = array(
            'nidn' => $this->request->getVar('nidn'),
            'peg_nip' => $this->request->getVar('nip'),
            'peg_gel_dep' => $this->request->getVar('gelar_depan'),
            'peg_nama' => $this->request->getVar('nama_lengkap'),
            'peg_gel_bel' => $this->request->getVar('gelar_belakang'),
            'peg_status' => $status_kepegawaian,
            'peg_bidang' => $this->request->getVar('peg_bidang'),
            'peg_pangkat' => $this->request->getVar('peg_pangkat'),
            'peg_golongan' => $this->request->getVar('peg_golongan'),
            'peg_jabatan' => $this->request->getVar('peg_jabatan'),
            'peg_tmp_lahir' => $this->request->getVar('peg_tmp_lahir'),
            'peg_tgl_lahir' => $this->request->getVar('peg_tgl_lahir'),
            'peg_sex' => $this->request->getVar('peg_sex'),
            'peg_agama' => $this->request->getVar('peg_agama'),
            'peg_prodi' => $this->request->getVar('peg_prodi'),
            'peg_pendidikan' => $this->request->getVar('peg_pendidikan'),
            'peg_tmt' => $this->request->getVar('peg_tmt'),
            'peg_no_sk' => $this->request->getVar('peg_no_sk'),
            'peg_kota' => $this->request->getVar('peg_kota'),
            'peg_prop' => $this->request->getVar('peg_prop'),
            'peg_kawin' => $this->request->getVar('peg_kawin'),
            'peg_telp' => $this->request->getVar('peg_telp'),
            'peg_hp' => $this->request->getVar('peg_hp'),
            'nohp_baru' => $this->request->getVar('peg_hp'),
            'no_wa' => $this->request->getVar('no_wa'),
            'peg_email' => $this->request->getVar('peg_email'),
            'email_baru' => $this->request->getVar('peg_email'),
            'peg_alamat' => $this->request->getVar('peg_alamat'),
            'verifikasi' => 1
        );
        dd($data);
        $this->dosenModel->insert($data);
        session()->set('verifikasi', 1);
        return redirect()->to('/dashboard')->with('sukses','Profil berhasil disimpan!');
    }

    // akses oleh mahasiswa
    // digunakan untuk verifikasi awal mahasiswa yang baru login di aplikasi ini
    public function verifikasi($username = '')
    {
        $username = session()->get('username');
        if($username == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data_dosen = $this->dosenModel->getDetail($username);
        $data = [
            'judul' => 'Verifikasi Profil',
            'data_dosen' => $data_dosen,
        ];
        return view('profil_dosen/v_verifikasi_profil_dosen', $data);
    }

    
    
    // public function simpan()
    // {
    //     if(!$this->validate([
    //         'profil_nama' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Inputkan nama profil'
    //             ]
    //         ],
    //         'profil_email' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Inputkan email profil'
    //             ]
    //         ],
    //         'profil_website' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Inputkan website profil'
    //             ]
    //         ],
    //         'profil_kd_surat' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Inputkan kode surat profil, contoh : /UN35.4.3/AK/'
    //             ]
    //         ],
    //         'profil_nm_kadep' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Tuliskan Nama Kepala Profil'
    //             ]
    //         ],
    //         'profil_nip_kadep' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Tuliskan NIP Kepala Profil'
    //             ]
    //         ],
    //     ])){
    //         return redirect()->back()->withInput();
    //     }
    //     $data = array(
    //         'profil_nama' => $this->request->getVar('profil_nama'),
    //         'profil_alias' => $this->request->getVar('profil_alias'),
    //         'profil_email' => $this->request->getVar('profil_email'),
    //         'profil_website' => $this->request->getVar('profil_website'),
    //         'profil_kd_surat' => $this->request->getVar('profil_kd_surat'),
    //         'profil_nm_kadep' => $this->request->getVar('profil_nm_kadep'),
    //         'profil_nip_kadep' => $this->request->getVar('profil_nip_kadep'),
    //         'profil_status' => 1,
    //     );
    //     $this->profilModel->insert($data);
    //     return redirect()->to('/profil')->with('sukses','Data berhasil disimpan!');
    // }

    public function update_verifikasi()
    {
        if(!$this->validate([
            'nohp_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP kosong'
                ]
            ],
            'no_wa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Whatsapp kosong'
                ]
            ],
            'email_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan Email'
                ]
            ],
            'alamat_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan Alamat Lengkap'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        $username = session()->get('username');
        $data = array(
            'nohp_baru' => $this->request->getVar('nohp_baru'),
            'no_wa' => $this->request->getVar('no_wa'),
            'email_baru' => $this->request->getVar('email_baru'),
            'alamat_baru' => $this->request->getVar('alamat_baru'),
            'verifikasi' => 1
        );
        $this->dosenModel->updateVerifikasiProfil($data, $username);
        session()->set('verifikasi', 1);
        return redirect()->to('/dashboard')->with('sukses','Profil berhasil disimpan!');
    }
   
}
