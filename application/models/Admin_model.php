<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin_model extends CI_Model {

    	public function count_all_dept() {
	        $query = $this->db->get('departemen');
            return $query->num_rows();
    	}

    }

?>