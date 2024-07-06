<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Nilai_model extends CI_Model {

        public function get_karyawan()
        {
            $query = $this->db->query("SELECT * FROM karyawan");
            return $query->result();
        }

        public function get_karyawan2()
        {
            $query = $this->db->query("select karyawan.nama_karyawan, nilai.id_karyawan, karyawan.id_karyawan FROM karyawan inner join nilai on nilai.id_karyawan = karyawan.id_karyawan");
            return $query->result();
        }

        public function tampil()
        {
            $query = $this->db->query("select karyawan.nama_karyawan, nilai.id_karyawan, nilai.id_nilai from nilai inner join karyawan on karyawan.id_karyawan = nilai.id_karyawan");
            return $query->result();
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('nilai', $data);
            return $result;
        }

        public function lihat($nama_karyawan)
        {
            $this->db->where('nama_karyawan',$nama_karyawan);
            $query = $this->db->query("select karyawan.nama_karyawan, nilai.id_karyawan, nilai.id_subkriteria_fuzzy, karyawan.id_karyawan from nilai inner join karyawan on karyawan.id_karyawan = nilai.id_karyawan");
            return $query->row();
        }

        public function show($id_nilai)
        {
            $this->db->where('id_nilai', $id_nilai);
            $query = $this->db->get('nilai');
            return $query->row();
        }

        public function update($id_nilai, $data = [])
        {
            $ubah = array(
                'id_karyawan'  => $data['id_karyawan'],
                'id_subkriteria_fuzzy'  => $data['id_subkriteria_fuzzy'],
            );

            $this->db->where('id_nilai', $id_nilai);
            $this->db->update('nilai', $ubah);
        }

        public function delete($id_nilai)
        {
            $this->db->where('id_nilai', $id_nilai);
            $this->db->delete('nilai');
        }

        public function get_kriteria()
        {
            $query = $this->db->query("select * from kriteria");
            return $query->result();
        }

        public function get_kriteria2()
        {
            $query = $this->db->query("select kriteria.nama_kriteria, subkriteria_fuzzy.nama_subkriteria from kriteria inner join subkriteria_fuzzy on kriteria.id_kriteria = subkriteria_fuzzy.id_kriteria");
            return $query->result();
        }

    //     public function get_subkriteria() {
    //     $this->db->select('*');
    //     $this->db->from('subkriteria_fuzzy');
    //     $this->db->where('id_kriteria', $id_kriteria);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

        public function get_subkriteria()
        {
            $query = $this->db->query("SELECT * from subkriteria_fuzzy where id_kriteria=1");
            return $query->result();
        }

        public function get_subkriteria2()
        {
            $query = $this->db->query("select nilai.id_karyawan, subkriteria_fuzzy.id_subkriteria_fuzzy, subkriteria_fuzzy.nama_subkriteria FROM subkriteria_fuzzy inner join nilai on nilai.id_subkriteria_fuzzy = subkriteria_fuzzy.id_subkriteria_fuzzy");
            return $query->result();
        }
    }
    
    