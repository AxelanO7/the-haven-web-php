<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Departemen_model extends CI_Model {
        public function getLengthEmployeeByDepartment()
        {
            $query = $this->db->get('departemen');
            $result = $query->result();
            foreach ($result as $row) {
                $id_departemen = $row->id_departemen;
                $query = $this->db->query("select * from karyawan where id_departemen = $id_departemen");
                $row->length = $query->num_rows();
            }
            return $result;
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
    