<?php
class Manipulasi_Mapel extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_mapel_m');
    }

    public function index(){
        $this->load->view('manipulasi_mapel_v');
    }

    public function save()
    {
        $this->manipulasi_mapel_m->set_kode_mapel($this->input->post('kode_mapel'));
        $this->manipulasi_mapel_m->set_nama_mapel($this->input->post('nama_mapel'));
        $this->manipulasi_mapel_m->set_kegiatan($this->input->post('kegiatan'));

        $query = $this->manipulasi_mapel_m->insert();
        redirect('manipulasi_mapel');
    }

    public function update()
    {
        $this->manipulasi_mapel_m->set_kode_mapel($this->input->post('kode_mapel_tmp'));
        $this->manipulasi_mapel_m->set_nama_mapel($this->input->post('nama_mapel'));
        $this->manipulasi_mapel_m->set_kegiatan($this->input->post('kegiatan'));
        $query = $this->manipulasi_mapel_m->update();
        redirect(site_url().'manipulasi_mapel');
    }

    public function delete()
    {
        $this->manipulasi_mapel_m->set_kode_mapel($this->uri->segment(3));
        $this->manipulasi_mapel_m->delete();
        redirect(site_url().'manipulasi_mapel');

    }

    public function delete_all()
    {
        $this->manipulasi_mapel_m->delete_all();
        redirect(site_url().'manipulasi_mapel');
    }
}
?>