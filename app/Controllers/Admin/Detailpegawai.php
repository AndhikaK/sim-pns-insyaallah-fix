<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BagianModel;
use App\Models\PoldaModel;
use App\Models\SatkerModel;
use App\Models\SubbagModel;
use App\Models\JabatanModel;
use App\Models\GolonganModel;
use App\Models\KeluargaModel;
use App\Models\PegawaiModel;
use App\Models\RwyDibangumModel;
use App\Models\RwyDikbangspesModel;
use App\Models\RwyDikbangumModel;
use App\Models\RwyDikpolModel;
use App\Models\RwyDikumModel;
use App\Models\RwyGolonganModel;
use App\Models\RwyPekerjaanModel;
use App\Models\UsersModel;
use Exception;
use PhpParser\Node\Stmt\Continue_;
use PhpParser\Node\Stmt\TryCatch;

class Detailpegawai extends BaseController
{
    protected $usersModel;
    protected $poldaModel;
    protected $jabatanModel;
    protected $golonganModel;
    protected $satkerModel;
    protected $bagianModel;
    protected $subbagModel;
    protected $pegawaiModel;
    protected $keluargaModel;
    protected $rwyPekerjaanModel;
    protected $rwyGolonganModel;
    protected $rwyDikumModel;
    protected $rwyDikpolModel;
    protected $rwyDikbangumModel;
    protected $rwyDikbangspesModel;

    public function __construct()
    {
        $this->poldaModel = new PoldaModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->jabatanModel = new JabatanModel();
        $this->golonganModel = new GolonganModel();
        $this->satkerModel = new SatkerModel();
        $this->bagianModel = new BagianModel();
        $this->subbagModel = new SubbagModel();
        $this->rwyPekerjaanModel = new RwyPekerjaanModel();
        $this->rwyGolonganModel = new RwyGolonganModel();
        $this->usersModel = new UsersModel();
        $this->keluargaModel = new KeluargaModel();
        $this->rwyDikumModel = new RwyDikumModel();
        $this->rwyDikpolModel = new RwyDikpolModel();
        $this->rwyDikbangumModel = new RwyDikbangumModel();
        $this->rwyDikbangspesModel = new RwyDikbangspesModel();
    }
    public function index($nip, $edit = null)
    {
        $detailPegawai = $this->pegawaiModel->find($nip);
        $dataKeluarga = $this->keluargaModel->where('nip', $nip)->findAll();
        $riwayatPekerjaan = $this->rwyPekerjaanModel->getOrderedData($nip);
        $riwayatGolongan = $this->rwyGolonganModel->getOrderedData($nip);
        $riwayatDikum = $this->rwyDikumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikpol = $this->rwyDikpolModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikbangum = $this->rwyDikbangumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikbangspes = $this->rwyDikbangspesModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();

        // Kolom buat display di rwy (Rubah ini pokoknya)
        $colKeluarga = ['NIK' => 'nik_keluarga', 'STATUS' => 'status_keluarga', 'NAMA' => 'nama_keluarga', 'TANGGAL LAHIR' => 'tanggal_lahir_keluarga', 'JENIS KELAMIN' => 'jenis_kelamin_keluarga'];
        $colRwyPekerjaan = ['sk' => 'no_sk', 'jabatan' => 'nama_jabatan', 'satker' => 'nama_satker', 'bagian' => 'nama_bagian', 'subbag' => 'nama_subbag', 'periode mulai' => 'periode_mulai', 'periode selesai' => 'periode_selesai'];
        $colRwyGolongan = ['sk' => 'no_sk', 'golongan' => 'id_golongan', 'periode mulai' => 'periode_mulai', 'periode selesai' => 'periode_selesai'];


        $data = [
            'title' => 'Detail Pegawai',
            'subTitle' => '',
            'menuPos' => 'lihat-pegawai',
            'edit' => $edit,
            'detailPegawai' => $detailPegawai,
            'riwayatPekerjaan' => $riwayatPekerjaan,
            'riwayatGolongan' => $riwayatGolongan,
            'jabatan' => $this->jabatanModel->findAll(),
            'golongan' => $this->golonganModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll(),
            'dataKeluarga' => $dataKeluarga,
            'riwayatDikum' => $riwayatDikum,
            'riwayatDikpol' => $riwayatDikpol,
            'riwayatDikbangum' => $riwayatDikbangum,
            'riwayatDikbangspes' => $riwayatDikbangspes,
            'colRwyPekerjaan' => $colRwyPekerjaan,
            'colRwyGolongan' => $colRwyGolongan,
            'colKeluarga' => $colKeluarga,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/detail_pegawai', $data);
    }


    public function saveProfil($nip)
    {
        if (!$this->validate([
            'profil' => [
                'rules' => 'max_size[profil,2048]|is_image[profil]|mime_in[profil,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ]
        ])) {
            return redirect()->to(base_url("/admin/detail_pegawai/$nip"))->withInput();
        }

        $profil = $this->request->getFile('profil');
        $namaProfil = $profil->getRandomName();

        $profil->move('profil', $namaProfil);

        try {
            $this->pegawaiModel->update($nip, ['profil' => $namaProfil]);

            session()->setFlashdata('success-add', "Foto pegawai berhasil ditambahkan");
        } catch (Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->to(base_url("/admin/detail_pegawai/$nip"));
    }
}
