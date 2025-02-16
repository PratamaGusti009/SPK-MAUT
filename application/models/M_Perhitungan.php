<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Perhitungan extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->get('penilaian');

        return $query->result();
    }

    public function get_kriteria()
    {
        return $this->db->get('kriteria');
    }

    public function get_alternatif()
    {
        return $this->db->get('alternatif')->result_array();
        // return $query->result();
    }

    public function data_nilai($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.id_sub_kriteria=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");

        return $query->row_array();
    }

    public function get_max_min($id_kriteria)
    {
        $query = $this->db->query("SELECT max(sub_kriteria.nilai) as max, min(sub_kriteria.nilai) as min, sub_kriteria.nilai as nilai FROM `penilaian` 
            JOIN sub_kriteria ON penilaian.id_sub_kriteria=sub_kriteria.id_sub_kriteria 
    		JOIN kriteria ON penilaian.id_kriteria=kriteria.id_kriteria 
    		WHERE penilaian.id_kriteria='$id_kriteria';");

        return $query->row_array();
    }

    public function get_hasil()
    {
        $query = $this->db->query('
        SELECT hasil.*, alternatif.status
        FROM hasil
        INNER JOIN alternatif ON hasil.id_alternatif = alternatif.id_alternatif
        ORDER BY hasil.nilai DESC;
    ');

        return $query->result();
    }

    public function get_hasil_alternatif($id_alternatif)
    {
        $query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");

        return $query->row_array();
    }

    public function insert_nilai_hasil($hasil_akhir = [])
    {
        // var_dump($hasil_akhir); die;
        $result = $this->db->insert('hasil', $hasil_akhir);

        return $result;
    }

    public function hapus_hasil()
    {
        $query = $this->db->query('TRUNCATE TABLE hasil;');

        return $query;
    }

    // hasil join alternatif
    public function get_hasil_join_alternatif()
    {
        $query = $this->db->query('
        SELECT hasil.*, alternatif.*
        FROM hasil 
        INNER JOIN alternatif 
        ON hasil.id_alternatif = alternatif.id_alternatif 
        ORDER BY hasil.nilai DESC;
    ');

        return $query->result();
    }
}
