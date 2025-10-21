<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model{

    public function AmbilData()
    {
        return $this->db->get('item')->result();
    }

    public function AmbilItem() 
    {
     $this->db->select('item.*, kategori.NamaKategori');
     $this->db->from('item');
     $this->db->join('kategori', 'kategori.idKategori = item.idKategori', 'left');
     return$this->db->get()->result();   
    }

    public function get_by_id($kode)
    {
        return $this->db->get_where('item',['Kode' => $kode])->row();
    }

    public function UbahData($kode, $data)
    {
        $this->db->where('kode', $kode);
        return $this->db->update('item', $data);
    }

    public function TambahData($data)
    {
        return $this->db->insert('item', $data);
    }

    public function HapusData($kode)
    {
    return $this->db->delete('item', ['Kode' => $kode]);
    }
}