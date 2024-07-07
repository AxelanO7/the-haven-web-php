<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Departemen extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Departemen_model');

            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
        }

        public function index()
        {
            $data['page'] = "Departemen";
            $data['listData'] = $this->Departemen_model->getLengthEmployeeByDepartment();
            $this->load->view('Departemen/index', $data);
        }
        
        //menampilkan view create
        public function create()
        {
			$data['page'] = "Departemen";
            $this->load->view('Departemen/create', $data);
        }

        public function store()
        {
			$data = [
				'nama_departemen' => $this->input->post('nama_departemen'),
			];
			
			$this->form_validation->set_rules('nama_departemen', 'nama_departemen', 'required');

			if ($this->form_validation->run() != false) {
				$result = $this->Departemen_model->insert($data);
				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
					redirect('Departemen');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('Departemen/create');
			}
        }

        public function edit($id_departemen)
        {
            $data['page'] = "Departemen";
			$data['departemen'] = $this->Departemen_model->show($id_departemen);
            $this->load->view('Departemen/edit', $data);
        }
    
        public function update($id_departemen)
        {
            $id_departemen = $this->input->post('id_departemen');
            $data = array(
                'nama_departemen' => $this->input->post('nama_departemen'),
            );

            $this->Departemen_model->update($id_departemen, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('Departemen');
        }
    
        public function destroy($id_departemen)
        {
            $this->Departemen_model->delete($id_departemen);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('Departemen');
        }
    }
    