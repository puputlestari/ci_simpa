<?php
class Manipulasi_Admin_M extends CI_Model{
    private $id_admin;
    private $nama;
    private $password;

    public function set_id_admin($value){
        $this->id_admin = $value;
    }

    public function set_nama($value){
        $this->nama = $value;
    }

    public function set_password($value){
        $this->password = $value;
    }

    public function get_id_admin(){
        return $this->id_admin;
    }

    public function get_nama(){
        return $this->nama;
    }

    public function get_password(){
        return $this->password;
    }

    public function view(){
        $sql = "SELECT * FROM tbl_admin";
        return $this->db->query($sql);
    }

    /*public function id_ad(){

        $this->load->database('db_simpa');

        $temp = $this->db->get('tbl_admin');

        foreach($temp->result() as $row){
            $idk = $row->id_admin;
        }
        $idk1 = substr($idk,1,3);

        $temp1 = $idk1+1;

        if($temp1 > 99){
            return $this->id_ds="A".$temp1;
        }
        else if($temp1 >9){
            return $this->id_ds="A0".$temp1;
        }
        else{
            return $this->id_ds="A00".$temp1;
        }
    }*/

    public function  view_by_id_admin()
    {
        $sql = "SELECT *
					FROM tbl_admin
					WHERE id_admin='".$this->get_id_admin()."'";
        return $this->db->query($sql);
    }

    public function save(){
        $sql= "insert into tbl_admin(id_admin,nama,password)
					values
					('".$this->get_id_admin()."','".$this->get_nama()."','".$this->get_password()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_admin
					set nama='".$this->get_nama()."', password='".$this->get_password()."'
					where id_admin='".$this->get_id_admin()."'";
        $this->db->query($sql);
    }

    public function delete(){
        $sql = "delete from tbl_admin
					where id_admin='".$this->get_id_admin()."'";
        $this->db->query($sql);
    }

    public function delete_all(){
        $sql = "truncate tbl_admin ";
        $this->db->query($sql);
    }

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>