<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kriteria_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('kriteria', $data);
            return $result;
        }

        public function show($id_kriteria)
        {
            $this->db->where('id_kriteria', $id_kriteria);
            $query = $this->db->get('kriteria');
            return $query->row();
        }

        public function update($id_kriteria, $data = [])
        {
            $ubah = array(
                'nama_kriteria' => $data['nama_kriteria'],
            );

            $this->db->where('id_kriteria', $id_kriteria);
            $this->db->update('kriteria', $ubah);
        }

        public function delete($id_kriteria)
        {
            $this->db->where('id_kriteria', $id_kriteria);
            $this->db->delete('kriteria');
        }
    }
    