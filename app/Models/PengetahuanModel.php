<?php

namespace App\Models;

use CodeIgniter\Model;

class PengetahuanModel extends Model
{
    protected $table = 'tbl_pengetahuan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_kerusakan','id_gejala','probabilitas'];
    // protected $returnType = 'App\Entities\Gejala';
    // protected $useTimestamps = false;

    public function getAllPengetahuan(){
        $queryRule = "SELECT `tbl_pengetahuan`.`id`,`tbl_kerusakan`.`kode_kerusakan`,`tbl_kerusakan`.`nama_kerusakan`,`tbl_gejala`.`kode_gejala`,`tbl_gejala`.`nama_gejala`,`tbl_pengetahuan`.`probabilitas`,`tbl_gejala`.`id_gejala`,`tbl_kerusakan`.`id_kerusakan`
        FROM `tbl_kerusakan` JOIN `tbl_pengetahuan` 
        ON `tbl_kerusakan`.`id_kerusakan` = `tbl_pengetahuan`.`id_kerusakan`
        JOIN `tbl_gejala` 
        ON `tbl_pengetahuan`.`id_gejala` = `tbl_gejala`.`id_gejala`
                        ";
    return $this->db->query($queryRule)->getResultArray();
    }
    public function getKerusakan(){
        $builder = $this->db->query("select * from tbl_kerusakan");
        return $builder;
    }
    public function getGejala(){
        $builder = $this->db->query("select * from tbl_gejala");
        return $builder;
    }
}
?>