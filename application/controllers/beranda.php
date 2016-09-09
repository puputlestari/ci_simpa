<?php

	class Beranda extends CI_Controller{

		//constructor
		public function __construct(){
			parent::__construct();

        //Model
        //$this->load->model('pengguna_m');
        //$this->load->model('kontak_m');
        }

		//Method Index
		public function index(){
			$this->load->view('beranda_v');
		}

        //public function login()
        //{
            //$this->pengguna_m->set_username($this->input->post('username'));
            //$this->pengguna_m->set_password($this->input->post('password'));

            //$query = $this->pengguna_m->view_by_username_password();
            //if($query->num_rows())
            //{
                //$row = $query->row();

                //$this->session->set_userdata('username', $row->username);
                //$this->session->set_userdata('status', $row->status);

                //redirect(site_url().'manipulasi_admin');
            //}
            //else{
              // $data["status"] = "gagallogin";
                //$this->load->view('beranda_v', $data);
                //redirect(site_url().'manipulasi_admin');
            //}
        //}

        //public function logout()
        //{
            //$this->session->unset_userdata('username');
            //$this->session->sess_destroy();
            //redirect(site_url());
        //}

    }
?>
