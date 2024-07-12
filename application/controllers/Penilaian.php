<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Penilaian_model');

        if ($this->session->userdata('id_user_level') != ("1" and "3" and "4")) {
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
        $data = [
            'page' => "Penilaian",
            'variabel' => $this->Penilaian_model->get_variabel(),
            'alternatif' => $this->Penilaian_model->get_alternatif(),
            'alternatifag' => $this->Penilaian_model->get_alternatifag(),
            'alternatifeng' => $this->Penilaian_model->get_alternatifeng(),
            'alternatiffbk' => $this->Penilaian_model->get_alternatiffbk(),
            'alternatiffbs' => $this->Penilaian_model->get_alternatiffbs(),
            'alternatiffo' => $this->Penilaian_model->get_alternatiffo(),
            'alternatifhk' => $this->Penilaian_model->get_alternatifhk(),
            'alternatifhc' => $this->Penilaian_model->get_alternatifhc(),
            'alternatifsm' => $this->Penilaian_model->get_alternatifsm(),
        ];
        if ($this->uri->segment(3) != "") {
            $year = $this->uri->segment(3);
            $data['alternatif'] = $this->Penilaian_model->filterYear($year);
        }
        $this->load->view('penilaian/index', $data);
    }


    public function tambah_penilaian()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');
        $i = 0;
        echo var_dump($nilai);
        echo var_dump($id_karyawan);
        echo var_dump($id_kriteria);
        foreach ($nilai as $key) {
            $this->Penilaian_model->tambah_penilaian($id_karyawan, $id_kriteria[$i], $key);
            $i++;
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
        redirect('Penilaian');
    }

    public function update_penilaian()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');
        $i = 0;
        echo var_dump($nilai);
        echo var_dump($id_karyawan);
        echo var_dump($id_kriteria);

        foreach ($nilai as $key) {
            $cek = $this->Penilaian_model->data_penilaian($id_karyawan, $id_kriteria[$i]);
            if ($cek == 0) {
                $this->Penilaian_model->tambah_penilaian($id_karyawan, $id_kriteria[$i], $key);
            } else {
                $this->Penilaian_model->edit_penilaian($id_karyawan, $id_kriteria[$i], $key);
            }
            $i++;
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('Penilaian');
    }
}
