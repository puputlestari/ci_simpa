<?php
error_reporting(0);
class pengguna_m extends CI_Model{
    private $id;
    private $password;
    private $nama;

    public function setId($value) {
        $this->id = $value;
    }
    public function setPassword($value) {
        $this->password = $value;
    }
    public function setNama($value) {
        $this->nama = $value;
    }
    public function getId(){
        return $this->id;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getNama(){
        return $this->nama;
    }

    public function view_by_login_admin() {
        $this->db->where('id_admin',$this->input->post('id'));
        $this->db->where('password',$this->input->post('password'));
        $query = $this->db->get('tbl_admin');
        return $query->result();
    }

    public function view_by_login_ortu() {
        $this->db->where('id_ortu',$this->input->post('id'));
        $this->db->where('password',$this->input->post('password'));
        $query = $this->db->get('tbl_orangtua');
        return $query->result();
    }
    public function view_by_login_pengajar() {
        $this->db->where('id_pengajar',$this->input->post('id'));
        $this->db->where('password',$this->input->post('password'));
        $query = $this->db->get('tbl_pengajar');
        return $query->result();
    }

    /*public function insert_pengguna() {
        $query = "insert into tbl_admin (username,password)
					values
					('".$this->getUsername()."','".$this->getPassword()."')";
        return $this->db->query($query);
    }*/
}

?>