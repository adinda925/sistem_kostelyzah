<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'nama', 'no_wa', 'username', 'email', 'password', 'salt', 'created_by', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;

    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id_user])->first();
    }
}
