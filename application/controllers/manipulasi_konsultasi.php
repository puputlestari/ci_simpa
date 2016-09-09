<?php
class Manipulasi_Konsultasi extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('manipulasi_konsultasi_m');
    }

    public function index(){
        $this->load->view('manipulasi_konsultasi_v');
    }
    //public function coba(){
        //$this->load->view('coba');
   // }
    public function save()
    {
        $this->manipulasi_konsultasi_m->set_kode_konsultasi($this->input->post('kode_konsultasi'));
        $this->manipulasi_konsultasi_m->set_id_ortu($this->input->post('id_ortu'));
        $this->manipulasi_konsultasi_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->manipulasi_konsultasi_m->set_waktu_input($this->input->post('waktu_input'));
        $this->manipulasi_konsultasi_m->set_waktu_respon($this->input->post('waktu_respon'));
        $this->manipulasi_konsultasi_m->set_isi_konsultasi($this->input->post('isi_konsultasi'));
        $this->manipulasi_konsultasi_m->set_respon_konsultasi($this->input->post('respon_konsultasi'));

        $query = $this->manipulasi_konsultasi_m->view_by_kode_konsultasi();
        if(! $query->num_rows())
        {
            redirect('manipulasi_konsultasi');
        }
        else
            redirect('manipulasi_konsultasi/index/error_save');

    }

    public function update()
    {
        //echo $this->input->post('id_admin_tmp');
        //echo $this->input->post('nama');
        $this->manipulasi_konsultasi_m->set_kode_konsultasi($this->input->post('kode_konsultasi_tmp'));
        $this->manipulasi_konsultasi_m->set_id_ortu($this->input->post('id_ortu'));
        $this->manipulasi_konsultasi_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->manipulasi_konsultasi_m->set_waktu_input($this->input->post('waktu_input'));
        $this->manipulasi_konsultasi_m->set_waktu_respon($this->input->post('waktu_respon'));
        $this->manipulasi_konsultasi_m->set_isi_konsultasi($this->input->post('isi_konsultasi'));
        $this->manipulasi_konsultasi_m->set_respon_konsultasi($this->input->post('respon_konsultasi'));

        $query = $this->manipulasi_konsultasi_m->update();
        redirect(site_url().'manipulasi_konsultasi');
    }

    public function delete()
    {
        $this->manipulasi_konsultasi_m->set_kode_konsultasi($this->uri->segment(3));
        $this->manipulasi_konsultasi_m->delete();
        redirect(site_url().'manipulasi_konsultasi');

    }

    public function delete_all()
    {
        $this->manipulasi_konsultasi_m->delete_all();
        redirect(site_url().'manipulasi_konsultasi');
    }
}
?>