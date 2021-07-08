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
use App\Models\RwyGolonganModel;
use App\Models\RwyPekerjaanModel;
use App\Models\UsersModel;

class Tambahpegawai extends BaseController
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
    }
    public function index()
    {
        $data = [
            'title' => 'Input Data Pegawai',
            'subTitle' => '',
            'menuPos' => 'input-pegawai',
            'jabatan' => $this->jabatanModel->findAll(),
            'pangkat_golongan' => $this->golonganModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll()
        ];

        return view('admin/tambah_pegawai', $data);
    }

    public function tambahData()
    {
        // field to be inputed by data specified by table
        $fieldPegawai = $this->poldaModel->getTableCollumn('pegawai');    // all field of table pegawai
        $fieldUsers = $this->poldaModel->getTableCollumn('users');
        $fieldPekerjaan = ['nip', 'id_jabatan', 'id_satker', 'id_bagian', 'id_subbag',  'periode_mulai'];
        $fieldGolongan = ['nip', 'id_golongan', 'periode_mulai'];

        $dataPegawai = array();
        $dataPekerjaan = array();
        $dataGolongan = array();
        $dataUsers = array();

        // format untuk tabel pegawai
        $passTTL = str_replace('-', '', $this->request->getVar('ttl'));
        $jabatan = explode(" ", $this->request->getVar('jabatan'));
        $golongan = explode(" ", $this->request->getVar('pangkat_gol'));
        $satker = explode(" ", $this->request->getVar('id_satker'));
        $bagian = explode(" ", $this->request->getVar('id_bagian'));
        $subbag = explode(" ", $this->request->getVar('id_subbag'));

        foreach ($fieldPegawai as $field) {
            if ($field == 'jabatan') {
                $dataPegawai[$field] = $jabatan[0];
            } elseif ($field == 'id_satker') {
                $dataPegawai[$field] = $satker[0];
            } elseif ($field === "id_bagian") {
                $dataPegawai[$field] = $bagian[0];
            } elseif ($field == 'id_subbag') {
                $dataPegawai[$field] = $subbag[0];
            } else {
                $dataPegawai[$field] = $this->request->getVar($field);
            }
        }


        foreach ($fieldPekerjaan as $field) {
            if ($field == 'id_satker') {
                $dataPekerjaan[$field] = $satker[0];
            } elseif ($field === "id_bagian") {
                $dataPekerjaan[$field] = $bagian[0];
            } elseif ($field == 'id_subbag') {
                $dataPekerjaan[$field] = $subbag[0];
            } elseif ($field == 'id_jabatan') {
                $dataPekerjaan[$field] = $jabatan[0];
            } elseif ($field == 'periode_mulai') {
                $dataPekerjaan[$field] = '1000/01/01';
            } else {
                $dataPekerjaan[$field] = $this->request->getVar($field);
            }
        }
        foreach ($fieldGolongan as $field) {
            if ($field == 'id_golongan') {
                $dataGolongan[$field] = $golongan[0];
            } elseif ($field == 'periode_mulai') {
                $dataGolongan[$field] = '1000-10-1';
            } else {
                $dataGolongan[$field] = $this->request->getVar($field);
            }
        }


        foreach ($fieldUsers as $field) {
            if ($field == 'password') {
                $dataUsers[$field] = $passTTL;
            } elseif ($field == 'role') {
                $dataUsers[$field] = 'user';
            } elseif ($field == 'status') {
                $dataUsers[$field] = '1';
            } else {
                $dataUsers[$field] = $this->request->getVar($field);
            }
        }

        try {
            $this->pegawaiModel->insert($dataPegawai);
            $this->rwyGolonganModel->insert($dataGolongan);
            $this->rwyPekerjaanModel->insert($dataPekerjaan);
            $this->usersModel->insert($dataUsers);

            session()->setFlashdata('success-add', "Pegawai a.n " . $dataPegawai['nip'] . " berhasil ditambahkan!");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->to(base_url('/admin/lihat_pegawai'));
    }
}
