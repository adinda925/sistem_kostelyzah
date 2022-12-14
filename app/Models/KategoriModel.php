<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = [
        'kategori'
    ];
    protected $returnType = 'App\Entities\Kategori';
    protected $useTimestamps = false;
}
