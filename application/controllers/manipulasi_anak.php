<?php
class Manipulasi_Anak extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_anak_m');
    }

    public function index(){
        $this->load->view('manipulasi_anak_v');
    }

    public function save()
    {
        $this->manipulasi_anak_m->set_nis($this->input->post('nis'));
        $this->manipulasi_anak_m->set_kode_jadwal($this->input->post('kode_jadwal'));
        $this->manipulasi_anak_m->set_id_ortu($this->input->post('id_ortu'));
        $this->manipulasi_anak_m->set_nama($this->input->post('nama'));
        $this->manipulasi_anak_m->set_tgllahir($this->input->post('tgllahir'));
        $this->manipulasi_anak_m->set_jeniskelamin($this->input->post('jeniskelamin'));
        $this->manipulasi_anak_m->set_anak_ke($this->input->post('anak_ke'));
        $this->manipulasi_anak_m->set_jml_saudara($this->input->post('jml_saudara'));

        $query = $this->manipulasi_anak_m->insert();
        redirect('manipulasi_anak');
    }

    public function update()
    {
        $this->manipulasi_anak_m->set_nis($this->input->post('nis_tmp'));
        $this->manipulasi_anak_m->set_kode_jadwal($this->input->post('kode_jadwal'));
        $this->manipulasi_anak_m->set_id_ortu($this->input->post('id_ortu'));
        $this->manipulasi_anak_m->set_nama($this->input->post('nama'));
        $this->manipulasi_anak_m->set_tgllahir($this->input->post('tgllahir'));
        $this->manipulasi_anak_m->set_jeniskelamin($this->input->post('jeniskelamin'));
        $this->manipulasi_anak_m->set_anak_ke($this->input->post('anak_ke'));
        $this->manipulasi_anak_m->set_jml_saudara($this->input->post('jml_saudara'));

        $query = $this->manipulasi_anak_m->update();
        redirect(site_url().'manipulasi_anak');
    }

    public function delete()
    {
        $this->manipulasi_anak_m->set_nis($this->uri->segment(3));
        $this->manipulasi_anak_m->delete();
        redirect(site_url().'manipulasi_anak');

    }

    public function delete_all()
    {
        $this->manipulasi_anak_m->delete_all();
        redirect(site_url().'manipulasi_anak');
    }
}
?>