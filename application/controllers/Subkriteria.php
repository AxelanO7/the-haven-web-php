<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Subkriteria extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Subkriteria_model');

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
            $data = [
				'page' => "Subkriteria",
                'list' => $this->Subkriteria_model->tampil(),
                'variabel'=> $this->Subkriteria_model->get_kriteria(),
                'count_variabel'=> $this->Subkriteria_model->count_variabel(),
                'subkriteria' => $this->Subkriteria_model->tampil()
                
            ];
            $this->load->view('subkriteria/index', $data);
        }

        public function store()
        {
			$data = [
				'id_kriteria' => $this->input->post('id_kriteria'),
				'nama_subkriteria' => $this->input->post('nama_subkriteria'),
				'kurva' => $this->input->post('kurva'),
				'a' => $this->input->post('a'),
				'b' => $this->input->post('b'),
				'c' => $this->input->post('c'),
				'd' => $this->input->post('d'),
			];
			
			$this->form_validation->set_rules('id_kriteria', 'ID Kriteria', 'required');
			$this->form_validation->set_rules('nama_subkriteria', 'Nama Sub Kriteria', 'required');

			if ($this->form_validation->run() != false) {
				$result = $this->Subkriteria_model->insert($data);
				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
					redirect('Subkriteria');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('Subkriteria');
			}
        }
    
        public function update($id_subkriteria_fuzzy)
        {
            $id_subkriteria_fuzzy = $this->input->post('id_subkriteria_fuzzy');
            $data = array(
                'id_kriteria' => $this->input->post('id_kriteria'),
				'nama_subkriteria' => $this->input->post('nama_subkriteria'),
				'kurva' => $this->input->post('kurva'),
				'a' => $this->input->post('a'),
				'b' => $this->input->post('b'),
				'c' => $this->input->post('c'),
				'd' => $this->input->post('d'),
            );

            $this->Subkriteria_model->update($id_subkriteria_fuzzy, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('Subkriteria');
        }
    
        public function destroy($id_subkriteria_fuzzy)
        {
            $this->Subkriteria_model->delete($id_subkriteria_fuzzy);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('Subkriteria');
        }
    }
    