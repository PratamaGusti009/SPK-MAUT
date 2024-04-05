<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Formulir extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCoba()
    {
        return $this->db->get("alternatif")->result_array();
    }

    public function update_alternatif($data, $id)
    {
        $this->db->where('id_alternatif', $id);
        return $this->db->update('alternatif', $data);
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('alternatif', $data);
        return $result;
    }

    public function get_sub_kriteria()
    {
        $query = $this->db->get('sub_kriteria');
        return $query->result();
    }

    public function data_sub_kriteria($id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria' ORDER BY nilai DESC;");
        return $query->result_array();
    }

    public function get_kriteria()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }

}