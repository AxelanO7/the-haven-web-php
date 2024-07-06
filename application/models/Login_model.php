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
    
    }
