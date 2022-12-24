<?php

namespace App\Models;

use CodeIgniter\Model;

class KerusakanModel extends Model
{
    protected $table = 'tbl_kerusakan';
    protected $primaryKey = 'id_kerusakan';
    protected $allowedFields = ['kode_kerusakan','nama_kerusakan','probabilitas','gambar','solusi','biaya'];
    protected $returnType = 'App\Entities\Kerusakan';
    protected $useTimestamps = false;

    public function kodeKerusakan(){
       $builder = $this->db->query('select max(kode_kerusakan) as max_id from tbl_kerusakan');
       $rows = $builder->getRow();
       $kode = $rows->max_id;
       $noUrut =  substr($kode, 1,2);
       $noUrut++;
       $char = "K";
       $kode = $char . sprintf("%02s", $noUrut);
       return $kode;
    }
    public function getAllKerusakan(){
        $builder = $this->db->query('select * from tbl_kerusakan');
        return $builder;
    }
}
?>