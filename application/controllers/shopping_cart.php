<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Created by: CodeCoding.ID
 * thanks for visit my website
 * www.codecoding.id
 */

class Shopping_cart extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_cart');
  }

  public function index(){

    $data['product'] = $this->M_cart->get()->result();
    $data['cart'] = $this->cart->contents();
    $this->load->view('index',$data);
  }

  public function beli(){
    $data = array(
            'id' => $this->input->post('id'),
      'name' => $this->input->post('nama'),
      'price' => $this->input->post('harga'),
      'gambar' => $this->input->post('gambar'),
      'qty' =>$this->input->post('qty')
      );
  $this->cart->insert($data);
    redirect('Shopping_cart');
  }

  public function keranjang_belanja(){
    $data['cart'] = $this->cart->contents();
    $this->load->view('keranjang_belanja',$data);
  }

  public function ubah(){
    $cart_info = $_POST['cart'] ;
      foreach( $cart_info as $id => $cart)
      {
        $rowid = $cart['rowid'];
        $price = $cart['price'];
        $gambar = $cart['gambar'];
        $amount = $price * $cart['qty'];
        $qty = $cart['qty'];
        $data = array('rowid' => $rowid,
                'price' => $price,
                'gambar' => $gambar,
                'amount' => $amount,
                'qty' => $qty);
        $this->cart->update($data);
      }
    redirect('Shopping_cart/keranjang_belanja');
  }

  public function hapus($rowid){
    if ($rowid =="semua"){
        $this->cart->destroy();
      }else{
        $data = array('rowid' => $rowid,
                  'qty' =>0);
        $this->cart->update($data);
      }
    redirect('Shopping_cart/keranjang_belanja');
}

public function bayar(){
    $cart = $this->cart->contents();
      foreach($cart as $item){
        $data = array(
          'id_produk' => $item['id'],
          'qty' => $item['qty'],
          'subtotal' => $item['subtotal']
        );
        $this->M_cart->bayar($data);
      }
    $this->cart->destroy();
    redirect('Shopping_cart/keranjang_belanja');
  }
}
