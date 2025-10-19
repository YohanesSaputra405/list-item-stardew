<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property KategoriModel $KategoriModel
 * @property CI_Upload $upload
 */

class KategoriController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
    }

    public function index(){
        $data['kategori'] = $this->KategoriModel->AmbilKategori();
        $this->load->view('Kategori', $data);
    }

    public function TambahKategori(){
        $this->load->view('TambahKategori');
    }

    public function Store(){
        $NamaKategori = $this->input->post('namakategori');

        $data = [
            'NamaKategori' => $NamaKategori
        ];

        $this->KategoriModel->TambahKategori($data);
        redirect('KategoriController/index');
    }

    public function edit($idKategori){
        $data ['kategori'] = $this->KategoriModel->get_id_kategori($idKategori)->row();
        $this->load->view('EditKategori', $data);
    }

    public function update($idKategori){
        $data = [
            'NamaKategori' => $this->input->post('namakategori')
        ];

        $this->KategoriModel->UbahKategori($idKategori, $data);
        redirect('KategoriController/index');
    }

    public function delete($idKategori){
        $this->KategoriModel->HapusKategori($idKategori);
        redirect('KategoriController/index');
    }

}