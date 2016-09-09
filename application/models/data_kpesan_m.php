<?PHP
	class Data_kpesan_m extends CI_Model
	{
		//Property
		
		private $id_pesan;
		private $judul;
		private $isi;
        private $username;

        public function set_username($value)
        {
            $this->username = $value;
        }
        public function get_username()
        {
            return $this->username;
        }

		public function set_id_pesan($value)
		{
			$this->id_pesan = $value;
		}
		public function get_id_pesan()
		{
			return $this->id_pesan;
		}
		public function set_judul($value)
		{
			$this->judul = $value;
		}
		public function get_judul()
		{
			return $this->judul;
		}
		
		public function set_isi($value)
		{
			$this->isi= $value;
		}
		public function get_isi()
		{
			return $this->isi;
		} 
		
		
		//Method
		
		public function view_admin()
		{
			$sql = "SELECT * 
					FROM tbl_pesan  inner join tbl_pengguna  on tbl_pesan.username=tbl_pengguna.username where nama=admin";

			return $this->db->query($sql);
		}
        public function view_pengguna()
        {
            $sql = "SELECT *
					FROM tbl_pesan  inner join tbl_pengguna  on tbl_pesan.username=tbl_pengguna.username where tbl_pengguna.username ='".$this->get_username()."'";

            return $this->db->query($sql);
        }
        public function view()
        {
            $sql = "SELECT *
					FROM tbl_pesan  inner join tbl_pengguna  on tbl_pesan.username=tbl_pengguna.username ";

            return $this->db->query($sql);
        }

		public function view_by_id_pesan()
		{
			$sql = "SELECT * 
					FROM tbl_pesan
					WHERE id_pesan='".$this->get_id_pesan()."'";
			
			return $this->db->query($sql);
		}
		public function update()
		{
				$sql = "update tbl_pesan 
					set judul='".$this->get_judul()."',
					isi='".$this->get_isi()."'
					where id_pesan='".$this->get_id_pesan()."'";
			$this->db->query($sql);	
		}
		public function delete(){
			$sql = "delete from tbl_pesan 
					where id_pesan='".$this->get_id_pesan()."'";
			$this->db->query($sql);	
		}
		public function delete_all(){
			$sql = "truncate tbl_pesan ";
			$this->db->query($sql);	
		}
		public function insert(){
			$sql="insert into tbl_pesan
					(username,id_pesan,judul,isi)
					values
					('".$this->get_username()."','".$this->get_id_pesan()."','".$this->get_judul()."','".$this->get_isi()."')";
			$this->db->query($sql);
		}
			}