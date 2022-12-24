<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosaModel extends Model
{
    protected $table = 'tbl_kerusakan';
    protected $primaryKey = 'id_kerusakan';
    protected $allowedFields = ['kode_kerusakan','nama_kerusakan','probabilitas','gambar','solusi'];

    public function emptyTmpGejala()
  {
    $db = db_connect();
    $builder = $db->table('tmp_gejala');
    return $builder->truncate();
  }
  public function emptyTmpFinal()
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    return $builder->truncate();
  }
  public function insertTmpGejala($gejala,$id){
    $db = db_connect();
    $builder = $db->table('tmp_gejala');
    
    foreach($gejala as $g){
        $data = [
            'id_user'=>$id,
            'id_gejala'=>$g
        ];
   $builder->insert($data);
    }
  }
  public function insertTmpFinal(){
      $query = "SELECT `tmp_gejala`.`id_gejala`,`tbl_pengetahuan`.`id_kerusakan`,`tbl_pengetahuan`.`probabilitas`
      FROM `tbl_pengetahuan` JOIN `tmp_gejala` 
      ON `tmp_gejala`.`id_gejala` = `tbl_pengetahuan`.`id_gejala`";
    $builder = $this->db->query($query);
    return $builder;
  }
  public function inserBatchTmp($tmpGejala){
    $builder = $this->db->table('tmp_final');
    $builder->insertBatch($tmpGejala);
  }

  // Perhitungan tiap kerusakan
  // Perhitungan kerusakan 1
  // Perhitungan Probabilitas tiap kerusakan yang ada di tmp_final
  public function ProbK1()
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $builder->select('*');
    $builder->where('id_kerusakan', 1);
    $prob = $builder->get()->getResult();
    //inisialisasi untuk total probabilitas
    $jumlah = 0;
     // Perhitungan hasil bayes kerusakan 1
    // (Prob kerusakan di tmp_final * prob di tabel kerusakan)'
    $query = $db->table('tbl_kerusakan');
    $query->select('*');
    $query->where('id_kerusakan', 1);
    $data = $query->get()->getResult();
    // Ambil semua Probabilitas 
    $allProbabilities = $db->table('tbl_kerusakan');
    $allProbabilities->select('probabilitas');
    $nop = $allProbabilities->get()->getResult();
     // Ambil semua Probabilitas gejala 1
     $allGejalaProbabilities = $db->table('tbl_pengetahuan');
     $probK1 = 0;
    //  Ambil Sigmanya 
    foreach($prob as $p){
      $jumlah = $p->probabilitas * $data[0]->probabilitas;
      $allGejalaProbabilities->select('probabilitas');
      $allGejalaProbabilities->where('id_gejala', $p->id_gejala);
      $pon = $allGejalaProbabilities->get()->getResult();
      $i = 0;
      $Totalsigma = 0;
      $sigma = 0;
      // Jumlahkan Sigma
      foreach($pon as $g){
        $sigma = $g->probabilitas * $nop[$i]->probabilitas;
        $Totalsigma += $sigma;
        $i++;
      }
      $hitungBayes = $jumlah / $Totalsigma;
      $probK1 += $hitungBayes;
     }

    return number_format($probK1, 4, '.', '');

  }
  // Perhitungan kerusakan 2
  // Perhitungan Probabilitas tiap kerusakan yang ada di tmp_final
  public function ProbK2()
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $builder->select('*');
    $builder->where('id_kerusakan', 2);
    $prob = $builder->get()->getResult();
    //inisialisasi untuk total probabilitas
    $jumlah = 0;
    // Perhitungan hasil bayes kerusakan 1
    // (Prob kerusakan di tmp_final * prob di tabel kerusakan)'
    $query = $db->table('tbl_kerusakan');
    $query->select('*');
    $query->where('id_kerusakan', 2);
    $data = $query->get()->getResult();
    // Ambil semua Probabilitas 
    $allProbabilities = $db->table('tbl_kerusakan');
    $allProbabilities->select('probabilitas');
    $nop = $allProbabilities->get()->getResult();
     // Ambil semua Probabilitas gejala 2
     $allGejalaProbabilities = $db->table('tbl_pengetahuan');
     $probK2 = 0;
    //  Ambil Sigmanya 
    foreach($prob as $p){
      $jumlah = $p->probabilitas * $data[0]->probabilitas;
      $allGejalaProbabilities->select('probabilitas');
      $allGejalaProbabilities->where('id_gejala', $p->id_gejala);
      $pon = $allGejalaProbabilities->get()->getResult();
      $i = 0;
      $Totalsigma = 0;
      $sigma = 0;
      // Jumlahkan Sigma
      foreach($pon as $g){
        $sigma = $g->probabilitas * $nop[$i]->probabilitas;
        $Totalsigma += $sigma;
        $i++;
      }
      $hitungBayes = $jumlah / $Totalsigma;
      $probK2 += $hitungBayes;

     }

     return number_format($probK2, 4, '.', '');
  }
   // Perhitungan kerusakan 3
  // Perhitungan Probabilitas tiap kerusakan yang ada di tmp_final
  public function ProbK3()
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $builder->select('*');
    $builder->where('id_kerusakan', 3);
    $prob = $builder->get()->getResult();
    //inisialisasi untuk total probabilitas
    $jumlah = 0;
    // Perhitungan hasil bayes kerusakan 3
    // (Prob kerusakan di tmp_final * prob di tabel kerusakan)'
    $query = $db->table('tbl_kerusakan');
    $query->select('*');
    $query->where('id_kerusakan', 3);
    $data = $query->get()->getResult();
    // Ambil semua Probabilitas 
    $allProbabilities = $db->table('tbl_kerusakan');
    $allProbabilities->select('probabilitas');
    $nop = $allProbabilities->get()->getResult();
     // Ambil semua Probabilitas gejala 3
     $allGejalaProbabilities = $db->table('tbl_pengetahuan');
     $probK3 = 0;
    //  Ambil Sigmanya 
    foreach($prob as $p){
      $jumlah = $p->probabilitas * $data[0]->probabilitas;
      $allGejalaProbabilities->select('probabilitas');
      $allGejalaProbabilities->where('id_gejala', $p->id_gejala);
      $pon = $allGejalaProbabilities->get()->getResult();
      $i = 0;
      $Totalsigma = 0;
      $sigma = 0;
      // Jumlahkan Sigma
      foreach($pon as $g){
        $sigma = $g->probabilitas * $nop[$i]->probabilitas;
        $Totalsigma += $sigma;
        $i++;
      }
      $hitungBayes = $jumlah / $Totalsigma;
      $probK3 += $hitungBayes;
     }
     return number_format($probK3, 4, '.', '');
    
  }
     // Perhitungan kerusakan 4
  // Perhitungan Probabilitas tiap kerusakan yang ada di tmp_final
  public function ProbK4()
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $builder->select('*');
    $builder->where('id_kerusakan', 4);
    $prob = $builder->get()->getResult();
    //inisialisasi untuk total probabilitas
    $jumlah = 0;
   // Perhitungan hasil bayes kerusakan 3
    // (Prob kerusakan di tmp_final * prob di tabel kerusakan)'
    $query = $db->table('tbl_kerusakan');
    $query->select('*');
    $query->where('id_kerusakan', 4);
    $data = $query->get()->getResult();
    // Ambil semua Probabilitas 
    $allProbabilities = $db->table('tbl_kerusakan');
    $allProbabilities->select('probabilitas');
    $nop = $allProbabilities->get()->getResult();
     // Ambil semua Probabilitas gejala 4
     $allGejalaProbabilities = $db->table('tbl_pengetahuan');
     $probK4 = 0;
    //  Ambil Sigmanya 
    foreach($prob as $p){
      $jumlah = $p->probabilitas * $data[0]->probabilitas;
      $allGejalaProbabilities->select('probabilitas');
      $allGejalaProbabilities->where('id_gejala', $p->id_gejala);
      $pon = $allGejalaProbabilities->get()->getResult();
      $i = 0;
      $Totalsigma = 0;
      $sigma = 0;
      // Jumlahkan Sigma
      foreach($pon as $g){
        $sigma = $g->probabilitas * $nop[$i]->probabilitas;
        $Totalsigma += $sigma;
        $i++;
      }
      $hitungBayes = $jumlah / $Totalsigma;
      $probK4 += $hitungBayes;
     }
     return number_format($probK4, 4, '.', '');
  }
     // Perhitungan kerusakan 5
  // Perhitungan Probabilitas tiap kerusakan yang ada di tmp_final
  public function ProbK5()
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $builder->select('*');
    $builder->where('id_kerusakan', 5);
    $prob = $builder->get()->getResult();
    //inisialisasi untuk total probabilitas
    $jumlah = 0;
   // Perhitungan hasil bayes kerusakan 3
    // (Prob kerusakan di tmp_final * prob di tabel kerusakan)'
    $query = $db->table('tbl_kerusakan');
    $query->select('*');
    $query->where('id_kerusakan', 5);
    $data = $query->get()->getResult();
    // Ambil semua Probabilitas 
    $allProbabilities = $db->table('tbl_kerusakan');
    $allProbabilities->select('probabilitas');
    $nop = $allProbabilities->get()->getResult();
     // Ambil semua Probabilitas gejala 4
     $allGejalaProbabilities = $db->table('tbl_pengetahuan');
     $probK5 = 0;
    //  Ambil Sigmanya 
    foreach($prob as $p){
      $jumlah = $p->probabilitas * $data[0]->probabilitas;
      $allGejalaProbabilities->select('probabilitas');
      $allGejalaProbabilities->where('id_gejala', $p->id_gejala);
      $pon = $allGejalaProbabilities->get()->getResult();
      $i = 0;
      $Totalsigma = 0;
      $sigma = 0;
      // Jumlahkan Sigma
      foreach($pon as $g){
        $sigma = $g->probabilitas * $nop[$i]->probabilitas;
        $Totalsigma += $sigma;
        $i++;
      }
      $hitungBayes = $jumlah / $Totalsigma;
      $probK5 += $hitungBayes;
     }
     return number_format($probK5, 4, '.', '');
  }
  public function hasilProbK1($K1)
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $hasilK1 = ['hasil_probabilitas' => $K1];
    $builder->where('id_kerusakan', 1);
    $builder->update($hasilK1);
  }
  public function hasilProbK2($K2)
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $hasilK2 = ['hasil_probabilitas' => $K2];
    $builder->where('id_kerusakan', 2);
    $builder->update($hasilK2);
  }
  public function hasilProbK3($K3)
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $hasilK3 = ['hasil_probabilitas' => $K3];
    $builder->where('id_kerusakan', 3);
    $builder->update($hasilK3);
  }
  public function hasilProbK4($K4)
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $hasilK4 = ['hasil_probabilitas' => $K4];
    $builder->where('id_kerusakan', 4);
    $builder->update($hasilK4);
  }
  public function hasilProbK5($K5)
  {
    $db = db_connect();
    $builder = $db->table('tmp_final');
    $hasilK5 = ['hasil_probabilitas' => $K5];
    $builder->where('id_kerusakan', 5);
    $builder->update($hasilK5);
  }

  public function insertHasil($user){
    $db = db_connect();
    $builder = $db->table('tbl_hasil_diagnosa');
    $kerusakan = $this->detailDiagnosa()->getResultArray();
    foreach ($kerusakan as $k) {
      $kerusakannya = $k['nama_kerusakan'];
      $nilai = floor($k['hasil_probabilitas'] * 100);
      $solusi = $k['solusi'];
    }
    $data = [
      'hasil_probabilitas' => $nilai,
      'nama_kerusakan' => $kerusakannya,
      'nama_user' => $user,
      'solusi' => $solusi,
      'waktu' => time(),
    ];
    return $builder->insert($data);
  }

    //  Konversi Rupiah
    public function koversi($angka){
      $hasil_rupiah = "Rp " . number_format($angka);
      return $hasil_rupiah;
    }
  // Menampilkan Hasil diagnosa 

  // (Mendapatkan 3 Kerusakan dengan probabilitas yang terbesar)
  public function diagnosa()
  {
    $query = "SELECT DISTINCT `id_kerusakan`,`hasil_probabilitas` 
    FROM `tmp_final`
    ORDER BY `tmp_final`.`hasil_probabilitas` DESC LIMIT 3";
    return $this->db->query($query);
  }
    // Mendapatkan 1 kerusakan dengan probabilitas terbesar
    public function tertinggi()
    {
      $query = "SELECT `id_kerusakan`, MAX(`hasil_probabilitas`) FROM `tmp_final` GROUP BY `id_kerusakan` ORDER BY `hasil_probabilitas` DESC LIMIT 1";
      return $this->db->query($query);
    }
    // Menampilkan Detail Hasil Akhir Diagnosa
     public function detailDiagnosa()
     {
      $db = db_connect();
       $query = "SELECT `tmp_final`.`id_kerusakan`, MAX(`hasil_probabilitas`) as `hasil_probabilitas`,`tbl_kerusakan`.`nama_kerusakan`, `tbl_kerusakan`.`gambar`,`tbl_kerusakan`.`solusi` FROM `tmp_final` JOIN `tbl_kerusakan` ON `tmp_final`.`id_kerusakan` = `tbl_kerusakan`.`id_kerusakan` GROUP BY `id_kerusakan` ORDER BY `hasil_probabilitas` DESC LIMIT 1";
      return $db->query($query);
     }
     public function gejalaDipilih(){
      $db = db_connect();
      $query = "SELECT `tmp_gejala`.`id_gejala`,`tbl_gejala`.`kode_gejala`,`tbl_gejala`.`nama_gejala`
      FROM `tmp_gejala` JOIN `tbl_gejala` 
      ON `tmp_gejala`.`id_gejala` = `tbl_gejala`.`id_gejala`";
     return $db->query($query);
     }
     // End Menampilkan Hasil diagnosa 
}
?>