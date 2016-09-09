<?PHP
	class Data_mkonsultasi extends CI_Controller
	{
		//Constructor
		
		public function __construct()
		{
			parent::__construct();
            $this->load->model('data_mkonsultasi_m');
		}
		
		//Index
		
		public function index()
		{
			$this->load->view('data_mkonsultasi_v');
		}
        public function save()
        {
            $this->data_mkonsultasi_m->set_id_pengajar($this->session->userdata('id_pengajar'));
            $this->data_mkonsultasi_m->set_kode_konsultasi($this->input->post('kode_konsultasi'));
            $this->data_mkonsultasi_m->set_waktu_respon($this->input->post('waktu_respon'));
            $this->data_mkonsultasi_m->set_respon_konsultasi($this->input->post('respon_konsultasi'));
            //$this->data_mkonsultasi_m->set_penerima($this->input->post('penerima'));
            //echo $this->input->post('penerima');
            $hasil = $this->data_mkonsultasi_m->insert();

            if($hasil){
                redirect('data_mkonsultasi');
            }
            else{
                redirect('data_mkonsultasi');
			}
		}

        public function update()
        {
			$this->data_mkonsultasi_m->set_id_pengajar($this->session->userdata('id_pengajar'));
            $this->data_mkonsultasi_m->set_kode_konsultasi($this->input->post('kode_konsultasi_tmp'));
            $this->data_mkonsultasi_m->set_waktu_respon($this->input->post('waktu_respon'));
            $this->data_mkonsultasi_m->set_respon_konsultasi($this->input->post('respon_konsultasi'));
            //$this->data_mkonsultasi_m->set_penerima($this->input->post('penerima'));
      
            $query = $this->data_mkonsultasi_m->update();
            redirect(site_url().'data_konsultasi');
        }

        public function delete()
        {
            $this->data_mkonsultasi_m->set_kode_konsultasi($this->uri->segment(3));
            $this->data_mkonsultasi_m->delete();
            redirect(site_url().'data_konsultasi');

        }
        public function delete_all()
        {
            $this->data_mkonsultasi_m->delete_all();
            redirect(site_url().'data_konsultasi');
        }
	}
?>