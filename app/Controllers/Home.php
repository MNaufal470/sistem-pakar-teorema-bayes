<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use App\Models\UsersModel;

class Home extends BaseController
{
    protected $gejalaModel;
    public function __construct()
    {
        $this->gejalaModel = new GejalaModel();
        $this->AuthModel = new UsersModel();
    }
    public function index()
    {
        return view('Home/Home',[
            'title' => 'Sistem Pakar Theorema Bayes'
        ]);
    }
    public function diagnosa()
    {
        $gejala = $this->gejalaModel->findAll();
        return view('User/Diagnosa',[
            'title' => 'Diagnosa | Sistem Pakar Forward Chaining',
            'gejala'=>$gejala
        ]);
    }

}