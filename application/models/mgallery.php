<?php
class mgallery extends CI_Model{

	function get_gallery(){
		$this->db->select('gambar_gallery.gambar,gallery.deskripsi');
        	$this->db->from('gallery');
        	$this->db->join('gambar_gallery', 'gallery.id = gambar_gallery.id');
          	$this->db->order_by("tanggal", "DESC");
			return $this->db->get()->result();
	}
}