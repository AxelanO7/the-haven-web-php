<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penilaian_model extends CI_Model {

        public function get_data() {
        $query = $this->db->get('penilaian'); // Ganti dengan nama tabel yang benar
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null; // atau array kosong
        }
        }
      
        public function tambah_penilaian($id_karyawan,$id_kriteria,$nilai)
        {
            $query = $this->db->query("INSERT INTO penilaian VALUES (DEFAULT,'$id_karyawan','$id_kriteria',$nilai)");
            return $query;  
        }
       
        public function edit_penilaian($id_karyawan,$id_kriteria,$nilai)
        {
            $query = $this->db->query("UPDATE penilaian SET nilai=$nilai WHERE id_karyawan='$id_karyawan' AND id_kriteria='$id_kriteria'");
            return $query;  
        }
       
        public function get_variabel()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
        
        public function get_alternatif()
        {
            $query = $this->db->query("SELECT * FROM karyawan");
            return $query->result();
        }
        public function get_alternatifag()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='1'");
            return $query->result();
        }
        public function get_alternatifeng()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='2'");
            return $query->result();
        }
        public function get_alternatiffbk()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='3'");
            return $query->result();
        }
        public function get_alternatiffbs()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='4'");
            return $query->result();
        }
        public function get_alternatiffo()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='5'");
            return $query->result();
        }
        public function get_alternatifhk()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='6'");
            return $query->result();
        }
        public function get_alternatifhc()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='7'");
            return $query->result();
        }
        public function get_alternatifsm()
        {
            $query = $this->db->query("SELECT * FROM karyawan WHERE id_departemen='8'");
            return $query->result();
        }

        public function data_penilaian($id_karyawan,$id_kriteria)
        {
            $query = $this->db->query("SELECT * FROM penilaian WHERE id_karyawan='$id_karyawan' AND id_kriteria='$id_kriteria'");
            return $query->row_array();
        }
        
        public function untuk_tombol($id_karyawan)
        {
            $query = $this->db->query("SELECT * FROM penilaian WHERE id_karyawan='$id_karyawan'");
            return $query->num_rows();
        }
    }
    
    