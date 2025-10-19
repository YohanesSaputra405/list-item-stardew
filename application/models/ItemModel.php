<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model{

    public function AmbilData()
    {
        return
        $this->db->get('item')->result();
    }

    public function TambahData($data)
    {
        return
        $this->db->insert('item', $data);
    }

    public function UbahData($kode, $data)
    {
        $this->db->where('kode', $kode);
        return
        $this->db->update('item', $data);

    }

    public function get_by_id($kode)
    {
        return
        $this->db->get_where('item',$kode);
    }

    public function HapusData($kode)
    {
    return
    $this->db->delete('item', ['list_sd' => $kode]);
    }
}