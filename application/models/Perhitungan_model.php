<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan_model extends CI_Model {
    private $conn;

        public function get_variabel()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
		
        public function get_alternatif()
        {
            $query = $this->db->get('karyawan');
            return $query->result();
        }
		
		public function get_himpunan($id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM subkriteria_fuzzy WHERE id_kriteria='$id_kriteria';");
			return $query->result();
		}
		
		public function data_nilai($id_karyawan,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM penilaian WHERE id_karyawan='$id_karyawan' AND id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
		
		public function get_himpunan_row($id_kriteria)
        {
			$query = $this->db->query("SELECT * FROM hasil WHERE id_kriteria='$id_kriteria';");
            return $query->row();
        }
		
		public function get_hasil($id_karyawan,$id_kriteria)
        {
			$query = $this->db->query("SELECT * FROM hasil WHERE id_karyawan='$id_karyawan' AND id_kriteria='$id_kriteria';");
            return $query->row();
        }
		
		public function insert_hasil($hasil_akhir = [])
        {
            $result = $this->db->insert('hasil', $hasil_akhir);
            return $result;
        }
		
		public function hapus_hasil()
        {
            $query = $this->db->query("TRUNCATE TABLE hasil;");
			return $query;
        }

        public function get_key($key){
            // Job Knowledge, 
			// Quality of Work,
			// Consistency of Work,
			// Stability,
			// Communication,
			// Diplomacy and Manners,
			// Judgement,
			// Salesmanship,
			// Customer Relations,
			// Leadership Skills,
			// Attitude Toward Supervisors,
			// Attitude Toward Co-Workers,
			// Initiative,
			// Attendance,
			// Punctuality

            switch ($key) {
                case 'Job Knowledge':
                    return 'JK';
                    break;
                case 'Quality of Work':
                    return 'QW';
                    break;
                case 'Consistency of Work':
                    return 'CW';
                    break;
                case 'Stability':
                    return 'S';
                    break;
                case 'Communication':
                    return 'C';
                    break;
                case 'Diplomacy and Manners':
                    return 'DM';
                    break;
                case 'Judgement':
                    return 'J';
                    break;
                case 'Salesmanship':
                    return 'SS';
                    break;
                case 'Customer Relations':
                    return 'CR';
                    break;
                case 'Leadership Skills':
                    return 'LS';
                    break;
                case 'Attitude Toward Supervisors':
                    return 'ATS';
                    break;
                case 'Attitude Toward Co-Workers':
                    return 'ATC';
                    break;
                case 'Initiative':
                    return 'I';
                    break;
                case 'Attendance':
                    return 'A';
                    break;
                case 'Punctuality':
                    return 'P';
                    break;
                default:
                    return '-';
                    break;
            }
        }
    }
    