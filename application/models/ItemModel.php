<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model{

    public function AmbilData()
    {
        return
        $this->db->get('kodeitem')->result();
    }

    public function TambahData($data)
    {
        return
        $this->db->insert('kodeitem', $data);
    }

    public function UbahData($kode, $data)
    {
        $this->db->where('kode', $kode);
        return
        $this->db->update('kodeitem', $data);

    }

    public function get_by_id($kode)
    {
        return
        $this->db->get_where('kodeitem',$kode);
    }

    public function HapusData($kode)
    {
    return
    $this->db->delete('kodeitem', ['list_sd' => $kode]);
    }
}