<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Hasil extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Perhitungan_model');
        }

        public function index()
        {
            $data = [
                'page' => "Hasil",
				'variabels'=> $this->Perhitungan_model->get_variabel(),
                'alternatifs'=> $this->Perhitungan_model->get_alternatif(),
            ];
			
            $this->load->view('hasil/index', $data);
        }
    
    }
    
    