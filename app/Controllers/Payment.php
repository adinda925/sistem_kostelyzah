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

        $id_user = $_POST['id_user'];
        $id_kamar = $_POST['id_kamar'];
        $no_kamar = $_POST['no_kamar'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_wa = $_POST['no_wa'];
        $biaya = $_POST['biaya'];
        $tgl_masuk = $_POST['tgl_masuk'];

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $biaya,
            ),
            'customer_details' => array(
                'nama' => $nama,
                'email' => $email,
                'phone' => $no_wa,
            ),
            'item_details' => array(
                array(
                    'id'       => 'SEWA KAMAR KOST ELYZAH',
                    'price'    => $biaya,
                    'no_kamar' => $no_kamar,
                    'tgl_masuk' => $tgl_masuk,
                ),
            )
        );

        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
            'status' => 'Success',
            'no_kamar'     => $no_kamar,
            'nama' => $nama,
            'email' => $email,
            'no_wa' => $no_wa,
            'biaya' => $biaya,
            'tahun' => $tgl_masuk,
            'id_kamar' => $id_kamar,
            'id_user' => $id_user,
        ];
        return json_encode($data);
    }
}
