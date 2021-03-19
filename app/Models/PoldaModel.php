<?php

namespace App\Models;

use CodeIgniter\Model;

class PoldaModel extends Model
{
    public function getAllData()
    {
        $builder = $this->db->query("SELECT * FROM pegawai");

        return $builder->getResultArray();
    }

    public function runQuery($query)
    {
        return $this->db->query($query)->getResultArray();
    }

    public function getTableCollumn($table)
    {
        return $this->getFieldNames($table);
    }

    public function getTableData($table)
    {
        $builder = $this->db->table($table);

        return $builder->get()->getResultArray();
    }

    public function insertDataArray($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->insert($data);

        return $this->affectedRows();
    }

    public function searchData($keyword, $columns, $filterItem, $rangeItem)
    {
        if (empty($rangeItem)) {
            $rangeItem[0] = '';
            $rangeItem[1] = '';
        }


        $likeClause = '';
        $selectClause = '';
        $filterClause = '';
        if ($keyword != '') {
            foreach ($columns as $c) {
                $likeItem = $c . " LIKE '%" . $keyword . "%'";
                $likeClause .= $likeItem;
                $likeClause .= ' or ';
            }
        }

        foreach ($columns as $c) {
            $selectClause .= $c;
            $selectClause .= ',';
        }

        $field = '';
        $filterLength = count($filterItem);
        $x = 1;


        foreach ($filterItem as $name => $value) {
            $filter = '';
            if ($field == '') {
                $filter = '(';
            } else {
                $filter = $field == $value ? " or " : ") and (";
            }

            $filter .= $value . " = '" . $name . "'";
            $filter = str_replace("@", ".", $filter);
            $filterClause .= $filter;

            $filterClause .= $x == $filterLength ? ")" : "";

            $field = $value;
            $x++;
        }

        if ($rangeItem[0] != '' && $rangeItem[1] != '') {
            $filter = '';
            if ($field == '') {
                $filter = '(';
            } else {
                $filter = $field == 'tanggal_pengangkatan' ? " or " : " and (";
            }

            $filter .= " tanggal_pengangkatan BETWEEN '" . $rangeItem[0] . "' AND '" . $rangeItem[1] . "')";
            $filter = str_replace("@", ".", $filter);
            $filterClause .= $filter;

            $filterClause .= $x == $filterLength ? ")" : "";

            $field = 'tanggal_pengangkatan';
            $x++;
        }

        $likeClause = substr_replace($likeClause, '', -3);
        $selectClause = substr_replace($selectClause, '', -1);


        $query = "
            SELECT 
            " . $selectClause . ",users.role
                FROM 
                    pegawai p
                LEFT OUTER JOIN (
                    SELECT t1.* 
                    FROM riwayat_pekerjaan t1
                    WHERE t1.periode_mulai = (
                        SELECT periode_mulai FROM riwayat_pekerjaan
                         WHERE nip = t1.nip
                         ORDER BY periode_mulai DESC
                         LIMIT 1
                    )
                ) as q 
                    on q.nip = p.nip
                LEFT OUTER JOIN (
                    SELECT t3.*
                    FROM riwayat_golongan t3
                    WHERE t3.periode_mulai = (
                        SELECT periode_mulai from riwayat_golongan
                        WHERE nip = t3.nip
                        ORDER by periode_mulai DESC
                        LIMIT 1
                    )
                ) as s
                    ON s.nip = p.nip
                LEFT OUTER JOIN satker ON
                    q.id_satker = satker.id_satker
                LEFT OUTER JOIN bagian ON
                    q.id_bagian = bagian.id_bagian
                LEFT OUTER JOIN subbag ON
                    q.id_subbag = subbag.id_subbag
                LEFT OUTER JOIN jabatan ON
                    q.id_jabatan = jabatan.id_jabatan
                LEFT OUTER JOIN golongan ON
                    s.id_golongan = golongan.id_golongan
                LEFT OUTER JOIN users ON
                    p.nip = users.nip
                WHERE 
                        users.role != 'admin'
                        
";
        if ($keyword != "" || !empty($filterItem) || ($rangeItem[0] != '' && $rangeItem[1] != '')) {

            $query .= " AND ";

            if (!empty($filterItem) || ($rangeItem[0] != '' && $rangeItem[1] != '')) {
                $query .= $filterClause;
                if ($keyword != "") {
                    $query .= " and ";
                }
            }

            if ($keyword != "") {
                $query .= "(" . $likeClause . ")";
            }
        }


        $dataPegawai = $this->db->query($query)->getResultArray();
        return array($dataPegawai, $query);
    }

