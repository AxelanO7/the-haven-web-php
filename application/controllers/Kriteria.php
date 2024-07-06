<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kriteria extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Kriteria_model');

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
            $data['page'] = "Kriteria";
			$data['list'] = $this->Kriteria_model->tampil();
            $this->load->view('Kriteria/index', $data);
        }
        
        //menampilkan view create
        public function create()
        {
			$data['page'] = "Kriteria";
            $this->load->view('Kriteria/create', $data);
        }

        public function store()
        {
			$data = [
				'nama_kriteria' => $this->input->post('nama_kriteria'),
			];
			
			$this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'required');

			if ($this->form_validation->run() != false) {
				$result = $this->Kriteria_model->insert($data);
				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
					redirect('Kriteria');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('Kriteria/create');
			}
        }

        public function edit($id_kriteria)
        {
            $data['page'] = "Kriteria";
			$data['kriteria'] = $this->Kriteria_model->show($id_kriteria);
            $this->load->view('kriteria/edit', $data);
        }
    
        public function update($id_kriteria)
        {
            $id_kriteria = $this->input->post('id_kriteria');
            $data = array(
                'nama_kriteria' => $this->input->post('nama_kriteria'),
            );

            $this->Kriteria_model->update($id_kriteria, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('Kriteria');
        }
    
        public function destroy($id_kriteria)
        {
            $this->Kriteria_model->delete($id_kriteria);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('Kriteria');
        }
    }
    