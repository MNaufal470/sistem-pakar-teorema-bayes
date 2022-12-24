<?php

namespace App\Controllers;

use App\Models\DiagnosaModel;
use App\Models\UsersModel;

class Diagnosa extends BaseController
{
    protected $diagnosaModel;
    protected $AuthModel;
    public function __construct()
    {
        $this->diagnosaModel = new DiagnosaModel();   
        $this->AuthModel = new UsersModel(); 
        $this->session = session();
    }

    
    public function CheckDiagnosa(){
        if(!empty($this->request->getPost())){
            // Kosongkan Table Temporary 
            $this->diagnosaModel->emptyTmpGejala();
            $this->diagnosaModel->emptyTmpFinal();
            // Insert tmp_gejala
            $gejala = $this->request->getPost('id_gejala');
            $user = $this->AuthModel->where('name', session('loggedUser'))->first();
            $id  = $user['id'];
            $this->diagnosaModel->insertTmpGejala($gejala,$id);
            // Insert tmp_Final
            $tmpGejala = $this->diagnosaModel->insertTmpFinal()->getResultArray();
            $this->diagnosaModel->inserBatchTmp($tmpGejala);
            // Proses Perhitungan 
            $probK1 = $this->diagnosaModel->ProbK1();
            echo 'Nilai Prob K1 = ' . $probK1 . '<br>';
            $probK2 = $this->diagnosaModel->ProbK2();
            echo 'Nilai Prob K2 = ' . $probK2 . '<br>';
            $probK3 = $this->diagnosaModel->ProbK3();
            echo 'Nilai Prob K3 = ' . $probK3 . '<br>';
            $probK4 = $this->diagnosaModel->ProbK4();
            echo 'Nilai Prob K4 = ' . $probK4 . '<br>';
            $probK5 = $this->diagnosaModel->ProbK5();
            echo 'Nilai Prob K5 = ' . $probK5 . '<br><br>';
            // Testing Hasil Perhitungan Bayes Tiap Kerusakan
            $data = [
            'K1' => $probK1,
            'K2' => $probK2,
            'K3' => $probK3,
            'K4' => $probK4,
            'K5' => $probK5
            ];
            $jmlProb = array_sum($data);
            echo 'Jumlah Probabilitas =' . $jmlProb . '<br><br>';
            $K1 = round($probK1 / $jmlProb,12) . '<br>';
            echo 'Nilai Perhitungan Bayes K1 =' .  $K1 . '<br>';
            $K2 = ($probK2 / $jmlProb ) . '<br>';
            echo 'Nilai Perhitungan Bayes K2 =' . $K2 . '<br>';
            $K3 = ($probK3 / $jmlProb) . '<br>';
            echo 'Nilai Perhitungan Bayes K3 =' . $K3 . '<br>';
            $K4 = ($probK4 / $jmlProb) . '<br>';
            echo 'Nilai Perhitungan Bayes K4 =' . $K4 . '<br>';
            $K5 = ($probK5 / $jmlProb) . '<br>';
            echo 'Nilai Perhitungan Bayes K5 =' . $K5 . '<br>';


            $this->diagnosaModel->hasilProbK1($K1);
            $this->diagnosaModel->hasilProbK2($K2);
            $this->diagnosaModel->hasilProbK3($K3);
            $this->diagnosaModel->hasilProbK4($K4);
            $this->diagnosaModel->hasilProbK5($K5);
            //     //insert hasil dari diagnosa
            $this->diagnosaModel->insertHasil($user['name']);
            return redirect()->to('Diagnosa/hasilDiagnosa');
            }
            $this->session->setFlashdata('fail', 'Gejala belum dipilih, Silahkan pilih gejala minimal 1!');
            return redirect()->to('Home/Diagnosa');
        }
        
    
    public function hasilDiagnosa()
    {
        $user = $this->AuthModel->where('name', session('loggedUser'))->first();
        // Hasil Diagnosa Akhir
        // Hasil 3 Kerusakan dengan prob tertinggi
        $diagnosa =  $this->diagnosaModel->diagnosa()->getResultArray();
        // Hasil Kerusakan dengan prob paling tinggi
        $tertinggi = $this->diagnosaModel->tertinggi()->getResultArray();
         // Detail Hasil Diagnosa
        $detail = $this->diagnosaModel->detailDiagnosa()->getResultArray();
        // Gejala Yang dipilih
        $gejala = $this->diagnosaModel->gejalaDipilih()->getResultArray();
        return view('User/HasilDiagnosa',[
            'title' => 'Hasil Diagnosa | Sistem Pakar Forward Chaining',
            'user' => $user,
            'diagnosa'=>$diagnosa,
            'tertinggi'=>$tertinggi,
            'detail'=>$detail,
            'gejala'=>$gejala
        ]);
    }
    
}