    public function selectBuilder($keyword, $columns, $filterItem, $rangeItem)
    {
        // like and where query
        if (empty($rangeItem)) {
            $rangeItem[0] = '';
            $rangeItem[1] = '';
        }


        $likeClause = '';
        $selectClause = '';
        $filterClause = '';
        if ($keyword != '') {
            foreach ($columns as $c) {
                $likeItem = $c . " LIKE '%" . $keyword . "%'";
                $likeClause .= $likeItem;
                $likeClause .= ' or ';
            }
        }

        foreach ($columns as $c) {
            $selectClause .= $c;
            $selectClause .= ',';
        }

        $field = '';
        $filterLength = count($filterItem);
        $x = 1;


        foreach ($filterItem as $name => $value) {
            $filter = '';
            if ($field == '') {
                $filter = '(';
            } else {
                $filter = $field == $value ? " or " : ") and (";
            }

            $filter .= $value . " = '" . $name . "'";
            $filter = str_replace("@", ".", $filter);
            $filterClause .= $filter;

            $filterClause .= $x == $filterLength ? ")" : "";

            $field = $value;
            $x++;
        }

        if ($rangeItem[0] != '' && $rangeItem[1] != '') {
            $filter = '';
            if ($field == '') {
                $filter = '(';
            } else {
                $filter = $field == 'tanggal_pengangkatan' ? " or " : " and (";
            }

            $filter .= " tanggal_pengangkatan BETWEEN '" . $rangeItem[0] . "' AND '" . $rangeItem[1] . "')";
            $filter = str_replace("@", ".", $filter);
            $filterClause .= $filter;

            $filterClause .= $x == $filterLength ? ")" : "";

            $field = 'tanggal_pengangkatan';
            $x++;
        }

        $likeClause = substr_replace($likeClause, '', -3);
        $selectClause = substr_replace($selectClause, '', -1);
        //like and where query

        $builder = $this->db->table('pegawai p');

        // get select clause
        foreach ($columns as $col) {
            $builder->select($col);
        }

        $builder->join("(
                    SELECT t3.*
                    FROM riwayat_golongan t3
                    WHERE t3.periode_mulai = (
                        SELECT periode_mulai from riwayat_golongan
                        WHERE nip = t3.nip
                        ORDER by periode_mulai DESC
                        LIMIT 1
                        )
                    ) as r_gol 
                ", "r_gol.nip = p.nip", "LEFT OUTER")
            ->join("(
                    SELECT t1.* 
                    FROM riwayat_pekerjaan t1
                    WHERE t1.periode_mulai = (
                        SELECT periode_mulai FROM riwayat_pekerjaan
                        WHERE nip = t1.nip
                        ORDER BY periode_mulai DESC
                        LIMIT 1
                        )
                    ) as r_pkj 
                ", "r_pkj.nip = p.nip", "LEFT OUTER")
            ->join("satker sat", "sat.id_satker = r_pkj.id_satker", "LEFT OUTER")
            ->join("bagian bag", "bag.id_bagian = r_pkj.id_bagian", "LEFT OUTER")
            ->join("subbag sub", "sub.id_subbag = r_pkj.id_subbag", "LEFT OUTER")
            ->join("jabatan jbt", "jbt.id_jabatan = r_pkj.id_jabatan", "LEFT OUTER")
            ->join("golongan gol", "gol.id_golongan = r_gol.id_golongan", "LEFT OUTER")
            ->join("riwayat_dikbangspes spes", "spes.nip = p.nip", "LEFT OUTER")
            ->join("riwayat_dikbangum um", "um.nip = p.nip", "LEFT OUTER")
            ->join("riwayat_dikum kum", "kum.nip = p.nip", "LEFT OUTER")
            ->join("riwayat_dikpol pol", "pol.nip = p.nip", "LEFT OUTER")
            ->join("users", "users.nip = p.nip", "LEFT OUTER")
            ->where("users.role != 'admin'");

        // return query first
        $query = $builder->getCompiledSelect();

        // process for adding the required like and filter clause
        if ($keyword != "" || !empty($filterItem) || ($rangeItem[0] != '' && $rangeItem[1] != '')) {
            $query .= " AND ";

            if (!empty($filterItem) || ($rangeItem[0] != '' && $rangeItem[1] != '')) {
                $query .= $filterClause;
                if ($keyword != "") {
                    $query .= " and ";
                }
            }

            if ($keyword != "") {
                $query .= "(" . $likeClause . ")";
            }
        }

        $result = [
            'query' => $query,
            'data' => $this->db->query($query)->getResultArray()
        ];
        // dd($query);
        // get array from query and return it
        return $result;
    }

    public function testDua()
    {
        $builder = $this->db->like("title", "ass");

        return $builder->getCompiledSelect();
    }

    public function countPegawai()
    {
        $builder = $this->db->table('pegawai')
            ->where("users.role != 'admin'")
            ->countAllResults();

        return $builder;
    }

    public function getPegawaiSatkerOnly()
    {
        $builder = $this->db->table('pegawai p');
        $builder->select('nama_satker');
        $builder->join("(
                    SELECT t3.*
                    FROM riwayat_golongan t3
                    WHERE t3.periode_mulai = (
                        SELECT periode_mulai from riwayat_golongan
                        WHERE nip = t3.nip
                        ORDER by periode_mulai DESC
                        LIMIT 1
                        )
                    ) as r_gol 
                ", "r_gol.nip = p.nip", "LEFT OUTER")
            ->join("(
                    SELECT t1.* 
                    FROM riwayat_pekerjaan t1
                    WHERE t1.periode_mulai = (
                        SELECT periode_mulai FROM riwayat_pekerjaan
                        WHERE nip = t1.nip
                        ORDER BY periode_mulai DESC
                        LIMIT 1
                        )
                    ) as r_pkj 
                ", "r_pkj.nip = p.nip", "LEFT OUTER")
            ->join("satker sat", "sat.id_satker = r_pkj.id_satker", "LEFT OUTER")
            ->join("bagian bag", "bag.id_bagian = r_pkj.id_bagian", "LEFT OUTER")
            ->join("subbag sub", "sub.id_subbag = r_pkj.id_subbag", "LEFT OUTER")
            ->join("jabatan jbt", "jbt.id_jabatan = r_pkj.id_jabatan", "LEFT OUTER")
            ->join("golongan gol", "gol.id_golongan = r_gol.id_golongan", "LEFT OUTER")
            ->join("users", "users.nip = p.nip", "LEFT OUTER")
            ->where("users.role != 'admin'")
            ->where("nama_satker != ''");

        return $builder->get()->getResultArray();
    }
}
