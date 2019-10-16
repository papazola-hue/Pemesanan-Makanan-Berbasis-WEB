<?php
class mmenu extends CI_Model{

	function get_all_menu(){
		$hasil=$this->db->get('menu');
		return $hasil->result();
	}
}