<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_kamar', 'id_user', 'nama', 'email', 'no_wa', 'no_kamar', 'biaya', 'tgl_masuk','order_id', 'payment_type', 'payment_method', 'created_by', 'created_date', 'transaction_time', 'transaction_status', 'va_number', 'bank'
    ];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;
    protected $session;

    public function get($id = null)
    {
        $this->db->select('transaksi.*, kamar.id_kamar as id_kamar, kamar.no_kamar as no_kamar, kamar.biaya as biaya, user.id_user as id_user, user.nama as nama, user.email as email, user.no_wa as no_wa');
        $this->db->from('transaksi');
        $this->db->join('kamar', 'kamar.id_kamar = transaksi.id_kamar');
        $this->db->join('kamar', 'kamar.no_kamar = transaksi.no_kamar');
        $this->db->join('kamar', 'kamar.biaya = transaksi.biaya');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('user', 'user.id_nama = transaksi.id_nama');
        $this->db->join('userr', 'user.id_email = transaksi.id_email');
        if($id != null) {
            $this->db->where('id_transaksi', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
}