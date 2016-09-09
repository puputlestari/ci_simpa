<?php
class Manipulasi_Pengajar extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_pengajar_m');
    }

    public function index(){
        $this->load->view('manipulasi_pengajar_v');
    }

    public function save()
    {
        $this->manipulasi_pengajar_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->manipulasi_pengajar_m->set_password($this->input->post('password'));
        $this->manipulasi_pengajar_m->set_nama($this->input->post('nama'));
        $this->manipulasi_pengajar_m->set_jeniskelamin($this->input->post('jeniskelamin'));
        $this->manipulasi_pengajar_m->set_tgllahir($this->input->post('tgllahir'));
        $this->manipulasi_pengajar_m->set_notelp($this->input->post('notelp'));
        $this->manipulasi_pengajar_m->set_alamat($this->input->post('alamat'));
        $this->manipulasi_pengajar_m->set_tingkat_pendidikan($this->input->post('tingkat_pendidikan'));

        $query = $this->manipulasi_pengajar_m->insert();
        redirect('manipulasi_pengajar');

    }

    public function update()
    {
        $this->manipulasi_pengajar_m->set_id_pengajar($this->input->post('id_pengajar_tmp'));
        $this->manipulasi_pengajar_m->set_nama($this->input->post('nama'));
        $this->manipulasi_pengajar_m->set_jeniskelamin($this->input->post('jeniskelamin'));
        $this->manipulasi_pengajar_m->set_tgllahir($this->input->post('tgllahir'));
        $this->manipulasi_pengajar_m->set_notelp($this->input->post('notelp'));
        $this->manipulasi_pengajar_m->set_alamat($this->input->post('alamat'));
        $this->manipulasi_pengajar_m->set_tingkat_pendidikan($this->input->post('tingkat_pendidikan'));

        $query = $this->manipulasi_pengajar_m->update();
        redirect(site_url().'manipulasi_pengajar');
    }

    public function delete()
    {
        $this->manipulasi_pengajar_m->set_id_pengajar($this->uri->segment(3));
        $this->manipulasi_pengajar_m->delete();
        redirect(site_url().'manipulasi_pengajar');

    }

    public function delete_all()
    {
        $this->manipulasi_pengajar_m->delete_all();
        redirect(site_url().'manipulasi_pengajar');
    }
}
?>