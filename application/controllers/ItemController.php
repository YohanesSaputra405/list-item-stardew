<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property ItemModel $ItemModel
 * @property CI_Upload $upload
 */

class ItemController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ItemModel');

    }

    public function index()
    {
        $data['item']= $this->ItemModel->AmbilData();
        $this->load->view('index', $data);

    }

    public function Tambah()
    {
            $this->load->view('Tambah');
    }


    public function store()
    {
        $kode = $this->input->post('item');
        $nama = $this->input->post('NamaItem');
        $gambar = '';

        //Upload Gambar
        if(!empty($_FILES['GambarItem']['name'])){
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] =2048;
            $config['file_name'] = time().'_'.$_FILES['GambarItem']['name'];
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('GambarItem')){
                $uploadData = $this->upload->data();
                $gambar = $uploadData['file_name'];
            }else{
                echo $this->upload->display_errors();
                return;
            }
        }
        $data = [
            'Kode' => $kode,
            'NamaItem' => $nama,
            'GambarItem' => $gambar
        ];

        $this->ItemModel->TambahData($data);
        redirect('ItemController/index');
    }

    public function edit($kode){
        $data['item'] = $this->ItemModel->get_by_id($kode);
        $this->load->view('edit');
    }
    
    public function update($kode){
        $data = [
            'Kode' => $this->input->post('kodeitem'),
            'NamaItem' => $this->input->post('NamaItem'),
            'GambarItem' => $this->input->post('GambarItem')
        ];

        $this->ItemModel->UbahData($kode, $data);
        redirect('ItemController/index');
    }

    public function delete($kode){
        $this->ItemModel->HapusData($kode);
        redirect('ItemController/index');
    }

}