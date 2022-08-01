<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kamar extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $KamarModel = new \App\Models\KamarModel();
        $kamars = $KamarModel->findAll();

        return view('kamar/index', [
            'kamars' => $kamars,
        ]);
    }

    public function trashed()
    {
        $kamarModel = new \App\Models\KamarModel();
        $kamars = $kamarModel->onlyDeleted()->findAll();

        return view('kamar/trashed', [
            'kamars' => $kamars,
        ]);
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $kamarModel = new \App\Models\KamarModel();

        $kamar = $kamarModel->find($id);

        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->find($kamar->id_kategori);

        return view('kamar/view', [
            'kamar' => $kamar,
            'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'kamar');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $KamarModel = new \App\Models\KamarModel();

                $kamar = new \App\Entities\kamar();

                $kamar->fill($data);
                $kamar->foto = $this->request->getFile('foto');
                $kamar->created_by = 0;
                $kamar->created_date = date("Y-m-d H:i:s");

                $KamarModel->save($kamar);

                $id = $KamarModel->insertID();

                $segments = ['kamar', 'view', $id];

                $this->session->setFlashData('success', "Input Data Berhasil");
                return redirect()->to(site_url($segments));
            }
        }
        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->findAll();

        $arrayKategori = null;

        foreach ($kategori as $k) {
            $arrayKategori[$k->id_kategori] = $k->kategori;
        }
        return view('kamar/create', [
            'arrayKategori' => $arrayKategori,
        ]);
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);
        $modelkamar = new \App\Models\KamarModel();
        $kamar = $modelkamar->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'kamarupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\kamar();
                $b->id_kamar = $id;
                $b->fill($data);

                if ($this->request->getFile('foto')->isValid()) {
                    $b->foto = $this->request->getFile('foto');
                }

                $b->updated_by = $this->session->get('id_user');
                $b->updated_at = date("Y-m-d H:i:s");

                $modelkamar->save($b);

                $segments = ['kamar', 'view', $id];


                return redirect()->to(base_url($segments));
            }
        }

        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->findAll();

        $arrayKategori = null;

        foreach ($kategori as $k) {
            $arrayKategori[$k->id_kategori] = $k->kategori;
        }

        return view('kamar/update', [
            'kamar' => $kamar,
            'arrayKategori' => $arrayKategori,
        ]);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);

        $modelkamar = new \App\Models\KamarModel();
        $delete = $modelkamar->delete($id);

        $this->session->setFlashdata('success', 'Delete Berhasil');

        return redirect()->to(site_url('kamar/index'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            $this->db = \Config\Database::connect();
            $this->db->table('kamar')
                ->set('deleted_at', null, true)
                ->where(['id_kamar' => $id])
                ->update();
        }

        return redirect()->to(site_url('kamar/index'))->with('success', 'Data berhasil direstore');
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $modelkamar = new \App\Models\KamarModel();
            $delete = $modelkamar->delete($id, true);

            $this->session->setFlashdata('success', 'Delete Lesson Learn Berhasil');

            return redirect()->to(site_url('kamar/trashed'));
        }
    }
}
