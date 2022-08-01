<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_kamar', 'id_user', 'total_tagihan', 'tgl_masuk', 'order_id', 'payment_type', 'payment_method', 'created_by', 'created_date', 'transaction_time', 'transaction_status', 'va_number', 'bank'
    ];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;

    public function tampilDataTemp($id_kamar)
    {
        return $this->table('tagihan')->join('kamar', 'kamar.id_kamar=tagihan.id_kamar')->where('id_kamar', $id_kamar)->get();
    }

    public function tampilDataUser($id_user)
    {
        return $this->table('tagihan')->join('user', 'id_user=id_user')->where('id_user', $id_user)->get();
    }

    public function getUsers($id = false)
    {
        if ($id !== false) {
            return $this->where(['id_user' => $id])->first();
        }
    }
}
