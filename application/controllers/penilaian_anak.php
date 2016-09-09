<?PHP
error_reporting(E_ALL ^ (E_NOTICE |E_WARNING));

class Penilaian_anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Model

        $this->load->model('penilaian_anak_m');
        $this->load->model('manipulasi_orangtua_m');
        $this->load->model('manipulasi_pengajar_m');
    }

    public function nilai($id)
    {
        //$data['asd'] = $id;
        $data['asd'] = $this->penilaian_anak_m->nilai($id);
        //echo $id;die();
        $this->load->view('penilaian_anak_v',$data);
    }

    public function pengajar($id){
        $data['sss'] = $this->penilaian_anak_m->pengajar($id);
        $this->load->view('penilaian_anak_v',$data);
    }

    public function ortu()
    {
        $this->load->view('berandaortu_v');
    }

    public function save()
    {
        //$this->manipulasi_perkembangan_anak_m->set_kode_perkembangan($this->input->post('kode_perkembangan'));
        $this->penilaian_anak_m->set_id_pengajar($this->input->post('id_pengajar'));
        $this->penilaian_anak_m->set_nis($this->input->post('nis'));
        $this->penilaian_anak_m->set_kode_mapel($this->input->post('kode_mapel'));
        $this->penilaian_anak_m->set_nilai($this->input->post('nilai'));
        $this->penilaian_anak_m->set_keterangan($this->input->post('keterangan'));

        $query = $this->penilaian_anak_m->insert();
             redirect('manipulasi_perkembangan_anak');
    }
}
?>