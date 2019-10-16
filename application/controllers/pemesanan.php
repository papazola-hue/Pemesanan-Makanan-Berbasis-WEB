<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class pemesanan extends CI_Controller {

		function __construct() {
		parent::__construct();
		$this->load->helper(array('form',  'url'));
		$this->load->model('cart_model');
	}
		public function index(){
					$cart=$this->cart->contents();
					if (empty($cart)) {
					$this->session->set_flashdata('success', 'Success Message...');
					redirect('home/cart');
					}else{
					foreach ($this->cart->contents() as $key) {
						if ($key['qty'] > 0) {
							$data['cart']=$this->cart->contents();
							$this->load->view('header');
							$this->load->view('pemesanan/pembayaran',$data);
							$this->load->view('footer');						
						}
						break;
					}
				}
		}
		public function input(){
			$id_pemesan = $this->input->post('id_pemesan'); // Ambil data nis dan masukkan ke variabel nis
			$nama_pemesan = $this->input->post('nama_pemesan');
			$total = $this->input->post('total');
    $total_harga = $this->input->post('total_harga'); // Ambil data nama dan masukkan ke variabel nama
    $id_menu = $this->input->post('id_menu'); // Ambil data telp dan masukkan ke variabel telp
    $jml_beli = $this->input->post('jml_beli'); // Ambil data alamat dan masukkan ke variabel alamat
     $status = "Sudah";

     
     $data=array(
     	'nama_pemesan'=>$nama_pemesan,
     	'total_bayar'=>$total
     );
     $datapesanan=$this->cart_model->input_pemesan($data);
     $pemesan=$this->cart_model->get_id($nama_pemesan);
     if($datapesanan==!NULL){
    $data = array();
    $index=0;
    if(!empty($id_menu)){
    foreach ($id_menu as $menu) {
    	array_push($data, array(
    		'id_menu'=>$id_menu[$index],
    		'id_pemesan'=>$pemesan,
    		'jml_beli'=>$jml_beli[$index],
    		'total_harga'=>$total_harga[$index],
    		'tanggal_pemesanan'=>date('Y-m-d H:i:s'),
    		'status'=>$status
    	));
    	$index++;
    }
}
    $sql=$this->cart_model->insert_pemesan($data);
    $nama=$this->input->post('nama');
    $query=$this->cart_model->cek($nama);
			if ($query > 0) {
				$this->session->set_flashdata('pesananberhasil', 'Success Message...');
				redirect('home');
			}
		}
		}
}