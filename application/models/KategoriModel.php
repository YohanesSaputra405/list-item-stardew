<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model{
    public function AmbilKategori(){
        return
        $this->db->get('kategori')->result();
    }

    public function TambahKategori($data){
        return
        $this->db->insert('kategori', $data);
    }

    public function UbahKategori($idKategori, $data){
        $this->db->where('idKategori', $idKategori);
        return $this->db->update('kategori', $data);
    }

    public function get_id_kategori($idKategori){
        return
        $this->db->get_where('kategori',['idKategori'=> $idKategori]);
    }

    public function HapusKategori($idKategori){
        return
        $this->db->delete('kategori', ['idKategori' => $idKategori]);
    }
}