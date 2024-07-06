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
    }
    