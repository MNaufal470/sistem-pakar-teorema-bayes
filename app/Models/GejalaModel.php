<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table = 'tbl_gejala';
    protected $primaryKey = 'id_gejala';
    protected $allowedFields = ['name','kode_gejala','nama_gejala'];
    protected $returnType = 'App\Entities\Gejala';
    protected $useTimestamps = false;

    public function kodeGejala(){
       $builder = $this->db->query('select max(kode_gejala) as max_id from tbl_gejala');
       $rows = $builder->getRow();
       $kode = $rows->max_id;
       $noUrut =  substr($kode, 1,2);
       $noUrut++;
       $char = "G";
       $kode = $char . sprintf("%02s", $noUrut);
       return $kode;
    }
    public function getAllGejala(){
        $builder = $this->db->query('select * from tbl_gejala');
        return $builder;
    }
}
?>