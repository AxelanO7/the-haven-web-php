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
        $variabels = $this->Perhitungan_model->get_variabel();
        $alternatifs = $this->Perhitungan_model->get_alternatif();
        foreach ($alternatifs as $alternatif) {
            $id_karyawan = $alternatif->id_karyawan;
            $tot = 0;
            $hasil = [];
            foreach ($variabels as $variabel) {
                $id_kriteria = $variabel->id_kriteria;
                $himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
                foreach ($himpunans as $himpunan) {
                    $id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;
                    $hasil = $this->Perhitungan_model->get_hasil($id_karyawan, $id_kriteria);
                    if ($hasil->id_subkriteria_fuzzy == $himpunan->id_subkriteria_fuzzy) {
                        $tot += $hasil->f;
                    }
                }
            }
            $alternatif->total = $tot / count($variabels);
        }
        usort($alternatifs, function ($a, $b) {
            return $b->total <=> $a->total;
        });
        $data = [
            'page' => "Perhitungan",
            'variabels' => $variabels,
            'alternatifs' => $alternatifs,
        ];
        $this->load->view('perhitungan/index', $data);
    }
}
