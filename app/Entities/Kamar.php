<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Kamar extends Entity
{
    public function setFoto($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './uploads';
        $file->move($writePath, $fileName);
        $this->attributes['foto'] = $fileName;
        return $this;
    }
}
