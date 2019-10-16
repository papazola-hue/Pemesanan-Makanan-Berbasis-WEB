<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login_model extends CI_Model {

	public function insert($data)
        {	
			$query = $this->db->insert('user',$data);
			return $query->result();
        }
     }