<?php

class Login extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('simple_login');
                $this->load->library('template');
                $this->load->library('session');
        }

        public function index()
        {
                $valid= $this->form_validation;
                $username=$this->input->post('username');
                $password=$this->input->post('password');
                $valid->set_rules('username','Username','required');
                $valid->set_rules('password','Password','required');
                if($valid->run()) 
                {
                        if($username!='admin'){
                        $this->simple_login->login($username,$password);
                        }
                }
                //End function login
                // $data=array('title'=> 'Halaman Login Administrator');
                // $this->load->view('view_login', $data);
                $this->template->set('title', 'Login');
                $this->template->load('login_layout', 'contents' , 'view_login');
        }
        public function register(){
                //$valid= $this->form_validation;
                $this->form_validation->set_rules('username', 'username', 'trim|required');
                $this->form_validation->set_rules('nama', 'nama', 'trim|required');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                $config = array(
                        'upload_path' => './assets/user/',
                        'allowed_types' => 'jpeg|jpg|png',
                        'max_size' => '6000',
                        'max_width' => '6000',
                        'max_height' => '6000'
                );
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto'))
                {
                 $this->template->set('title', 'Login');
                $this->template->load('login_layout', 'contents' , 'view_login');    
                }else {
                $file = $this->upload->data();
               $tanggal = date("Y-m-d H:i:s");
                $data = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'foto' =>  $file['file_name'],
                'alamat' => $this->input->post('alamat')
                );
                $this->login_user->insert($data);
                $this->session->set_flashdata('success', 'Success Message...');
                redirect('login');
                }
        }
        public function logout()
        {
                $this->simple_login->logout();
        }


}
// http://localhost/pemweblan/CIform/index.php/form