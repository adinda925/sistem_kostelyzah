<?php

namespace App\Controllers;

use \App\Models\KamarModel;
use \App\Models\TransaksiModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->kamar = new KamarModel();
        $this->transaksi = new TransaksiModel();
    }

    public function index()
    {
        return view('index');
    }

    public function user()
    {
        return view('user/index');
    }

    public function daftarkamar()
    {
        $kamar = new \App\Models\KamarModel();
        $modelkamar = $kamar->where('id_kategori =', 2)->findAll();

        return view('daftarkamar', [
            'modelkamar' => $modelkamar,
        ]);
    }

    public function booking($id_kamar)
    {
        $this->session = \Config\Services::session();
        $this->session->start();

        $id_user = $this->session->get('id');
        $kamar = $this->kModel->getKamar($id_kamar);
        $data = [
            'title' => 'BOOKING KAMAR',
            'iduser' => $id_user,
            'kamar' => $kamar
        ];
        return view('daftarkamar/booking', $data);
    }


    public function history()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-XPVlhdgn-tQoGUS0jp849vuB';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $transaksiModel = new \App\Models\TransaksiMidtransModel();
        $transaksi = $transaksiModel->findAll();

        // //update status transaksi
        // $status = \Midtrans\Transaction::status($transaksi['order_id']);
        // $transaksiModel->update([
        //     'transaction_status' => $status->transaction_status,
        // ]);

        // $data = [
        //     'order_id' => $transaksi['order_id'],
        //     '' => $transaksi['order_id'],
        // ]


        return view('transaksi/history', [
            'transaksi' => $transaksi,
        ]);
    }

    public function contact()
    {
        return view('kontak');
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        $data = json_encode($response);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
