<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function get_all_admin()
    {
        return $this->db->get('admin');
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('admin', $data);

        return $result;
    }

    public function delete_admin($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('admin');
    }
}
