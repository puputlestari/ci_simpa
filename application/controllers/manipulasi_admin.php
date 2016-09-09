<?php
class Manipulasi_Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_admin_m');
    }

    public function index(){
        $this->load->view('manipulasi_admin_v');
    }

    public function save()
    {
        $this->manipulasi_admin_m->set_id_admin($this->input->post('id_admin'));
        $this->manipulasi_admin_m->set_nama($this->input->post('nama'));
        $this->manipulasi_admin_m->set_password($this->input->post('password'));

        $query = $this->manipulasi_admin_m->save();
        redirect('manipulasi_admin');
    }

    public function update()
    {
        $this->manipulasi_admin_m->set_id_admin($this->input->post('id_admin_tmp'));
        $this->manipulasi_admin_m->set_nama($this->input->post('nama'));
        $query = $this->manipulasi_admin_m->update();
        redirect(site_url().'manipulasi_admin');
    }

    public function delete()
    {
        $this->manipulasi_admin_m->set_id_admin($this->uri->segment(3));
        $this->manipulasi_admin_m->delete();
        redirect(site_url().'manipulasi_admin');

    }

    public function delete_all()
    {
        $this->manipulasi_admin_m->delete_all();
        redirect(site_url().'manipulasi_admin');
    }
}
?>