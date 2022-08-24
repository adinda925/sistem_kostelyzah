<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $allowedFields = [
        'no_kamar', 'fasilitas', 'biaya', 'foto', 'id_kategori', 'jumlah', 'created_by', 'created_date', 'updated_by', 'updated_date', 'deleted_at'
    ];
    protected $returnType = 'App\Entities\Kamar';
    protected $useTimestamps = false;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    public function getKamar($id_kamar = false)
    {
        if ($id_kamar == false) {
            return $this->findAll();
        }

        return $this->where(['id_kamar' => $id_kamar])->first();
    }
}
