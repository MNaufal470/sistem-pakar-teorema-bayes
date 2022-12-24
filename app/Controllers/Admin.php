<?php

namespace App\Controllers;

use App\Entities\Gejala;
use App\Entities\Kerusakan;
use App\Models\GejalaModel;
use App\Models\KerusakanModel;
use App\Models\LaporanModel;
use App\Models\PengetahuanModel;

class Admin extends BaseController
{
    protected $gejalaModel;
    protected $gejalaEnt;
    protected $kerusakanModel;
    protected $kerusakanEnt;
    protected $pengetahuanModel;
    protected $laporanModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        // Gejala
        $this->gejalaModel = new GejalaModel();
        $this->gejalaEnt = new Gejala();
        // Keruskan
        $this->kerusakanModel = new KerusakanModel();
        $this->kerusakanEnt = new Kerusakan();
        // Pengetahuan
        $this->pengetahuanModel = new PengetahuanModel();
        // Laporan
        $this->laporanModel = new LaporanModel();
    }
    public function index()
    {
        return view('Admin/Dashboard',[
            'title'=>'Dashboard Admin | Sistem Pakar'
        ]);
    }
    public function Gejala(){
        $kodeGejala = $this->gejalaModel->kodeGejala();
        $gejala = $this->gejalaModel->getAllGejala()->getResult();
        return view('Admin/Gejala',[
            'gejala' => $gejala,
            'kode_gejala' =>$kodeGejala,
            'title'=>'Halaman Gejala | Sistem Pakar'
        ]);
    }
    public function Kerusakan(){
        $kode_kerusakan = $this->kerusakanModel->kodeKerusakan();
        $kerusakan = $this->kerusakanModel->getAllKerusakan()->getResult();
        return view('Admin/Kerusakan',[
            'kode_kerusakan'=>$kode_kerusakan,
            'kerusakan'=>$kerusakan,
            'title'=>'Halaman Kerusakan | Sistem Pakar'
        ]);
    }
    public function TambahKerusakan(){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data,'TambahKerusakan');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $kerusakanEnt = $this->kerusakanEnt->fill($data);
                $kerusakanEnt->gambar = $this->request->getFile("gambar");
                $this->kerusakanModel->save($kerusakanEnt);
                $this->session->setFlashdata('success','Berhasil Menambahkan Data Kerusakan.' );
                return redirect()->to('Admin/Kerusakan');
            }
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('Admin/Kerusakan');
        }
        return redirect()->to('Admin/Kerusakan');
    }
    public function UpdateKerusakan($id){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data,'UpdateKerusakan');
            $errors = $this->validation->getErrors();

            if(!$errors){
                $findId = $this->kerusakanModel->find($id);
                $findImg = $findId->gambar;
                $kerusakanEnt = new \App\Entities\Kerusakan();
                $kerusakanEnt->id_kerusakan = $id;
                $kerusakanEnt->fill($data);
                if($this->request->getFile('gambar')->isValid()){
                    unlink('Assets/Img/Kerusakan/'.$findImg);
                    $kerusakanEnt->gambar = $this->request->getFile("gambar");
                }
                $this->kerusakanModel->save($kerusakanEnt);
                $this->session->setFlashdata('success', 'Data Kerusakan Berhasil Di Ubah!');
                return redirect()->to('Admin/Kerusakan');
            }
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('Admin/Kerusakan');
        }
    }
    public function DeleteKerusakan($id){
        $kerusakan = $this->kerusakanModel->find($id);
        $imageFile = $kerusakan->gambar;
        unlink('Assets/Img/Kerusakan/'.$imageFile);
        $this->kerusakanModel->delete($id);
        $this->session->setFlashdata('success', 'Data Kerusakan Berhasil Di Hapus!');
        return redirect()->to('Admin/Kerusakan');
    }
    
    public function Laporan(){
        $laporan = $this->laporanModel->findAll();
        return view('Admin/Laporan',[
            'title'=>'Halaman Laporan | Sistem Pakar',
            'laporan'=>$laporan
        ]);
    }
    public function DeleteHasil($id){
        $result = $this->laporanModel->find($id);
        $this->laporanModel->delete($result);
        return redirect()->to('/Admin/Laporan');
    }

    // Tambah Gejala
    public function TambahGejala(){
        $kodeGejala = $this->gejalaModel->kodeGejala();
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data, 'TambahGejala');
            $errors = $this->validation->getErrors();
            if(!$errors){
           $fillEnt = $this->gejalaEnt->fill($data);
            $this->gejalaModel->save($fillEnt);
            $this->session->setFlashdata('success',"Berhasil menambahkan gejala.");
              return redirect()->to('Admin/Gejala');
            }
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('Admin/Gejala');
        };
        return redirect()->to('Admin/Gejala');
    }
    // Update Gejala
    public function UpdateGejala($id_gejala){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data, 'TambahGejala');
            $errors = $this->validation->getErrors();
            if(!$errors){
             $fillEnt = $this->gejalaEnt->fill($data);
             $fillEnt->id_gejala = $id_gejala;
            $this->gejalaModel->save($fillEnt);
            $this->session->setFlashdata('success',"Berhasil mengubah data gejala.");
              return redirect()->to('Admin/Gejala');
            }
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('Admin/Gejala');
        };
        return view('Admin/Gejala');
    }
    // Delete Gejala
    public function DeleteGejala($id){
        $this->gejalaModel->delete($id);
        $this->session->setFlashdata('success',"Berhasil menghapus data gejala.");
        return redirect()->to('Admin/Gejala');
    }
    // CRUD PENGETAHUAN
    public function Aturan(){
        $pengetahuan = $this->pengetahuanModel->getAllPengetahuan();
        $kerusakan = $this->pengetahuanModel->getKerusakan()->getResult();
        $gejala = $this->pengetahuanModel->getGejala()->getResult();
        return view('Admin/Aturan',[
            'pengetahuan'=>$pengetahuan,
            'kerusakan'=>$kerusakan,
            'gejala'=>$gejala,
            'title'=>'Halaman Pengetahuan | Sistem Pakar'
        ]);
    }
    public function tambahPengetahuan(){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data, 'tambahPengetahuan');
            $errors = $this->validation->getErrors();
            if(!$errors){
            $id_gejala = $this->request->getPost('id_gejala');
            $id_kerusakan = $this->request->getPost('id_kerusakan');
            $probabilitas = $this->request->getPost('probabilitas');
            $values = [
                'id_gejala' => $id_gejala,
                'id_kerusakan' => $id_kerusakan,
                'probabilitas'=>$probabilitas
            ];
            $this->pengetahuanModel->save($values);
            $this->session->setFlashdata('success','Berhasil Menambahkan Pengetahuan');
            return redirect()->to('Admin/Aturan');
            }
            $this->session->setFlashdata('errors',$errors);
            return redirect()->to('Admin/Aturan');
        }
    }
    public function updatePengetahuan($id){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data, 'tambahPengetahuan');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $id_gejala = $this->request->getPost('id_gejala');
                $id_kerusakan = $this->request->getPost('id_kerusakan');
                $probabilitas = $this->request->getPost('probabilitas');
                $values = [
                    'id_gejala' => $id_gejala,
                    'id_kerusakan' => $id_kerusakan,
                    'probabilitas'=>$probabilitas
                ];
                $this->pengetahuanModel->update($id,$values);
                $this->session->setFlashdata('success','Berhasil Mengubah Data Pengetahuan');
                return redirect()->to('Admin/Aturan');
            }
            $this->session->setFlashdata('errors',$errors);
            return redirect()->to('Admin/Aturan');
        }
        return redirect()->to('Admin/Aturan');
    }
    public function deletePengetahuan($id){
        $this->pengetahuanModel->delete($id);
        $this->session->setFlashdata('success','Berhasil Menghapus Data Pengetahuan');
        return redirect()->to('Admin/Aturan');
    }
}