<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Appraisal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Appraisal_model');

        if ($this->session->userdata('id_user_level') == "2") {
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
        $data['page'] = "Appraisal";
        $yearUrl = $this->uri->segment(3);
        $data['list'] = $this->Appraisal_model->filter_karyawan_year($yearUrl);
        $data['apprasials'] = $this->Appraisal_model->get_appraisals($yearUrl);
        $data['listhodag'] = $this->Appraisal_model->tampilhodag();
        $data['listhodeng'] = $this->Appraisal_model->tampilhodeng();
        $data['listhodfbk'] = $this->Appraisal_model->tampilhodfbk();
        $data['listhodfbs'] = $this->Appraisal_model->tampilhodfbs();
        $data['listhodfo'] = $this->Appraisal_model->tampilhodfo();
        $data['listhodhk'] = $this->Appraisal_model->tampilhodhk();
        $data['listhodhc'] = $this->Appraisal_model->tampilhodhc();
        $data['listhodsm'] = $this->Appraisal_model->tampilhodsm();
        $data['liststaff'] = $this->Appraisal_model->tampilstaff();
        $staff = [];
        $username = $this->session->userdata('username');
        foreach ($data['liststaff'] as $key) {
            if ($key->kode_karyawan == $username) {
                $staff[] = $key;
            }
        }
        $data['staff'] = $staff;
        $this->load->view('Appraisal/index', $data);
    }

    //menampilkan view create
    public function create($nama_karyawan)
    {
        $data['page'] = "Appraisal";
        $data['Appraisal'] = $this->Appraisal_model->lihat($nama_karyawan);
        $data['karyawans'] = $this->Appraisal_model->get_karyawan();
        $this->load->view('Appraisal/create', $data);
    }

    public function store($nama_karyawan)
    {
        $data = [
            'id_karyawan' => $this->input->post('id_karyawan'),
            'tgl_pengisian' => $this->input->post('tgl_pengisian'),
            'progress' => $this->input->post('progress'),
            'development' => $this->input->post('development'),
            'strongest_perform' => $this->input->post('strongest_perform'),
            'giving_feedback' => $this->input->post('giving_feedback'),
            'assistance' => $this->input->post('assistance'),
            'main_strength' => $this->input->post('main_strength'),
            'tobe_improved' => $this->input->post('tobe_improved'),
            'training_course' => $this->input->post('training_course'),
            'comment' => $this->input->post('comment'),
            'Appraisal' => $this->Appraisal_model->lihat($nama_karyawan)
        ];

        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
        $this->form_validation->set_rules('tgl_pengisian', 'tgl_pengisian', 'required');
        $this->form_validation->set_rules('progress', 'progress', 'required');
        $this->form_validation->set_rules('development', 'development', 'required');
        $this->form_validation->set_rules('strongest_perform', 'strongest_perform', 'required');
        $this->form_validation->set_rules('giving_feedback', 'giving_feedback', 'required');
        $this->form_validation->set_rules('assistance', 'assistance', 'required');
        $this->form_validation->set_rules('main_strength', 'main_strength', 'required');
        $this->form_validation->set_rules('tobe_improved', 'tobe_improved', 'required');
        $this->form_validation->set_rules('training_course', 'training_course', 'required');
        $this->form_validation->set_rules('comment', 'comment', 'required');

        if ($this->form_validation->run() != false) {
            $result = $this->Appraisal_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                redirect('Appraisal');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
            redirect('Appraisal/create');
        }
    }

    public function lihat($id_karyawan)
    {
        $data['page'] = "Appraisal";
        $data['Appraisal'] = $this->Appraisal_model->lihat($id_karyawan);
        $data['karyawans'] = $this->Appraisal_model->get_karyawan();
        $data['id_appraisal'] = $this->Appraisal_model->get_id_appraisal($id_karyawan);
        $data['id_karyawan'] = $this->input->post('id_karyawan');
        $data['tgl_pengisian'] = $this->input->post('tgl_pengisian');
        $data['progress'] = $this->input->post('progress');
        $data['development'] = $this->input->post('development');
        $data['strongest_perform'] = $this->input->post('strongest_perform');
        $data['giving_feedback'] = $this->input->post('giving_feedback');
        $data['assistance'] = $this->input->post('assistance');
        $data['main_strength'] = $this->input->post('main_strength');
        $data['tobe_improved'] = $this->input->post('tobe_improved');
        $data['training_course'] = $this->input->post('training_course');
        $data['comment'] = $this->input->post('comment');
        $data['list'] = $this->Appraisal_model->tampil();
        $this->load->view('Appraisal/lihat', $data);
    }

    public function edit($id_appraisal)
    {
        $data['page'] = "Appraisal";
        $data['Appraisal'] = $this->Appraisal_model->show($id_appraisal);
        $data['karyawans'] = $this->Appraisal_model->get_karyawan2();
        $this->load->view('Appraisal/edit', $data);
    }

    public function update($id_appraisal)
    {
        $id_appraisal = $this->input->post('id_appraisal');
        $data = array(
            'id_karyawan' => $this->input->post('id_karyawan'),
            'tgl_pengisian' => $this->input->post('tgl_pengisian'),
            'progress' => $this->input->post('progress'),
            'development' => $this->input->post('development'),
            'strongest_perform' => $this->input->post('strongest_perform'),
            'giving_feedback' => $this->input->post('giving_feedback'),
            'assistance' => $this->input->post('assistance'),
            'main_strength' => $this->input->post('main_strength'),
            'tobe_improved' => $this->input->post('tobe_improved'),
            'training_course' => $this->input->post('training_course'),
            'comment' => $this->input->post('comment'),
        );

        $this->Appraisal_model->update($id_appraisal, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('Appraisal');
    }

    public function destroy($id_Appraisal)
    {
        $this->Appraisal_model->delete($id_Appraisal);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('Appraisal');
    }
}
