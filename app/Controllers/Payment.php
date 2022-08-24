<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Payment extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->email = \Config\Services::email();
        $this->transaksi = new \App\Models\TransaksiModel();
        $this->kamar = new \App\Models\KamarModel();
        $this->user = new \App\Models\UserModel();
    }

    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-T5WGSTGy49HQKi1BS9XDWvtp';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $id = (int) $_POST['id'];
        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksi = $transaksiModel->find($id);

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => (int) $transaksi->biaya,
            ),
            'customer_details' => array(
                'first_name' => $transaksi->nama,
                'email' => $transaksi->email,
                'phone' => $transaksi->no_wa,
            ),
            // 'item_details' => array(
            //     'id'       => $transaksi->id,
            //     'price'    => $transaksi->biaya,
            //     'quantity' => 1,
            //     'name' => $transaksi->no_kamar,
            // ),
        );

        $data = array(
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
            'status' => 'Success',
        );
        return json_encode($data);
    }
}
