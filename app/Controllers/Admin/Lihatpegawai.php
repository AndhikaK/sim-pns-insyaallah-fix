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
    protected $usersModel;
    protected $rwyPekerjaanModel;
    protected $rwyGolonganModel;
    protected $keluargaModel;

    public function __construct()
    {
        $this->keluargaModel = new KeluargaModel();
        $this->rwyPekerjaanModel = new RwyPekerjaanModel();
        $this->rwyGolonganModel = new RwyGolonganModel();
        $this->poldaModel = new PoldaModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->jabatanModel = new JabatanModel();
        $this->golonganModel = new GolonganModel();
        $this->satkerModel = new SatkerModel();
        $this->bagianModel = new BagianModel();
        $this->subbagModel = new SubbagModel();
        $this->usersModel = new UsersModel();
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

    public function exportQuery()
    {
        $query = $this->request->getVar('searchQuery');
        $data = $this->poldaModel->runQuery(str_replace('__', ' ', $query));

        if (count($data) > 0) {
            $spreadsheet = new Spreadsheet();

            $column = array();

            $colAlpha = "A";
            foreach ($data[0] as $name => $value) {
                if ($name != 'role') {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue($colAlpha++ . '1', $name);
                    array_push($column, $name);
                }
            }

            $colNum = 2;
            foreach ($data as $row) {
                $colAlpha = "A";
                foreach ($column as $col) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue($colAlpha++ . $colNum, $row[$col]);
                }
                $colNum++;
            }

            $writer = new Xlsx($spreadsheet);
            $filename = 'Data';


            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }
    }

    public function import()
    {
        $data = [
            'title' => 'Import Data',
            'subTitle' => '',
            'menuPos' => 'import',
            'navItem' => 2
        ];

        return view('admin/import_data', $data);
    }

    public function importPegawai()
    {
        $file = $this->request->getFile('import-pegawai');

        if ($file) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $sheet = $reader->load($file);
            $data = $sheet->getActiveSheet()->toArray();

            $column = $data[0];
            $importedData = array();
            for ($i = 1; $i < count($data); $i++) {
                $j = 1;
                foreach ($column as $col) {
                    if ($col != 'No') {
                        if ($col == 'ttl' || $col == 'tanggal_pengangkatan') {
                            // $importedData[$i - 1][$col] = date_format($data[$i][$j++], "Y-m-d");
                            $importedData[$i - 1][$col] = date("Y-m-d", strtotime($data[$i][$j++]));
                            // dd($importedData[$i - 1][$col]);
                        } else {
                            $importedData[$i - 1][$col] = $data[$i][$j++];
                        }
                    }
                }
            }

            // dd($importedData);

            try {
                foreach ($importedData as $item) {
                    $passTTL = str_replace('-', '', $item['ttl']);
                    $users = [
                        'nip' => $item['nip'],
                        'password' => $passTTL,
                        'role' => 'user',
                        'status' => 1
                    ];
                    $this->pegawaiModel->insert($item);
                    $this->usersModel->insert($users);
                }

                session()->setFlashdata('success-add', "Import data pegawai berhasil!");
            } catch (Exception $e) {
                session()->setFlashdata('failed-add', $e);
                dd($importedData, $e);
            }

            return redirect()->back();
        }
    }

    public function importRwyPekerjaan()
    {
        $file = $this->request->getFile('import-pekerjaan');

        if ($file) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $sheet = $reader->load($file);
            $data = $sheet->getActiveSheet()->toArray();

            $column = $data[0];
            $importedData = array();
            for ($i = 1; $i < count($data); $i++) {
                $j = 1;
                foreach ($column as $col) {
                    if ($data[$i][1] != null) {
                        if ($col != 'No' && $col != null) {
                            if ($col == 'periode_mulai' || $col == 'periode_selesai') {
                                if ($data[$i][$j] == null) {
                                    $importedData[$i - 1][$col] = "1000-01-01";
                                } else {
                                    $importedData[$i - 1][$col] = date("Y-m-d", strtotime($data[$i][$j++]));
                                }
                            } else {
                                $importedData[$i - 1][$col] = $data[$i][$j++];
                            }
                        }
                    }
                }
            }

            try {
                foreach ($importedData as $item) {
                    $this->rwyPekerjaanModel->insert($item);
                }

                session()->setFlashdata('success-add', "Import data pegawai berhasil!");
            } catch (Exception $e) {
                session()->setFlashdata('failed-add', $e);
            }

            return redirect()->back();
        }
    }

    public function importRwyGolongan()
    {
        $file = $this->request->getFile('import-rwy-golongan');

        if ($file) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $sheet = $reader->load($file);
            $data = $sheet->getActiveSheet()->toArray();

            $column = $data[0];
            $importedData = array();
            for ($i = 1; $i < count($data); $i++) {
                $j = 1;
                foreach ($column as $col) {
                    if ($data[$i][1] != null) {
                        if ($col != 'No' && $col != null) {
                            if ($col == 'periode_mulai' || $col == 'periode_selesai') {
                                if ($data[$i][$j] == null) {
                                    $importedData[$i - 1][$col] = "1000-01-01";
                                } else {
                                    $importedData[$i - 1][$col] = date("Y-m-d", strtotime($data[$i][$j++]));
                                }
                            } else {
                                $importedData[$i - 1][$col] = $data[$i][$j++];
                            }
                        }
                    }
                }
            }

            try {
                foreach ($importedData as $item) {
                    $this->rwyGolonganModel->insert($item);
                }

                session()->setFlashdata('success-add', "Import data pegawai berhasil!");
            } catch (Exception $e) {
                session()->setFlashdata('failed-add', $e);
            }

            return redirect()->back();
        }
    }

    public function importKeluarga()
    {
        $file = $this->request->getFile('import-keluarga');

        if ($file) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $sheet = $reader->load($file);
            $data = $sheet->getActiveSheet()->toArray();

            $column = $data[0];
            $importedData = array();
            for ($i = 1; $i < count($data); $i++) {
                $j = 1;
                foreach ($column as $col) {
                    if ($data[$i][1] != null) {
                        if ($col != 'No' && $col != null) {
                            if ($col == 'tanggal_lahir_keluarga') {
                                if ($data[$i][$j] == null) {
                                    $importedData[$i - 1][$col] = null;
                                } else {
                                    $importedData[$i - 1][$col] = date("Y-m-d", strtotime($data[$i][$j++]));
                                }
                            } else {
                                $importedData[$i - 1][$col] = $data[$i][$j++];
                            }
                        }
                    }
                }
            }

            try {
                foreach ($importedData as $item) {
                    $this->keluargaModel->insert($item);
                }

                session()->setFlashdata('success-add', "Import data pegawai berhasil!");
            } catch (Exception $e) {
                session()->setFlashdata('failed-add', $e);
            }

            return redirect()->back();
        }
    }
}
