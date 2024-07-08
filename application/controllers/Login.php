<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('User_model');
    }
    public function index()
    {

        if($this->Login_model->logged_id())
		{
			redirect('Login/home');
		}else{
			$this->load->view('login');
		}
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $set = $this->Login_model->login($username, $password);
        if($set){ 
            $log = [
                'id_user' => $set->id_user,
                'username' => $set->username,
                'nama' => $set->nama,
                'id_user_level' => $set->id_user_level,
                'status' => 'Logged'
            ];
            $this->session->set_userdata($log);            
            redirect('Login/home');
        }else{
            $this->session->set_flashdata('message', 'Username atau Password Salah');
            redirect('Login');
        }
    }

    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function home()
    { 
        $data['highest'] = $this->Login_model->get_5_best_employee();
        $data['page'] = "Dashboard";
        $data['total_dept'] = $this->Login_model->hitung_dept();
        $data['total_karyawan'] = $this->Login_model->hitung_karyawan();
        $data['total_kriteria'] = $this->Login_model->hitung_kriteria();
        $data['total_sub'] = $this->Login_model->hitung_sub();
        $data['total_appr'] = $this->Login_model->hitung_appr();
        $data['total_nilai'] = $this->Login_model->hitung_nilai();
		$this->load->view('admin/index', $data);
    }
}

/* End of file Login.php */
?>
