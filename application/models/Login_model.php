<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login_model extends CI_Model {
		
		function logged_id()
		{
			return $this->session->userdata('id_user');
		}
		
        public function login($username, $password)
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            return $this->db->get()->row();
        }

        public function hitung_dept() {
            $query = $this->db->get('departemen');
            return $query->num_rows();
        }

        public function hitung_karyawan() {
            $query = $this->db->get('karyawan');
            return $query->num_rows();
        }

        public function hitung_kriteria() {
            $query = $this->db->get('kriteria');
            return $query->num_rows();
        }

        public function hitung_sub() {
            $query = $this->db->get('subkriteria_fuzzy');
            return $query->num_rows();
        }

        public function hitung_appr() {
            $query = $this->db->get('appraisal');
            return $query->num_rows();
        }

        public function hitung_nilai() {
            $query = $this->db->get('penilaian');
            return $query->num_rows();
        }


        public function get_5_best_employee() {
            $highest = [];
            $karyawans = $this->db->get('karyawan')->result();
            foreach ($karyawans as $karyawan) {
                $id_karyawan = $karyawan->id_karyawan;
                $kriterias = $this->db->get('kriteria')->result();
                foreach ($kriterias as $kriteria) {
                    $id_kriteria = $kriteria->id_kriteria;
                    // $himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
                    $himpunans = $this->db->query("SELECT * FROM subkriteria_fuzzy WHERE id_kriteria='$id_kriteria';")->result();
                    foreach ($himpunans as $himpunan){
                        $id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;
                        // $hasil = $this->Perhitungan_model->get_hasil($id_karyawan,$id_kriteria);
                        $hasil = $this->db->query("SELECT * FROM hasil WHERE id_karyawan='$id_karyawan' AND id_kriteria='$id_kriteria';")->row();
                        if($hasil->id_subkriteria_fuzzy == $himpunan->id_subkriteria_fuzzy){
                            if (array_key_exists($karyawan->nama_karyawan, $highest)) {
                                $highest[$karyawan->nama_karyawan] += $hasil->f;
                            } else {
                                $highest[$karyawan->nama_karyawan] = $hasil->f;
                            }
                        }
                    }
                }
            }
            arsort($highest);
            $highest = array_slice($highest, 0, 5);
            return $highest;
        }
    }
