<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Nilai extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Nilai_model');

            if ($this->session->userdata('id_user_level') != ("1","3","4")) {
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
                'page' => "Nilai",
				'list' => $this->Nilai_model->tampil(),
            ];
            $this->load->view('Nilai/index', $data);
        }
        
        //menampilkan view create
        public function create()
        {
            $data['page'] = "Nilai";
            $data['karyawans']= $this->Nilai_model->get_karyawan();
            $data['variabel'] = $this->Nilai_model->get_kriteria();
            $data['subkriteriaa'] = $this->Nilai_model->get_subkriteria();
            $this->load->view('Nilai/create',$data);
        }

        //menambahkan data ke database
        public function store()
        {
			$data = [
				'id_karyawan' => $this->input->post('id_karyawan'),
                'id_subkriteria_fuzzy' => $this->input->post('id_subkriteria_fuzzy'),
			];
			
			$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
            $this->form_validation->set_rules('id_subkriteria_fuzzy', 'id_subkriteria_fuzzy', 'required');               

			if ($this->form_validation->run() != false) {
				$result = $this->Nilai_model->insert($data);
				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
					redirect('Nilai');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('Nilai/create');
			}
        }

         public function lihat($nama_karyawan)
        {
            $data['page'] = "Nilai";
            $data['Nilai'] = $this->Nilai_model->lihat($nama_karyawan);
            $data['variabel'] = $this->Nilai_model->get_kriteria();
            $data['subkriteriaa'] = $this->Nilai_model->get_subkriteria();
            //$data['departemens']= $this->Appraisal_model->get_departemen();
            $data['karyawans']= $this->Nilai_model->get_karyawan();
            $data['id_karyawan'] = $this->input->post('id_karyawan');
            $data['id_subkriteria_fuzzy'] = $this->input->post('id_subkriteria_fuzzy');

            $data['list'] = $this->Nilai_model->tampil();
            
            $this->load->view('Nilai/lihat', $data);
        }

        public function edit($id_nilai)
        {
            $Nilai = $this->Nilai_model->show($id_nilai);
            $data = [
                'page' => "Nilai",
				'Nilai' => $Nilai,
                'karyawans' => $this->Nilai_model->get_karyawan2(),
                'variabel' => $this->Nilai_model->get_kriteria(),
                'subkriteriaa' => $this->Nilai_model->get_subkriteria(),
            ];
            $this->load->view('Nilai/edit', $data);
        }
    
        public function update($id_nilai)
        {
            $id_nilai = $this->input->post('id_nilai');
            $data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'id_subkriteria_fuzzy' => $this->input->post('id_subkriteria_fuzzy'),
            );

            $this->Nilai_model->update($id_nilai, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
            redirect('Nilai');
        }
    
        public function destroy($id_Nilai)
        {
            $this->Nilai_model->delete($id_nilai);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('Nilai');
        }
    }
    
    