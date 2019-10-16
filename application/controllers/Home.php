<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		function __construct() {
			parent::__construct(); // lokasi memanggil libary, model, helper sekali panggil
			// $this->load->model('Nama_model');
			// $this->load->library('library');
		$this->load->database();
		$this->load->model('mabout');
		$this->load->model('mmenu');
		$this->load->model('mgallery');
		$this->load->model('marticle');
		$this->load->model('mcontact');
		$this->load->model('mcomment');
		$this->load->model('cart_model');
		
		}

		public function cart(){
			$this->load->view('header');
			$data['data']=$this->cart_model->get_all_produk();
			$this->load->view('pemesanan/v_cart',$data);
			$this->load->view('footer');
		}
		function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id' => $this->input->post('id_menu'), 
			'name' => $this->input->post('nama_menu'), 
			'price' => $this->input->post('harga'), 
			'qty' => $this->input->post('quantity'), 
		);
		$this->cart->insert($data);
		echo $this->show_cart(); //tampilkan cart setelah added
	}
	function show_cart(){ //Fungsi untuk menampilkan Cart
		$output = '';
		$no = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$output .='
				<tr>
					<td>'.$items['name'].'</td>
					<td>'.number_format($items['price']).'</td>
					<td>'.$items['qty'].'</td>
					<td>'.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
			</tr>
		';
	// 	foreach ($this->cart->contents() as $item) {
	// 	$output .='
	// 		<tr>
	// 		<form action="'.base_url('pemesanan').'" method="post" >
	// 		<td><input type="hidden" name="id_menu" value="'.$item['id'].'"</td>
	// 		<td><input type="hidden" name="total_harga" value="'.$item['subtotal'].'"</td>
	// 		<td><input type="hidden" name="jml_beli" value="'.$item['qty'].'"</td>
	// 		<td><input type="submit" class="btn" value="Bayar"></td>
	// 		</form>
	// 		</tr>
	// 	';
	// }
		return $output;
	}

	function load_cart(){ //load data cart
		echo $this->show_cart();
	}

	function hapus_cart(){ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}
		public function admin() {
			$this->load->view('header');
			$this->load->view('admin/home');
			$this->load->view('footer');
		}

		public function index() {
			$this->load->view('header');
			$about['about']=$this->mabout->get_about();
			$about['com']=$this->mcomment->get_comment();
			$this->load->view('home', $about);
			// $this->template->load('menu',$data);
			$this->load->view('footer');
		}

		public function about() {
			$this->load->view('header');
			$about['about']=$this->mabout->get_about();

			$this->load->view('about/about', $about);	
			$this->load->view('footer');
		}


		public function menu(){
			$this->load->view('header');
			$data['data']=$this->mmenu->get_all_menu();
			$this->load->view('menu/menu', $data);
			$this->load->view('footer');
		}


		public function gallery(){
			$this->load->view('header');
			$gall['gall']=$this->mgallery->get_gallery();
			$this->load->view('gallery/gallery', $gall);
			$this->load->view('footer');	
		}

		public function article(){
			$config['base_url'] = site_url('home/article'); //site url
	        $config['total_rows'] = $this->db->count_all('article'); //total row
	        $config['per_page'] = 6;  //show record per halaman
	        $config['uri_segment'] = 3;  // uri parameter
	        $choice = $config['total_rows'] / $config['per_page'];
	        $config['num_links'] = floor($choice);
	 
	        // Membuat Style pagination untuk BootStrap v4
	      	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	 
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 		
			$this->load->view('header');
			$art['art']=$this->marticle->get_article_per_page($config['per_page'], $data['page']);
			$art['pagination'] = $this->pagination->create_links();
			$this->load->view('article/article', $art);
			$this->load->view('footer');
		}

		public function contact(){
			$this->load->view('header');
			$cont['cont']=$this->mcontact->get_contact();
			$this->load->view('contact/contact',$cont);
			$this->load->view('footer');
		}

		public function input(){
			$com = array(
				'nama' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'komentar' => $this->input->post('message')
				);
			$query=$this->mcontact->insert($com);
					if($query > 0){
					redirect('Home/contact');
				} 

		}

		
		// ../../assets/css/main.css == assets/css/main.css
		// method edit dengan param $id. 
			// url: http://localhost/wedhusmabur/home/edit/m33 | $id = m33
			// url: http://localhost/wedhusmabur/home/edit/123 | $id = 123

	} // end class