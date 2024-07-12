<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    private $conn;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Karyawan_model');

        if ($this->session->userdata('id_user_level') != ("1" and "3")) {
?>
            <script type="text/javascript">
                alert('Anda tidak berhak mengakses halaman ini!');
                window.location = '<?php echo base_url("Login/home"); ?>'
            </script>
<?php
        }
    }

    public function index()
    {
        $data['page'] = "Karyawan";
        $data['list'] = $this->Karyawan_model->tampil();
        if ($this->uri->segment(3) != "") {
            $year = $this->uri->segment(3);
            $data['list'] = $this->Karyawan_model->filterYear($year);
        }
        $this->load->view('Karyawan/index', $data);
    }

    //menampilkan view create
    public function create()
    {
        $data['page'] = "Karyawan";
        $data['departemens'] = $this->Karyawan_model->get_departemen();
        $this->load->view('Karyawan/create', $data);
    }

    public function store()
    {
        $data = [
            'kode_karyawan' => $this->input->post('kode_karyawan'),
            'id_departemen' => $this->input->post('id_departemen'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'posisi' => $this->input->post('posisi'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        ];

        $this->form_validation->set_rules('kode_karyawan', 'kode_karyawan', 'required');
        $this->form_validation->set_rules('id_departemen', 'id_departemen', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');
        $this->form_validation->set_rules('posisi', 'posisi', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');

        if ($this->form_validation->run() != false) {
            $result = $this->Karyawan_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                redirect('Karyawan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
            redirect('Karyawan/create');
        }
    }

    public function edit($id_karyawan)
    {
        $data['page'] = "Karyawan";
        $data['karyawan'] = $this->Karyawan_model->show($id_karyawan);
        $data['departemens'] = $this->Karyawan_model->get_departemen();
        $this->load->view('Karyawan/edit', $data);
    }

    public function update($id_karyawan)
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $data = array(
            'kode_karyawan' => $this->input->post('kode_karyawan'),
            'id_departemen' => $this->input->post('id_departemen'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'posisi' => $this->input->post('posisi'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        );

        $this->Karyawan_model->update($id_karyawan, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('Karyawan');
    }

    public function destroy($id_karyawan)
    {
        $this->Karyawan_model->delete($id_karyawan);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('Karyawan');
    }
}
