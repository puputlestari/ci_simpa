<?PHP
	class Data_konsultasi extends CI_Controller
	{
		//Constructor
		
		public function __construct()
		{
			parent::__construct();
            $this->load->model('data_konsultasi_m');
            $this->load->model('manipulasi_orangtua_m');
		}
		
		//Index
		
		public function index()
		{
			$this->load->view('data_konsultasi_v');
		}

        public function orangtua($id){
            $data['aaa'] = $this->data_konsultasi_m->orangtua($id);
            $this->load->view('data_konsultasi_v',$data);
        }

        public function save()
        {
            $this->data_konsultasi_m->set_id_ortu($this->session->userdata('id_ortu'));
            $this->data_konsultasi_m->set_kode_konsultasi($this->input->post('kode_konsultasi'));
            $this->data_konsultasi_m->set_waktu_input($this->input->post('waktu_input'));
            $this->data_konsultasi_m->set_isi_konsultasi($this->input->post('isi_konsultasi'));
            //$this->data_konsultasi_m->set_penerima($this->input->post('penerima'));
            //echo $this->input->post('penerima');
            $hasil = $this->data_konsultasi_m->insert();

            if($hasil){
                redirect('data_konsultasi');
            }
            else{
                redirect('data_konsultasi');
            }
        }

        public function update()
        {
            $this->data_konsultasi_m->set_id_ortu($this->session->userdata('id_ortu'));
            $this->data_konsultasi_m->set_kode_konsultasi($this->input->post('kode_konsultasi_tmp'));
            $this->data_konsultasi_m->set_waktu_input($this->input->post('waktu_input'));
            $this->data_konsultasi_m->set_isi_konsultasi($this->input->post('isi_konsultasi'));
            //$this->data_konsultasi_m->set_penerima($this->input->post('penerima'));
      
            $query = $this->data_konsultasi_m->update();
            redirect(site_url().'data_konsultasi');
        }

        public function delete()
        {
            $this->data_konsultasi_m->set_kode_konsultasi($this->uri->segment(3));
            $this->data_konsultasi_m->delete();
            redirect(site_url().'data_konsultasi');

        }
        public function delete_all()
        {
            $this->data_konsultasi_m->delete_all();
            redirect(site_url().'data_konsultasi');
        }
	}
?>