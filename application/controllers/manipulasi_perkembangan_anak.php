<?php
class Manipulasi_Perkembangan_Anak extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_perkembangan_anak_m');
    }

    public function index(){
        $this->load->view('manipulasi_perkembangan_anak_v');
    }

    public function save()
    {
        $this->manipulasi_perkembangan_anak_m->set_kode_perkembangan($this->input->post('kode_perkembangan'));
        $this->manipulasi_perkembangan_anak_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->manipulasi_perkembangan_anak_m->set_nis($this->input->post('nis'));
        $this->manipulasi_perkembangan_anak_m->set_kode_mapel($this->input->post('kode_mapel'));
        $this->manipulasi_perkembangan_anak_m->set_nilai($this->input->post('nilai'));
        $this->manipulasi_perkembangan_anak_m->set_keterangan($this->input->post('keterangan'));

        $query = $this->manipulasi_perkembangan_anak_m->view_by_kode_perkembangan();
        if(! $query->num_rows())
        {
            redirect('manipulasi_perkembangan_anak');
        }
        else
            redirect('manipulasi_perkembangan_anak/index/error_save');

    }

    public function update()
    {
        $this->manipulasi_perkembangan_anak_m->set_kode_perkembangan($this->input->post('kode_perkembangan_tmp'));
        $this->manipulasi_perkembangan_anak_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->manipulasi_perkembangan_anak_m->set_nis($this->input->post('nis'));
        $this->manipulasi_perkembangan_anak_m->set_kode_mapel($this->input->post('kode_mapel'));
        $this->manipulasi_perkembangan_anak_m->set_nilai($this->input->post('nilai'));
        $this->manipulasi_perkembangan_anak_m->set_keterangan($this->input->post('keterangan'));

        $query = $this->manipulasi_perkembangan_anak_m->update();
        redirect(site_url().'manipulasi_perkembangan_anak');
    }

    public function delete()
    {
        $this->manipulasi_perkembangan_anak_m->set_kode_perkembangan($this->uri->segment(3));
        $this->manipulasi_perkembangan_anak_m->delete();
        redirect(site_url().'manipulasi_perkembangan_anak');

    }

    public function delete_all()
    {
        $this->manipulasi_perkembangan_anak_m->delete_all();
        redirect(site_url().'manipulasi_perkembangan_anak');
    }
}
?>