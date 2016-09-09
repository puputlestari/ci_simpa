<?php
class Manipulasi_Orangtua extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_orangtua_m');
    }

    public function index(){
        $this->load->view('manipulasi_orangtua_v');
    }

    public function save()
    {
        $this->manipulasi_orangtua_m->set_id_ortu($this->input->post('id_ortu'));
        $this->manipulasi_orangtua_m->set_password($this->input->post('password'));
        $this->manipulasi_orangtua_m->set_nama($this->input->post('nama'));
        $this->manipulasi_orangtua_m->set_jeniskelamin($this->input->post('jeniskelamin'));
        $this->manipulasi_orangtua_m->set_tgllahir($this->input->post('tgllahir'));
        $this->manipulasi_orangtua_m->set_notelp($this->input->post('notelp'));
        $this->manipulasi_orangtua_m->set_email($this->input->post('email'));
        $this->manipulasi_orangtua_m->set_alamat($this->input->post('alamat'));

        $query = $this->manipulasi_orangtua_m->insert();
        redirect('manipulasi_orangtua');
    }

    public function update()
    {
        $this->manipulasi_orangtua_m->set_id_ortu($this->input->post('id_ortu_tmp'));
        $this->manipulasi_orangtua_m->set_password($this->input->post('password'));
        $this->manipulasi_orangtua_m->set_nama($this->input->post('nama'));
        $this->manipulasi_orangtua_m->set_jeniskelamin($this->input->post('jeniskelamin'));
        $this->manipulasi_orangtua_m->set_tgllahir($this->input->post('tgllahir'));
        $this->manipulasi_orangtua_m->set_notelp($this->input->post('notelp'));
        $this->manipulasi_orangtua_m->set_email($this->input->post('email'));
        $this->manipulasi_orangtua_m->set_alamat($this->input->post('alamat'));
        $query = $this->manipulasi_orangtua_m->update();
        redirect('manipulasi_orangtua');
    }

    public function delete()
    {
        $this->manipulasi_orangtua_m->set_id_ortu($this->uri->segment(3));
        $this->manipulasi_orangtua_m->delete();
        redirect(site_url().'manipulasi_orangtua');

    }

    public function delete_all()
    {
        $this->manipulasi_orangtua_m->delete_all();
        redirect(site_url().'manipulasi_orangtua');
    }
}
?>