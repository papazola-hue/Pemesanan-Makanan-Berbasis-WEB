<?php
class Cart_model extends CI_Model{

	function get_all_produk(){
		$hasil=$this->db->get('menu');
		return $hasil->result();
	}
	function get_id($nama_pemesan){
		$this->db->select('pemesanan.id_pemesan');
		$this->db->from('pemesanan');
		$this->db->where('nama_pemesan',$nama_pemesan);
		$query=$this->db->get();
		return $query->row()->id_pemesan;
	}
	function insert_pemesan($data){
		$this->db->insert_batch('detail_pemesanan',$data);
	}
	function input_pemesan($data){
		$query=$this->db->insert('pemesanan',$data);
		return $query;
	}
	function cek($nama){
		$this->db->where('nama',$nama);
		$query=$this->db->get('user');

    if ($query->num_rows() > 0) {
        return $query->num_rows();
    }else{
        return 0;
    }
	}
}