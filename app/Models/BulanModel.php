<?php

namespace App\Models;

use CodeIgniter\Model;

class BulanModel extends Model
{
    protected $table = 'bulan';
    protected $primaryKey = 'id_bulan';
    protected $allowedFields = [
        'bulan'
    ];
    protected $returnType = 'App\Entities\Bulan';
    protected $useTimestamps = false;
}