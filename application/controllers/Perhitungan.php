<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Perhitungan_model');
    }

    public function index()
    {
        if ($this->session->userdata('id_user_level') != ("1" and "2" and "3")) {
?>
            <script type="text/javascript">
                alert('Anda tidak berhak mengakses halaman ini!');
                window.location = '<?php echo base_url("Login/home"); ?>'
            </script>
<?php
        }

        $data = [
            'page' => "Perhitungan",
            'variabels' => $this->Perhitungan_model->get_variabel(),
            'alternatifs' => $this->Perhitungan_model->get_alternatif(),
        ];
        $this->load->view('perhitungan/index', $data);
    }
}
