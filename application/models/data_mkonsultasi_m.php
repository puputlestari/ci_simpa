<?PHP
	class Data_mkonsultasi_m extends CI_Model
	{
		//Property
		
		private $kode_konsultasi;
		private $waktu_respon;
		private $respon_konsultasi;
        private $id_pengajar;

         public function set_id_pengajar($value)
        {
            $this->id_pengajar = $value;
        }
        public function get_id_pengajar 	()
        {
            return $this->id_pengajar;
        }
        
		public function set_kode_konsultasi($value)
		{
			$this->kode_konsultasi = $value;
		}
		public function get_kode_konsultasi()
		{
			return $this->kode_konsultasi;
		}
		public function set_waktu_respon($value)
		{
			$this->waktu_respon = $value;
		}
		public function get_waktu_input()
		{
			return $this->waktu_respon;
		}
		
		public function set_respon_konsultasi($value)
		{
			$this->respon_konsultasi= $value;
		}
		public function get_isi_konsultasi()
		{
			return $this->respon_konsultasi;
		} 
		
		
		//Method
		
		public function view_pengajar()
		{
            $sql= "SELECT *
            FROM tbl_konsultasi where id_pengajar='".$this->get_id_pengajar()."' ";
            return $this->db->query($sql);
		}
		
        public function view_ortu()
        {
           $sql= "SELECT *
            FROM tbl_konsultasi where id_pengajar='".$this->get_id_ortu()."' ";
            return $this->db->query($sql);
        }

		public function view_by_kode_konsultasi()
		{
			$sql = "SELECT * 
					FROM tbl_konsultasi
					WHERE kode_konsultasi='".$this->get_kode_konsultasi()."'";
			
			return $this->db->query($sql);
		}
		public function update()
		{
				$sql = "update tbl_konsultasi
					set waktu_respon='".$this->get_waktu_respon()."',
					respon_konsultasi='".$this->get_respon_konsultasi()."',
                    where kode_konsultasi='".$this->get_kode_konsultasi()."'";
			$this->db->query($sql);	
		}
		public function delete(){
			$sql = "delete from tbl_konsultasi 
					where kode_konsultasi='".$this->get_kode_konsultasi()."'";
			$this->db->query($sql);	
		}
		public function delete_all(){
			$sql = "truncate tbl_konsultasi ";
			$this->db->query($sql);	
		}
		public function insert(){
			$sql="insert into tbl_konsultasi
					(id_pengajar,waktu_respon,respon_konsultasi)
					values
					('".$this->get_id_pengajar()."','".$this->get_waktu_respon()."','".$this->get_respon_konsultasi()."')";
           // echo $sql;
			$this->db->query($sql);
		}
			}