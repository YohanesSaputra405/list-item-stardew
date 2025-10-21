<?php

use PSpell\Config;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property ItemModel $ItemModel
 * @property KategoriModel $KategoriModel
 * @property CI_Upload $upload
 * @property CI_sessison $session
 */

class ItemController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ItemModel');
        $this->load->model('KategoriModel');
        $this->load->helper(['form', 'url']);
    }

    public function index()
    {
        $data['item']= $this->ItemModel->AmbilItem();
        $this->load->view('index', $data);

    }

    public function Tambah()
    {
        $this->load->model('KategoriModel');
        $data ['kategori'] = $this->KategoriModel->AmbilKategori();
        $this->load->view('Tambah', $data);
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
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('ItemController/Tambah');
                return;
            }
        }
        $data = [
            'Kode' => $kode,
            'NamaItem' => $nama,
            'GambarItem' => $gambar,
            'idKategori' =>$this->input->post('idKategori') ?? null
        ];

        $this->ItemModel->TambahData($data);
        redirect('ItemController/index');
    }

    public function edit($kode){
        $data['item'] = $this->ItemModel->get_by_id($kode);
        $data['kategori']=  $this->KategoriModel->AmbilKategori();
        $this->load->view('edit', $data);
    }
    
    public function update($kode){
        $data = [
            'Kode' => $this->input->post('kodeitem'),
            'NamaItem' => $this->input->post('NamaItem'),
            'idKategori' =>$this->input->post('idKategori') ?? null
        ];

        //handle Gambar Baru 
        if(!empty($_FILES['GambarItem']['name'])){
            $config['upload_path'] = FCPATH. 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $config['file_name'] = time().'_'. $_FILES['GambarItem']['name'];
            $this->upload->initialize($config);

            if ($this->upload->do_upload('GambarItem')){
                $uploadData = $this->upload->data();
                $data['GambarItem'] = $uploadData['file_name'];

                //hapus file lama
                $old = $this->ItemModel->get_by_id($kode);
                if(!empty($old->GambarItem) && file_exists(FCPATH. 'uploads/'. $old->GambarItem)){
                    @unlink(FCPATH.'uploads'. $old->GambarItem);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                    redirect('ItemController/edit/', $kode);
                    return;
                }
            }

            $this->ItemModel->UbahData($kode, $data);
            redirect('ItemController/index');
        }

        $this->ItemModel->UbahData($kode, $data);
        redirect('ItemController/index');
    }

public function delete($kode)
    {
        // optional: hapus file gambarnya dulu
        $item = $this->ItemModel->get_by_id($kode);
        if (!empty($item->GambarItem) && file_exists(FCPATH . 'uploads/' . $item->GambarItem)) {
            @unlink(FCPATH . 'uploads/' . $item->GambarItem);
        }

        $this->ItemModel->HapusData($kode);
        redirect('ItemController/index');
    }

}