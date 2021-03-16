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


class Beranda extends BaseController
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

    public function index()
    {
        $totalPegawai = $this->pegawaiModel->where("nip != 'admin'")->countAllResults();
        $totalSatker = $this->satkerModel->countAllResults();
        $totalBagian = $this->bagianModel->countAllResults();
        $totalSubbag = $this->subbagModel->countAllResults();

        $data = [
            'title' => 'Beranda',
            'subTitle' => '',
            'menuPos' => 'beranda',
            'totalPegawai' => $totalPegawai,
            'totalSatker' => $totalSatker,
            'totalBagian' => $totalBagian,
            'totalSubbag' => $totalSubbag,
        ];

        return view('admin/index', $data);
    }

    public function testPage()
    {
        return view('test');
    }
}
