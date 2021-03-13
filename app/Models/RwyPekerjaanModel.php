<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyPekerjaanModel extends Model
{
    protected $table = 'riwayat_pekerjaan';
    protected $primaryKey = 'id_riwayat_pekerjaan';
    protected $allowedFields = ['nip', 'no_sk', 'id_jabatan', 'id_satker', 'id_bagian', 'id_subbag', 'periode_mulai', 'periode_selesai'];

    public function getOrderedData($nip)
    {
        $builder = $this->db->table($this->table);

        $builder->where('nip', $nip);
        $builder->join('jabatan', "jabatan.id_jabatan = riwayat_pekerjaan.id_jabatan");
        $builder->join('satker', "satker.id_satker = riwayat_pekerjaan.id_satker");
        $builder->join('bagian', "bagian.id_bagian = riwayat_pekerjaan.id_bagian");
        $builder->join('subbag', "subbag.id_subbag = riwayat_pekerjaan.id_subbag");

        $builder->orderBy('periode_mulai', 'DESC');

        return $builder->get()->getResultArray();
    }
}
