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
			$data['listag'] = $this->Departemen_model->tampilag();
            $data['listeng'] = $this->Departemen_model->tampileng();
            $data['listfbk'] = $this->Departemen_model->tampilfbk();
            $data['listfbs'] = $this->Departemen_model->tampilfbs();
            $data['listfo'] = $this->Departemen_model->tampilfo();
            $data['listhk'] = $this->Departemen_model->tampilhk();
            $data['listhc'] = $this->Departemen_model->tampilhc();
            $data['listsm'] = $this->Departemen_model->tampilsm();
            $data['listx1'] = $this->Departemen_model->tampilx1();
            $data['listx2'] = $this->Departemen_model->tampilx2();
            $data['listx3'] = $this->Departemen_model->tampilx3();
            $data['hitungag'] = $this->Departemen_model->hitungag();
            $data['hitungeng'] = $this->Departemen_model->hitungeng();
            $data['hitungfbk'] = $this->Departemen_model->hitungfbk();
            $data['hitungfbs'] = $this->Departemen_model->hitungfbs();
            $data['hitungfo'] = $this->Departemen_model->hitungfo();
            $data['hitunghk'] = $this->Departemen_model->hitunghk();
            $data['hitunghc'] = $this->Departemen_model->hitunghc();
            $data['hitungsm'] = $this->Departemen_model->hitungsm();
            $data['hitungx1'] = $this->Departemen_model->hitungx1();
            $data['hitungx2'] = $this->Departemen_model->hitungx2();
            $data['hitungx3'] = $this->Departemen_model->hitungx3();
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
    