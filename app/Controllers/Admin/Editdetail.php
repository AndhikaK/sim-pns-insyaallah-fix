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

class Editdetail extends BaseController
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

    public function bio($nip)
    {
        $dataPegawai = $this->pegawaiModel->find($nip);

        $data = [
            'title' => 'Edit Biodata',
            'menuPos' => 'edit-bio',
            'subtitle' => '',
            'nip' => $nip,
            'dataPegawai' => $dataPegawai,
        ];

        return view('admin/edit/edit_bio', $data);
    }


    // edit Biodata
    public function updateBio()
    {
        $dataPegawai = $this->request->getVar();
        $passTTL = str_replace('-', '', $dataPegawai['ttl']);

        $dataUsers = [
            'password' => $passTTL

        ];

        try {
            $this->pegawaiModel->update($dataPegawai['nip'], $dataPegawai);
            $this->usersModel->update($dataPegawai['nip'], $dataUsers);

            session()->setFlashdata('success-edit', "Edit bio berhasil!");
        } catch (Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->back();
    }

    // edit Biodata

    public function pdd($nip)
    {
        $colDikum = ['Tahun Kelulusan' => 'tahun_lulus', 'Jenjang' => 'jenjang'];
        $colDikbangum = ['Tahun Kelulusan' => 'tahun_lulus', 'Nama dikbangum' => 'nama_dikbangum'];
        $colDikbangspes = ['Tahun Kelulusan' => 'tahun_lulus', 'Nama Dikbangspes' => 'nama_dikbangspes'];
        $colDikpol = ['Tahun Kelulusan' => 'tahun_lulus', 'Nama Dikpol' => 'nama_dikpol'];

        $riwayatDikum = $this->rwyDikumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikbangum = $this->rwyDikbangumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikbangspes = $this->rwyDikbangspesModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikpol = $this->rwyDikpolModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();

        $data = [
            'title' => 'Edit Data Pendidikan',
            'colDikum' => $colDikum,
            'colDikbangum' => $colDikbangum,
            'colDikbangspes' => $colDikbangspes,
            'colDikpol' => $colDikpol,
            'riwayatDikum' => $riwayatDikum,
            'riwayatDikbangum' => $riwayatDikbangum,
            'riwayatDikbangspes' => $riwayatDikbangspes,
            'riwayatDikpol' => $riwayatDikpol,
        ];

        return view('admin/edit/tambah_pdd', $data);
    }

    public function tambahpdd($nip, $pdd, $id = null)
    {
        $table = 'riwayat_' . $pdd;

        $colDikum = ['Tahun Kelulusan' => 'tahun_lulus', 'Jenjang' => 'jenjang'];
        $colDikbang = ['Tahun Kelulusan' => 'tahun_lulus', 'nama ' . $pdd => 'nama_' . $pdd];
        // $riwayatDikum = $this->rwyDikumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();

        $colForm = array();

        switch ($pdd) {
            case 'dikum':
                $title = "Pendidikan Umum";
                $colForm = $colDikum;
                $riwayatPDD = $this->rwyDikumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            case 'dikpol':
                $title = "Pendidikan Polisi";
                $colForm = $colDikbang;
                $riwayatPDD = $this->rwyDikpolModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            case 'dikbangum':
                $title = "Pendidikan Pengembangan Umum";
                $colForm = $colDikbang;
                $riwayatPDD = $this->rwyDikbangumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            case 'dikbangspes':
                $title = "Pendidikan Pengembangan Spesialis";
                $colForm = $colDikbang;
                $riwayatPDD = $this->rwyDikbangspesModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            default:
                break;
        }

        $data = [
            'title' => $title,
            'navItem' => 2,
            'idItem' => $id,
            'nip' => $nip,
            'colForm' => $colForm,
            'pdd' => $pdd,
            'riwayatPDD' => $riwayatPDD,
        ];

        return view('admin/edit/tambah_pdd', $data);
    }

    public function tambahitempdd($nip, $pdd)
    {
        $dataPdd = $this->request->getVar();
        $dataPdd['nip'] = $nip;

        try {
            switch ($pdd) {
                case 'dikum':
                    $this->rwyDikumModel->insert($dataPdd);
                    break;
                case 'dikbangspes':
                    dd('ini emang bangspes');
                    break;
            }

            session()->setFlashdata('success-add', 'Data pendidikan berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->setFlashdata('failed-add', 'Data pendidikan gagal ditambahkan');
        }

        // return redirect()->to(base_url("/admin/detailpegawai/tambahpdd/$nip/dikum"));
        return redirect()->back();
    }
    public function deleteDataPdd($nip, $pdd, $idItem)
    {
        try {
            switch ($pdd) {
                case 'dikum':
                    $this->rwyDikumModel->delete($idItem);
                    break;
                case 'dikpol':
                    $this->rwyDikpolModel->delete($idItem);
                    break;
                case 'dikbangum':
                    $this->rwyDikbangumModel->delete($idItem);
                    break;
                case 'dikbangspes':
                    $this->rwyDikbangspesModel->delete($idItem);
                    break;
                default:
                    break;
            }
            session()->setFlashdata('success-delete', 'Data pendidikan berhasil dihapus');
        } catch (\Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }

    public function editdatapdd($nip, $pdd, $id)
    {
        $dataPDD = $this->request->getVar();

        try {
            switch ($pdd) {
                case 'dikum':
                    $this->rwyDikumModel->update($id, $dataPDD);
                    break;
                case 'dikpol':
                    $this->rwyDikpolModel->update($id, $dataPDD);
                    break;
                case 'dikbangum':
                    $this->rwyDikbangumModel->update($id, $dataPDD);
                    break;
                case 'dikbangspes':
                    $this->rwyDikbangspesModel->update($id, $dataPDD);
                    break;
                default:
                    # code...
                    break;
            }

            session()->setFlashdata('success-edit', "Data berhasil di edit");
        } catch (Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        // return redirect()->to(base_url("/admin/detailpegawai/tambahpdd/$nip/$pdd"));
        return redirect()->back();
    }
    // pendidikan

    // keluarga

    public function keluarga($nip, $idItem = null)
    {
        $colForm = ['Nama' => 'nama_keluarga', 'nik' => 'nik_keluarga', 'tanggal lahir' => 'tanggal_lahir_keluarga', 'Jenis Kelamin' => 'jenis_kelamin_keluarga', 'status' => 'status_keluarga'];
        $dataKeluarga = $this->keluargaModel->where('nip', $nip)->findAll();

        $data = [
            'title' => 'Keluarga',
            'nip' => $nip,
            'colForm' => $colForm,
            'dataKeluarga' => $dataKeluarga,
            'idItem' => $idItem,
        ];

        return view('admin/edit/keluarga', $data);
    }

    public function tambahkeluarga($nip)
    {
        $dataKeluarga = $this->request->getVar();

        try {
            $this->keluargaModel->insert($dataKeluarga);

            session()->setFlashdata('success-add', 'Tambah data keluarga berhasil!');
        } catch (Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        // return redirect()->to(base_url("/admin/detailpegawai/keluarga/$nip/"));
        return redirect()->back();
    }

    public function editkeluarga($nip, $idItem)
    {
        $dataKeluarga = $this->request->getVar();

        try {
            $this->keluargaModel->update($idItem, $dataKeluarga);

            session()->setFlashdata('success-edit', 'Data keluarga berhasil diperbaharui');
        } catch (\Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        // return redirect()->to(base_url("/admin/detailpegawai/keluarga/$nip"));
        return redirect()->back();
    }

    public function deletekeluarga($nip, $id)
    {
        try {
            $this->keluargaModel->delete($id);

            session()->setFlashdata('success-delete', 'Data keluarga berhasil dihapus');
        } catch (\Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }

    // keluarga

    // riwayat Pekerjaan
    public function RwyPekerjaan($nip, $edit = null, $idItem = null)
    {
        $riwayatPekerjaan = $this->rwyPekerjaanModel->getOrderedData($nip);
        $colRwyPkj = ['No SK' => 'no_sk', 'Jabatan' => 'id_jabatan', 'Satker' => 'id_satker', 'Bagian' => 'id_bagian', 'Subbag' => 'id_subbag', 'Periode Mulai' => 'periode_mulai', 'Periode Selesai' => 'periode_selesai'];
        $colRwyPekerjaan = ['sk' => 'no_sk', 'jabatan' => 'nama_jabatan', 'satker' => 'nama_satker', 'bagian' => 'nama_bagian', 'subbag' => 'nama_subbag', 'periode mulai' => 'periode_mulai', 'periode selesai' => 'periode_selesai'];
        $data = [
            'title' => 'Tambah Riwayat Pekerjaan',
            'idItem' => $idItem,
            'edit' => $edit,
            'nip' => $nip,
            'jabatan' => $this->jabatanModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll(),
            'riwayatPekerjaan' => $riwayatPekerjaan,
            'colRwyPekerjaan' => $colRwyPekerjaan
        ];

        return view('admin/edit/edit_rwy_pkj', $data);
    }

    public function tambahRwyPekerjaan()
    {
        $colRwyPekerjaan = $this->poldaModel->getTableCollumn('riwayat_pekerjaan');
        $dataPekerjaan = $this->extractData($colRwyPekerjaan, $this->request->getVar());
        $nip = $this->request->getVar('nip');

        try {
            $this->rwyPekerjaanModel->insert($dataPekerjaan);

            session()->setFlashdata('success-add', "Tambah data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->back();
    }

    public function saveRwyPekerjaan()
    {
        $dataPekerjaan = $this->extractData($this->poldaModel->getTableCollumn('riwayat_pekerjaan'), $this->request->getVar());

        try {
            $this->rwyPekerjaanModel->save($dataPekerjaan);

            session()->setFlashdata('success-edit', "Edit data berhasil");
        } catch (Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->back();
    }

    public function deleterwypekerjaan($id)
    {
        try {
            $this->rwyPekerjaanModel->delete($id);

            session()->setFlashdata('success-delete', 'Data riwayat pekerjaan berhasil dihapus!');
        } catch (Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }

    // riwayat Pekerjaan

    // riwayat golongan
    public function RwyGolongan($nip, $edit = null, $idItem = null)
    {
        $riwayatGolongan = $this->rwyGolonganModel->getOrderedData($nip);
        $colRwyGolongan = ['sk' => 'no_sk', 'golongan' => 'id_golongan', 'periode mulai' => 'periode_mulai', 'periode selesai' => 'periode_selesai'];

        $data = [
            'title' => 'Tambah Riwayat Golongan',
            'edit' => $edit,
            'nip' => $nip,
            'idItem' => $idItem,
            'riwayatGolongan' => $riwayatGolongan,
            'colRwyGolongan' => $colRwyGolongan,
            'golongan' => $this->golonganModel->findAll(),

        ];

        return view('admin/edit/edit_rwy_gol', $data);
    }

    public function tambahriwayatgol()
    {
        $colRwyGolongan = $this->poldaModel->getTableCollumn('riwayat_golongan');
        $dataGolongan = $this->extractData($colRwyGolongan, $this->request->getVar());
        $nip = $this->request->getVar('nip');
        // dd($colRwyGolongan, $dataGolongan, $nip);

        try {
            $this->rwyGolonganModel->insert($dataGolongan);

            session()->setFlashdata('success-add', "Tambah data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->back();
    }

    public function saveRwyGolongan()
    {
        $dataGolongan = $this->extractData($this->poldaModel->getTableCollumn('riwayat_golongan'), $this->request->getVar());

        try {
            $this->rwyGolonganModel->save($dataGolongan);

            session()->setFlashdata('success-edit', "Edit data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->to(base_url('/admin/rwy_golongan/' . $dataGolongan['nip']));
    }

    public function deleterwygolongan($id)
    {
        try {
            $this->rwyGolonganModel->delete($id);

            session()->setFlashdata('success-delete', 'Data riwayat pekerjaan berhasil dihapus!');
        } catch (Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }
    // riwayat golongan

    public function extractData($col, $data)
    {
        $container = array();

        foreach ($col as $name) {
            try {
                if (str_contains($name, 'id_')) {
                    $data[$name] = explode(' ', $data[$name]);
                    $container[$name] = $data[$name][0];
                } else {
                    $container[$name] = $data[$name];
                }
            } catch (Exception $e) { }
        }

        return $container;
    }
}
