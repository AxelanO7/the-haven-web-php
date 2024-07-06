<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Karyawan_model extends CI_Model {
    private $conn;

        public function get_departemen()
        {
            $query = $this->db->query("select * from departemen");
            return $query->result();
        }

        public function readAll(){

        $query = $this->db->query("select hasil.id_karyawan,hasil.f, karyawan.nama_karyawan from hasil inner join karyawan on hasil.id_karyawan = karyawan.id_karyawan ORDER BY hasil.f DESC LIMIT 5");
        return $query->result();
        }

        public function tampil()
        {
            // $query = $this->db->get('karyawan');
            $query = $this->db->query("select karyawan.id_karyawan,karyawan.kode_karyawan,karyawan.id_departemen,karyawan.nama_karyawan,karyawan.posisi,karyawan.jenis_kelamin,departemen.nama_departemen,departemen.id_departemen from karyawan inner join departemen on karyawan.id_departemen = departemen.id_departemen");
            return $query->result();
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('karyawan', $data);
            return $result;
        }

        public function show($id_karyawan)
        {
            $this->db->where('id_karyawan', $id_karyawan);
            // $query = $this->db->query("select karyawan.id_karyawan,karyawan.id_departemen,karyawan.nama_karyawan,karyawan.posisi,karyawan.jenis_kelamin,departemen.nama_departemen,departemen.id_departemen from karyawan inner join departemen on karyawan.id_departemen = departemen.id_departemen");
            $query = $this->db->get('karyawan');
            return $query->row();
        }

        public function update($id_karyawan, $data = [])
        {
            $ubah = array(
                'kode_karyawan' => $data['kode_karyawan'],
                'id_departemen' => $data['id_departemen'],
                'nama_karyawan' => $data['nama_karyawan'],
                'posisi' => $data['posisi'],
                'jenis_kelamin' => $data['jenis_kelamin'],
            );

            $this->db->where('id_karyawan', $id_karyawan);
            $this->db->update('karyawan', $ubah);
        }

        public function delete($id_karyawan)
        {
            $this->db->where('id_karyawan', $id_karyawan);
            $this->db->delete('karyawan');
        }
    }
    