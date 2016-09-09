<?php
class Manipulasi_Pengajar_M extends CI_Model{
    private $id_pengajar;
    private $password;
    private $nama;
    private $jeniskelamin;
    private $tgllahir;
    private $notelp;
    private $alamat;
    private $tingkat_pendidikan;

    //setter
    public function set_id_pengajar($value){
        $this->id_pengajar = $value;
    }

    public function set_password($value){
        $this->password = $value;
    }

    public function set_nama($value){
        $this->nama = $value;
    }
    public function set_jeniskelamin($value){
        $this->jeniskelamin = $value;
    }

    public function set_tgllahir($value){
        $this->tgllahir = $value;
    }

    public function set_notelp($value){
        $this->notelp = $value;
    }

    public function set_alamat($value){
        $this->alamat = $value;
    }

    public function set_tingkat_pendidikan($value){
        $this->tingkat_pendidikan = $value;
    }


    //getter
    public function get_id_pengajar(){
        return $this->id_pengajar;
    }

    public function get_password(){
        return $this->password;
    }

    public function get_nama(){
        return $this->nama;
    }

    public function get_jeniskelamin(){
        return $this->jeniskelamin;
    }

    public function get_tgllahir(){
        return $this->tgllahir;
    }

    public function get_notelp(){
        return $this->notelp;
    }

    public function get_alamat(){
        return $this->alamat;
    }

    public function get_tingkat_pendidikan(){
        return $this->tingkat_pendidikan;
    }

    //
    public function view(){
        $sql = "SELECT * FROM tbl_pengajar";
        return $this->db->query($sql);
    }

    public function id_pengajar(){

        $this->load->database('db_simpa');

        $temp = $this->db->get('tbl_pengajar');

        foreach($temp->result() as $row){
            $idk = $row->id_pengajar;
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
    }

    public function  view_by_id_pengajar()
    {
        $sql = "SELECT *
					FROM tbl_pengajar
					WHERE id_pengajar='".$this->get_id_pengajar()."'";
        return $this->db->query($sql);
    }

    public function insert(){
        $sql="insert into tbl_pengajar
					(id_pengajar, password, nama, jeniskelamin, tgllahir, notelp, alamat, tingkat_pendidikan)
					values
					('".$this->get_id_pengajar()."','".$this->get_password()."','".$this->get_nama()."','".$this->get_jeniskelamin()."','".$this->get_tgllahir()."','".$this->get_notelp()."','".$this->get_alamat()."','".$this->get_tingkat_pendidikan()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_pengajar
					set nama='".$this->get_nama()."', password='".$this->get_password()."', jeniskelamin='".$this->get_jeniskelamin()."',
					    tgllahir='".$this->get_tgllahir()."', notelp='".$this->get_notelp()."', alamat='".$this->get_alamat()."', tingkat_pendidikan='".$this->get_tingkat_pendidikan()."'
					where id_pengajar='".$this->get_id_pengajar()."'";
        $this->db->query($sql);
    }

    public function delete(){
        $sql = "delete from tbl_pengajar
					where id_pengajar='".$this->get_id_pengajar()."'";
        $this->db->query($sql);
    }

    public function delete_all(){
        $sql = "truncate tbl_pengajar ";
        $this->db->query($sql);
    }

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>