<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMidtransModel extends Model
{
    protected $table = 'transaksimidtrans';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_kamar', 'id_user', 'total_tagihan', 'denda', 'tgl_masuk', 'order_id', 'payment_type', 'transaction_time', 'transaction_status', 'pdf_url'
    ];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;
}