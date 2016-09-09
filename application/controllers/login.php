<?php
error_reporting(0);
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_m');
    }

    public function index()
    {
        $this->load->view('login_v');
        //$this->load->library('session');
    }
    /*public function login_admin($id,$pass){
        $data = $this->pengguna_m->view_by_login_admin($id,$pass);
        if($data->num_rows()){
            $row = $result->row();
            $this->session->set_userdata('username',$row->username);
            $this->session->set_userdata('nama',$row->nama);
            $this->session->set_userdata('status','admin');
            redirect('manipulasi_admin');
        }else{
            redirect('login');
        }
    }*/

    public	function sign_in() {
        $uname = $this->input->post('id');
        $password = $this->input->post('password');
        $x = substr($uname,0,1);
        switch($x){
            case 'A':
 //              echo "A";
                $data['login'] = $this->pengguna_m->view_by_login_admin();
                if($data) {
                    foreach($data['login'] as $asd){
                        $this->session->set_userdata('nama',$asd->nama);
                        $this->session->set_userdata('id',$asd->id_admin);
                        $this->session->set_userdata('status','admin');}
                    redirect('manipulasi_admin');
                }else{
                    redirect('login');
                }
                break;
            case 'P':
  //              echo "P";
                $data['login'] = $this->pengguna_m->view_by_login_pengajar();
                if($data) {
                    foreach($data['login'] as $asd){
                        $this->session->set_userdata('nama',$asd->nama);
                        $this->session->set_userdata('id',$asd->id_pengajar);
                        $this->session->set_userdata('status','pengajar');}
                    redirect('manipulasi_anak');
                }else{
                    redirect('login');
                }
                break;
            case 'O':
//                echo "O";
                $data['login'] = $this->pengguna_m->view_by_login_ortu();
                if($data) {
                    foreach($data['login'] as $asd){
                        $this->session->set_userdata('nama',$asd->nama);
                        $this->session->set_userdata('id',$asd->id_ortu);
                        $this->session->set_userdata('status','orangtua');}
                    redirect('penilaian_anak/ortu');
                }else{
                    redirect('login');
                }
                break;
            default:
                echo "default";
                break;
        }
    }

    public function logout(){
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id');
        //delete_cookie('');
        //$this->session->sess_destroy();
        redirect(base_url().'');
    }
}
?>










































































































































