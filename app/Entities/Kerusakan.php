<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Kerusakan extends Entity
{
    public function setGambar($file){
        $fileName = $file->getRandomName();
        $writePath = 'Assets/Img/Kerusakan';
        $file->move($writePath, $fileName);
        $this->attributes['gambar'] = $fileName;
        return $this;
    }
}