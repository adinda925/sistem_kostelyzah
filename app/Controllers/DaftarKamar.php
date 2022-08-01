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
                $entityKamar->id_Kamar = $id_kamars;

                $KamarModel->save($entityKamar);

                $transaksi->fill($data);
                $transaksi->status = 0;
                $transaksi->created_by = $this->session->get('id_user');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $transaksiModel->save($transaksi);

                $id = $transaksiModel->insertID();

                $segment = ['transaksi', 'view', $id];

                return redirect()->to(site_url($segment));
            }
        }
        return view('daftarkamar/booking', [
            'model' => $model,
        ]);
    }
}
