<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/* Created by: CodeCoding.ID
 * thanks for visit my website
 * www.codecoding.id
 */
 
class M_cart extends CI_Model{
 
  public function __construct()
  {
    parent::__construct();
  }
 
 public function get(){
    return $this->db->get('produk');
  }

  public function bayar($data){
    return $this->db->insert('order',$data);
  }
}