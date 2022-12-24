<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function LcdError()
    {
        return view('Blog/LcdError/Lcderror',['title'=>'Kerusakan Pada LCD | Sistem Pakar']);
    }
    public function IcPower(){
        return view('Blog/IcPower/IcPower',['title'=>'Kerusakan Pada IC Power | Sistem Pakar']);
    }
    public function IcVga(){
        return view('Blog/IcVga/IcVga',['title'=>'Kerusakan Pada IC Vgas | Sistem Pakar']);
    }
    public function KabelFlexibel(){
        return view('Blog/KabelFlexibel/KabelFlexibel',['title'=>'Kerusakan Pada Kabel Flexibel | Sistem Pakar']);
    }
    public function Keyboard(){
        return view('Blog/Keyboard/Keyboard',['title'=>'Kerusakan Pada Keyboard | Sistem Pakar']);
    }
}