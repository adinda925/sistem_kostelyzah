<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\KamarModel;
use \App\Models\TransaksiModel;
use \App\Models\KategoriModel;

class DaftarKamar extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->kamar = new KamarModel();
        $this->transaksi = new TransaksiModel();
    }

    public function fasilitas()
    {
        $id = $this->request->uri->getSegment(3);

        $kamarModel = new \App\Models\KamarModel();

        $kamar = $kamarModel->find($id);

        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->find($kamar->id_kategori);

        return view('daftarkamar/fasilitas', [
            'kamar' => $kamar,
            'kategori' => $kategori,
        ]);
    }

    public function booking()
    {
        $id = $this->request->uri->getSegment(3);

        $modelKamar = new \App\Models\KamarModel();

        $model = $modelKamar->find($id);

        $modelbulan = new \App\Models\BulanModel();
        $bulan = $modelbulan->findAll();

        $arraybulan = null;

        foreach ($bulan as $k) {
            $arraybulan[$k->id] = $k->bulan;
        }
        return view('daftarkamar/booking', [
            'model' => $model,
            'arraybulan' => $arraybulan
        ]);
    }

    public function saveBooking()
    {
        $id = $this->request->uri->getSegment(3);
        $transaksiModel = new \App\Models\TransaksiModel();
        $model = $transaksiModel->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $transaksiModel = new \App\Models\TransaksiModel();
                $transaksi = new \App\Entities\Transaksi();

                $KamarModel = new \App\Models\KamarModel();
                $id_kamars = $this->request->getPost('id_kamar');
                $kamar = $KamarModel->find($id_kamars);
                $entityKamar = new \App\Entities\Kamar();
                $entityKamar->id_kamar = $id_kamars;
                $entityKamar->jumlah = $kamar->jumlah - 1;
                $KamarModel->save($entityKamar);

                // $KamarModel->save($entityKamar);

                $transaksi->fill($data);
                $transaksi->created_by = $this->session->get('id_user');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $transaksiModel->save($transaksi);

                $id = $transaksiModel->insertID();

                $segment = ['transaksi', 'view', $id];

                return redirect()->to(site_url($segment));
            }
        }
        $modelbulan = new \App\Models\BulanModel();
        $bulan = $modelbulan->findAll();

        $arraybulan = null;

        foreach ($bulan as $k) {
            $arraybulan[$k->id] = $k->bulan;
        }

        return view('daftarkamar/booking', [
            'model' => $model,
            'arraybulan' => $arraybulan,
        ]);
    }
}
