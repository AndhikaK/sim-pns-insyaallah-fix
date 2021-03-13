<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyGolonganModel extends Model
{
    protected $table = 'riwayat_golongan';
    protected $primaryKey = 'id_riwayat_golongan';
    protected $allowedFields = ['nip', 'no_sk', 'id_golongan', 'periode_mulai', 'periode_selesai'];

    public function getOrderedData($nip)
    {
        $builder = $this->db->table($this->table);

        $builder->where('nip', $nip);
        $builder->join('golongan', 'golongan.id_golongan = .riwayat_golongan.id_golongan');
        $builder->orderBy('periode_mulai', 'DESC');

        return $builder->get()->getResultArray();
    }
}
