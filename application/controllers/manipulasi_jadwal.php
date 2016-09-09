<?php
class Manipulasi_Jadwal extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_jadwal_m');
    }

    public function index(){
        $this->load->view('manipulasi_jadwal_v');
    }

    public function save()
    {
        $this->manipulasi_jadwal_m->set_kode_jadwal($this->input->post('kode_jadwal'));
        $this->manipulasi_jadwal_m->set_kode_mapel($this->input->post('kode_mapel'));
        $this->manipulasi_jadwal_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->manipulasi_jadwal_m->set_tanggal($this->input->post('tanggal'));
        $this->manipulasi_jadwal_m->set_jam($this->input->post('jam'));
        $this->manipulasi_jadwal_m->set_ruang($this->input->post('ruang'));

        $query = $this->manipulasi_jadwal_m->insert();
        redirect('manipulasi_jadwal');

    }

    public function update()
    {
        $this->manipulasi_jadwal_m->set_kode_jadwal($this->input->post('kode_jadwal_tmp'));
        $this->manipulasi_jadwal_m->set_kode_mapel($this->input->post('kode_mapel'));
        $this->manipulasi_jadwal_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->manipulasi_jadwal_m->set_tanggal($this->input->post('tanggal'));
        $this->manipulasi_jadwal_m->set_jam($this->input->post('jam'));
        $this->manipulasi_jadwal_m->set_ruang($this->input->post('ruang'));

        $query = $this->manipulasi_jadwal_m->update();
        redirect(site_url().'manipulasi_jadwal');
    }

    public function delete()
    {
        $this->manipulasi_jadwal_m->set_kode_jadwal($this->uri->segment(3));
        $this->manipulasi_jadwal_m->delete();
        redirect(site_url().'manipulasi_jadwal');

    }

    public function delete_all()
    {
        $this->manipulasi_jadwal_m->delete_all();
        redirect(site_url().'manipulasi_jadwal');
    }
}
?>