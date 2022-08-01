<?php

namespace App\Controllers;

use DateTime;
use DateTimeZone;

class Transaksi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->email = \Config\Services::email();
        $this->transaksii = new \App\Models\TransaksiMidtransModel();
        $this->transaksi = new \App\Models\TransaksiModel();
        $this->banner = new \App\Models\KamarModel();
        $this->user = new \App\Models\UserModel();
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksi = $transaksiModel->select('*, transaksi.id_transaksi AS id_transaksi')->join('kamar', 'kamar.id_kamar=transaksi.id_transaksi')
            ->join('user', 'user.id_user=transaksi.id_user')
            ->where('transaksi.id_transaksi', $id)
            ->first();


        return view('transaksi/view', [
            'transaksi' => $transaksi,
        ]);
    }

    public function save()
    {
        try {
            $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $res = $this->transaksi->save([
                'id_user' => $this->request->getPost('id_user'),
                'id_kamar' => $this->request->getPost('id_kamar'),
                'jumlah' => $this->request->getPost('jumlah'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'no_wa' => $this->request->getPost('no_wa'),
                'no_kamar' => $this->request->getPost('no_kamar'),
                'biaya' => $this->request->getPost('biaya'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'order_id' => $this->request->getPost('order_id'),
                'created_at' => $time->format("Y-m-d H:i:s"),
                'updated_at' => $time->format("Y-m-d H:i:s"),
            ]);
            if ($res == false) {
                $data = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            } else {
                $data = [
                    "value" => true,
                    // "sukses" => 'Transaksi Midtrans berhasil disimpan, silahkan lanjutkan Pembayaran'
                ];
            }
            return json_encode($data);
        } catch (\Exception $e) {
            $data = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            // return json_encode($data);
        }
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);
        $modeltransaksi = new \App\Models\TransaksiModel();
        $transaksi = $modeltransaksi->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksiupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\transaksi();
                $b->id_transaksi = $id;
                $b->fill($data);

                $modeltransaksi->save($b);

                $segments = ['transaksi', 'history', $id];


                return redirect()->to(base_url($segments));
            }
        }

        return view('transaksi/update', [
            'transaksi' => $transaksi,
        ]);
    }

    public function finishMidtrans()
    {
        try {
            $res = $this->transaksii->save([
                'id_user' => $this->request->getPost('id_user'),
                'id_kamar' => $this->request->getPost('id_kamar'),
                'jumlah' => $this->request->getPost('jumlah'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'no_wa' => $this->request->getPost('no_wa'),
                'no_kamar' => $this->request->getPost('no_kamar'),
                'biaya' => $this->request->getPost('biaya'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'order_id' => $this->request->getPost('order_id'),
                'payment_type' => $this->request->getPost('payment_type'),
                'transaction_status' => $this->request->getPost('transaction_status'),
                'transaction_time' => $this->request->getPost('transaction_time'),
                'va_number' => $this->request->getPost('va_number'),
                'bank' => $this->request->getPost('bank'),
                'pdf_url' => $this->request->getPost('pdf_url'),
            ]);
            if ($res == false) {
                $json = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            } else {
                $json = [
                    "value" => true,
                    "sukses" => 'Transaksi Midtrans berhasil disimpan, silahkan lanjutkan Pembayaran'
                ];
            }
            return json_encode($json);
        } catch (\Exception $e) {
            $json = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            // return json_encode($data);
        }

        // menyimpan data transaksi
        try {
            $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $res = $this->transaksi->save([
                'id_user' => $this->request->getPost('id_user'),
                'id_kamar' => $this->request->getPost('id_kamar'),
                'jumlah' => $this->request->getPost('jumlah'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'no_wa' => $this->request->getPost('no_wa'),
                'no_kamar' => $this->request->getPost('no_kamar'),
                'biaya' => $this->request->getPost('biaya'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'order_id' => $this->request->getPost('order_id'),
                'created_at' => $time->format("Y-m-d H:i:s"),
                'updated_at' => $time->format("Y-m-d H:i:s"),
            ]);
            if ($res == false) {
                $data = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            } else {
                $data = [
                    "value" => true,
                    // "sukses" => 'Transaksi Midtrans berhasil disimpan, silahkan lanjutkan Pembayaran'
                ];
            }
            return json_encode($data);
        } catch (\Exception $e) {
            $data = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            // return json_encode($data);
        }
    }
}
