<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    protected $allowedFields = ['nip', 'nik_keluarga', 'nama_keluarga', 'tanggal_lahir_keluarga', 'jenis_kelamin_keluarga', 'status_keluarga'];
}
