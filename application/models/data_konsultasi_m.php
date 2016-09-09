<?PHP
	class Data_konsultasi_m extends CI_Model
	{
		//Property
		
		private $kode_konsultasi;
		private $waktu_input;
		private $isi_konsultasi;
        private $id_ortu;

        public function set_id_ortu($value)
        {
            $this->id_ortu = $value;
        }
        public function get_id_ortu()
        {
            return $this->id_ortu;
        }
        
		public function set_kode_konsultasi($value)
		{
			$this->kode_konsultasi = $value;
		}
		public function get_kode_konsultasi()
		{
			return $this->kode_konsultasi;
		}
		public function set_waktu_input($value)
		{
			$this->waktu_input = $value;
		}
		public function get_waktu_input()
		{
			return $this->waktu_input;
		}
		
		public function set_isi_konsultasi($value)
		{
			$this->isi_konsultasi= $value;
		}
		public function get_isi_konsultasi()
		{
			return $this->isi_konsultasi;
		} 
		
		
		//Method
		
		/*public function view_admin()
		{
            $sql= "SELECT *
            FROM tbl_pesan  inner join tbl_pengguna  on tbl_pesan.id_ortu=tbl_pengguna.id_ortu where penerima='admin'";
            return $this->db->query($sql);
		}*/

        public function orangtua($aaa){
            $this->db->where("id_ortu",$aaa);
            $query = $this->db->get("tbl_konsultasi");
            return $query->result();
        }

        public function view_ortu()
        {
           $sql= "SELECT *
            FROM tbl_konsultasi where id_ortu='".$this->get_id_ortu()."' ";
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
					set waktu_input='".$this->get_waktu_input()."',
					isi_konsultasi='".$this->get_isi_konsultasi()."',
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
					(id_ortu,waktu_input,isi_konsultasi)
					values
					('".$this->get_id_ortu()."','".$this->get_waktu_input()."','".$this->get_isi_konsultasi()."')";
           // echo $sql;
			$this->db->query($sql);
		}
			}