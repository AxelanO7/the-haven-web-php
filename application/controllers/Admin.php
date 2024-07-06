<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Admin_model');
        }


    public function index() {
        $data['page'] = "admin";
        $data['total_dept'] = $this->Admin_model->count_all_dept();
        
        $this->load->view('Admin/index', $data);
    }
}

?>