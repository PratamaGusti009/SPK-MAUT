<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Coba'); // Load model di sini
    }

    public function sumValues()
    {
        $total = $this->M_Coba->sumValues();
        echo 'Total nilai: '.$total;
    }
}
