<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Departemen_model extends CI_Model {

        public function tampilag()
        {
            $query = $this->db->query('select * from departemen where id_departemen=1');
            return $query->result();
        }

        public function tampileng()
        {
            $query = $this->db->query('select * from departemen where id_departemen=2');
            return $query->result();
        }

        public function tampilfbk()
        {
            $query = $this->db->query('select * from departemen where id_departemen=3');
            return $query->result();
        }

        public function tampilfbs()
        {
            $query = $this->db->query('select * from departemen where id_departemen=4');
            return $query->result();
        }

        public function tampilfo()
        {
            $query = $this->db->query('select * from departemen where id_departemen=5');
            return $query->result();
        }

        public function tampilhk()
        {
            $query = $this->db->query('select * from departemen where id_departemen=6');
            return $query->result();
        }

        public function tampilhc()
        {
            $query = $this->db->query('select * from departemen where id_departemen=7');
            return $query->result();
        }

        public function tampilsm()
        {
            $query = $this->db->query('select * from departemen where id_departemen=8');
            return $query->result();
        }

        public function tampilx1()
        {
            $query = $this->db->query('select * from departemen where id_departemen=15');
            return $query->result();
        }

        public function tampilx2()
        {
            $query = $this->db->query('select * from departemen where id_departemen=16');
            return $query->result();
        }

        public function tampilx3()
        {
            $query = $this->db->query('select * from departemen where id_departemen=17');
            return $query->result();
        }

        public function hitungag() {
            $query = $this->db->query('select * from karyawan where id_departemen = 1');
            return $query->num_rows();
        }

        public function hitungeng() {
            $query = $this->db->query('select * from karyawan where id_departemen = 2');
            return $query->num_rows();
        }

        public function hitungfbk() {
            $query = $this->db->query('select * from karyawan where id_departemen = 3');
            return $query->num_rows();
        }

        public function hitungfbs() {
            $query = $this->db->query('select * from karyawan where id_departemen = 4');
            return $query->num_rows();
        }

        public function hitungfo() {
            $query = $this->db->query('select * from karyawan where id_departemen = 5');
            return $query->num_rows();
        }

        public function hitunghk() {
            $query = $this->db->query('select * from karyawan where id_departemen = 6');
            return $query->num_rows();
        }

        public function hitunghc() {
            $query = $this->db->query('select * from karyawan where id_departemen = 7');
            return $query->num_rows();
        }

        public function hitungsm() {
            $query = $this->db->query('select * from karyawan where id_departemen = 8');
            return $query->num_rows();
        }

        public function hitungx1() {
            $query = $this->db->query('select * from karyawan where id_departemen = 15');
            return $query->num_rows();
        }

        public function hitungx2() {
            $query = $this->db->query('select * from karyawan where id_departemen = 16');
            return $query->num_rows();
        }

        public function hitungx3() {
            $query = $this->db->query('select * from karyawan where id_departemen = 17');
            return $query->num_rows();
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('departemen', $data);
            return $result;
        }

        public function show($id_departemen)
        {
            $this->db->where('id_departemen', $id_departemen);
            $query = $this->db->get('departemen');
            return $query->row();
        }

        public function update($id_departemen, $data = [])
        {
            $ubah = array(
                'nama_departemen' => $data['nama_departemen'],
            );

            $this->db->where('id_departemen', $id_departemen);
            $this->db->update('departemen', $ubah);
        }

        public function delete($id_departemen)
        {
            $this->db->where('id_departemen', $id_departemen);
            $this->db->delete('departemen');
        }
    }
    