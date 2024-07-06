<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Subkriteria_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('subkriteria_fuzzy');
            return $query->result();
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('subkriteria_fuzzy', $data);
            return $result;
        }

        public function show($id_subkriteria_fuzzy)
        {
            $this->db->where('id_subkriteria_fuzzy', $id_subkriteria_fuzzy);
            $query = $this->db->get('subkriteria_fuzzy');
            return $query->row();
        }

        public function update($id_subkriteria_fuzzy, $data = [])
        {
            $ubah = array(
                'id_kriteria' => $data['id_kriteria'],
                'nama_subkriteria' => $data['nama_subkriteria'],
                'kurva'  => $data['kurva'],
				'a'  => $data['a'],
				'b'  => $data['b'],
				'c'  => $data['c'],
				'd'  => $data['d'],
            );

            $this->db->where('id_subkriteria_fuzzy', $id_subkriteria_fuzzy);
            $this->db->update('subkriteria_fuzzy', $ubah);
        }

        public function delete($id_subkriteria_fuzzy)
        {
            $this->db->where('id_subkriteria_fuzzy', $id_subkriteria_fuzzy);
            $this->db->delete('subkriteria_fuzzy');
        }

        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }

        public function count_variabel(){
            $query =  $this->db->query("SELECT id_kriteria FROM subkriteria_fuzzy GROUP BY id_kriteria")->result();
            return $query;
        }

        public function data_subkriteria_fuzzy($id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM subkriteria_fuzzy WHERE id_kriteria='$id_kriteria';");
			return $query->result_array();
		}
    }
    
    /* End of file Kategori_model.php */
    