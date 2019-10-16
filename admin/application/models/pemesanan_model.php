<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pemesanan_model extends CI_Model {


	public function get_join()
        {	
        	 $this->db->select('*');
             $this->db->from('detail_pemesanan');
             $this->db->join('pemesanan', 'detail_pemesanan.id_pemesan = pemesanan.id_pemesan');
             $this->db->join('menu', 'detail_pemesanan.id_menu = menu.id_menu');
             $this->db->limit(1,0);
			$query = $this->db->get();
			return $query->result();
        }
    public function get_join_where($id_pemesan)
        {   
             $this->db->select('*');
             $this->db->from('detail_pemesanan');
             $this->db->join('user', 'detail_pemesanan.id_pemesan = user.id_user');
             $this->db->join('menu', 'detail_pemesanan.id_menu = menu.id_menu');
             $this->db->where('id_pemesan',$id_pemesan);
            $query = $this->db->get();
            return $query->result();
        }
         public function get_join_where2($id_pemesan)
        {   
             $this->db->select('*');
             $this->db->from('detail_pemesanan');
             $this->db->join('pemesanan', 'detail_pemesanan.id_pemesan = pemesanan.id_pemesan');
             $this->db->join('menu', 'detail_pemesanan.id_menu = menu.id_menu');
             $this->db->where('detail_pemesanan.id_pemesan',$id_pemesan);
            $query = $this->db->get();
            return $query->result();
        }
     public function update($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }    
    public function get_status(){
        $status='belum';
        $this->db->where('status',$status);
        $query=$this->db->get('detail_pemesanan');
        if ($query->num_rows() > 0) {
        return $query->num_rows();
    }else{
        return 0;
    }
    }
}