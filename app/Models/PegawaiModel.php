<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nip', 'nik', 'nama_pegawai', 'ttl', 'tempat_lahir', 'alamat', 'jenis_kelamin', 'agama', 'tanggal_pengangkatan', 'profil'];
}
