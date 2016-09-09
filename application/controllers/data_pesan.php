<?PHP
	class Data_pesan extends CI_Controller
	{
		//Constructor
		
		public function __construct()
		{
			parent::__construct();
            $this->load->model('data_pesan_m');
		}
		
		//Index
		
		public function index()
		{
			$this->load->view('data_pesan_v');
		}
        public function save()
        {
            $this->data_pesan_m->set_username($this->session->userdata('username'));
            $this->data_pesan_m->set_id_pesan($this->input->post('id_pesan'));
            $this->data_pesan_m->set_judul($this->input->post('judul'));
            $this->data_pesan_m->set_isi($this->input->post('isi'));
            $this->data_pesan_m->set_penerima($this->input->post('penerima'));

            //echo $this->input->post('penerima');



            $hasil = $this->data_pesan_m->insert();

            if($hasil){
                redirect('data_pesan');
            }
            else{
                redirect('data_pesan');
            }


        }

        public function update()
        {
            $this->data_pesan_m->set_username($this->session->userdata('username'));
            $this->data_pesan_m->set_id_pesan($this->input->post('id_pesan_tmp'));
            $this->data_pesan_m->set_judul($this->input->post('judul'));
            $this->data_pesan_m->set_isi($this->input->post('isi'));
            $this->data_pesan_m->set_penerima($this->input->post('penerima'));
       

            $query = $this->data_pesan_m->update();
            redirect(site_url().'data_pesan');

        }

        public function delete()
        {
            $this->data_pesan_m->set_id_pesan($this->uri->segment(3));
            $this->data_pesan_m->delete();
            redirect(site_url().'data_pesan');

        }
        public function delete_all()
        {
            $this->data_pesan_m->delete_all();
            redirect(site_url().'data_pesan');
        }
        public function excel()
        {

            header('Content-Type: application/ms-excel');
            header('Content-Disposition: attachment;
							filename="data_pesan.xls"');

            $this->load->view('data_pesan_report_v');
        }
        public function pdf()
        {
            $this->load->library('tcpdf');
            $this->load->library('parser');
            $pdf = new tcpdf();
            $orientation ='P';
            $format='A4';
            $keepmargins= false;
            $tocpage= false;
            $pdf->AddPage($orientation, $format, $keepmargins, $tocpage);

            $family = 'dejavusans';
            $style= '';
            $size= '12';
            $pdf->SetFont($family,$style,$size);

            $html=$this->parser->parse('data_pesan_report_v', array());

            $ln = true;
            $fill = false;
            $reseth = false;
            $cell = false;
            $align = '';

            $pdf->WriteHTML($html,$ln,$fill,$reseth,$cell,$align);
            $pdf->output();

        }

        public function chart() {
            $this->load->view('data_pesan_chart_v');
        }


	}
?>