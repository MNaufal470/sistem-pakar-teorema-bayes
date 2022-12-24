<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = ' tbl_hasil_diagnosa';
    protected $primaryKey = 'id_hasil';
    protected $allowedFields = ['hasil_probabilitas','nama_kerusakan','nama_user','solusi','biaya','waktu'];
}
?>