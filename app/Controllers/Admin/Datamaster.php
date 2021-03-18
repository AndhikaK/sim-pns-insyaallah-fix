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
use App\Models\RwyGolonganModel;
use App\Models\RwyPekerjaanModel;
use App\Models\UsersModel;
use PhpParser\Node\Stmt\Break_;

class Datamaster extends BaseController
{

    protected $usersModel;
    protected $poldaModel;
    protected $jabatanModel;
    protected $golonganModel;
    protected $satkerModel;
    protected $bagianModel;
    protected $subbagModel;
    protected $pegawaiModel;
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
    }
    public function index($master = null, $edit = null)
    {
        $data = [
            'title' => 'Master Data',
            'navItem' => 4,
            'menuPos' => 'data-master',
            'subTitle' => '',
            'colTable' => $this->poldaModel->getTableCollumn($master),
            'dataTable' => $this->poldaModel->getTableData($master),
            'jabatan' => $this->jabatanModel->findAll(),
            'golongan' => $this->golonganModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll(),
            'master' => $master,
            'edit' => $edit
        ];

        return view('admin/data_master', $data);
    }

    public function saveMasterData($table)
    {
        // dd($this->request->getVar());
        if ($table == 'bagian' || $table == 'subbag') {
            $dataInsert['id_' . $table] = $this->request->getVar('idHolder') . $this->request->getVar('id_' . $table);
            $dataInsert['nama_' . $table] = $this->request->getVar('nama_' . $table);
        } else {
            $dataInsert = $this->request->getVar();
        }

        try {

            $this->poldaModel->insertDataArray($table, $dataInsert);

            session()->setFlashdata('success-add', "Data berhasil ditambahkan!");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->to(base_url('/admin/data_master/' . $table));
    }

    public function updateData()
    {
        $table = $this->request->getVar('table');
        $primaryKey = $this->request->getVar('id_' . $table);


        $data = array();
        foreach ($this->request->getVar() as $name => $value) {
            if ($name != 'table' && !str_contains($name, 'id')) {
                $data[$name] = $value;
            }
        }

        d($table, $primaryKey, $data, $this->request->getVar());

        try {
            switch ($table) {
                case $table == 'jabatan':
                    $this->jabatanModel->update($primaryKey, $data);
                    break;
                case $table == 'golongan':
                    $this->golonganModel->update($primaryKey, $data);
                    break;
                case $table == 'satker':
                    $this->satkerModel->update($primaryKey, $data);
                    break;
                case $table == 'bagian':
                    $this->bagianModel->update($primaryKey, $data);
                    break;
                case $table == 'subbag':
                    $this->subbagModel->update($primaryKey, $data);
                    break;
            }

            session()->setFlashdata('success-edit', "Edit data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->to(base_url('/admin/data_master/' . $table));
    }

    public function deleteData($table, $id)
    {
        try {
            switch ($table) {
                case $table == 'jabatan':
                    $this->jabatanModel->delete($id);
                    break;
                case $table == 'golongan':
                    $this->golonganModel->delete($id);
                    break;
                case $table == 'satker':
                    $this->satkerModel->delete($id);
                    break;
                case $table == 'bagian':
                    $this->bagianModel->delete($id);
                    break;
                case $table == 'subbag':
                    $this->subbagModel->delete($id);
                    break;
            }

            session()->setFlashdata('success-delete', "Edit data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->to(base_url('/admin/data_master/' . $table));
    }
}
