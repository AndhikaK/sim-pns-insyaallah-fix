<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BagianModel;
use App\Models\PoldaModel;
use App\Models\SatkerModel;
use App\Models\SubbagModel;
use App\Models\JabatanModel;
use App\Models\GolonganModel;
use App\Models\PegawaiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lihatpegawai extends BaseController
{
    protected $poldaModel;
    protected $jabatanModel;
    protected $golonganModel;
    protected $satkerModel;
    protected $bagianModel;
    protected $subbagModel;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->poldaModel = new PoldaModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->jabatanModel = new JabatanModel();
        $this->golonganModel = new GolonganModel();
        $this->satkerModel = new SatkerModel();
        $this->bagianModel = new BagianModel();
        $this->subbagModel = new SubbagModel();
    }

    public function index()
    {
        $pager = \Config\Services::pager();

        $columns = [];
        $filterItem = array();
        $keyword = null;
        $filterData = array();
        $rangeData  = array();

        if (count($this->request->getVar()) > 0) {
            $keyword = $this->request->getVar('keyword');
            $filterData = $this->request->getVar();
        }

        if (!isset($_GET['second'])) {
            $columns = ['nip' => 'p.nip', 'Nama_Pegawai' => 'nama_pegawai', 'Pangkat' => 'pangkat', 'Jabatan' => 'nama_jabatan', 'Satker' => 'nama_satker', 'Bagian' => 'nama_bagian', 'Subbag' => 'nama_subbag'];
        }
        foreach ($filterData as $name => $value) {
            if ($name != 'keyword' && $name != 'page' && $name != 'second') {
                if (!str_contains($name, 'filter') && !str_contains($name, 'range') && !str_contains($name, 'perPage')) {
                    $columns[$name] = $value;
                } elseif (str_contains($name, 'filter')) {
                    $nameFilter = explode("-", $name);
                    $nameFilter = $nameFilter[1];
                    foreach ($value as $val) {
                        $filterItem[$val] = $nameFilter;
                    }
                } elseif (str_contains($name, 'range')) {
                    if (str_contains($name, 'dari'))
                        $rangeData[0] = $value;
                    elseif (str_contains($name, 'sampai'))
                        $rangeData[1] = $value;
                }
            }
        }

        $rawDataPegawai = $this->poldaModel->selectBuilder($keyword, $columns, $filterItem, $rangeData);

        $totalData = count($rawDataPegawai['data']);
        $perPage = 10;
        if (isset($_GET['perPage'])) {
            $perPage = $_GET['perPage'] == 'semua' ? $totalData : $_GET['perPage'];
        }
        // $perPage = isset($_GET['perPage']) ? $_GET['perPage'] : 10;
        $searchQuery = $rawDataPegawai['query'];

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $start = ($perPage * $page) - $perPage;
            $searchQuery .= "ORDER BY p.nip ASC LIMIT $start, $perPage";
        } else {
            $searchQuery .= "ORDER BY p.nip ASC LIMIT 0, $perPage";
        }

        $dataPegawai = $this->poldaModel->runQuery($searchQuery);

        $data = [
            'title' => 'Data Pegawai',
            'subTitle' => 'Daftar Pegawai Negeri Sipil - POLDA Lampung',
            'menuPos' => 'lihat-pegawai',
            'pager' => $pager,
            'perPage' => $perPage,
            'total' => $totalData,
            'keyword' => $keyword,
            'columns' => $columns,
            'dataPegawai' => $dataPegawai,
            'query' => $rawDataPegawai['query'],
            'jabatan' => $this->jabatanModel->findAll(),
            'pangkat_golongan' => $this->golonganModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll(),
        ];

        return view('admin/lihat_pegawai', $data);
    }

    public function deletePegawai($nip)
    {
        try {
            $this->pegawaiModel->delete($nip);
            session()->setFlashdata('success-delete', "NIP $nip berhasil dihapus!");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }
}
