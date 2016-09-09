<?php
class Manipulasi_Anak_M extends CI_Model{

    //property
    private $nis;
    private $kode_jadwal;
    private $id_ortu;
    private $nama;
    private $tgllahir;
    private $jeniskelamin;
    private $anak_ke;
    private $jml_saudara;

    //setter
    public function set_nis($value){
        $this->nis = $value;
    }

    public function set_kode_jadwal($value){
        $this->kode_jadwal = $value;
    }

    public function set_id_ortu($value){
        $this->id_ortu = $value;
    }

    public function set_nama($value){
        $this->nama = $value;
    }

    public function set_tgllahir($value){
        $this->tgllahir = $value;
    }

    public function set_jeniskelamin($value){
        $this->jeniskelamin = $value;
    }

    public function set_anak_ke($value){
        $this->anak_ke = $value;
    }

    public function set_jml_saudara($value){
        $this->jml_saudara = $value;
    }


    //getter
    public function get_nis(){
        return $this->nis;
    }

    public function get_kode_jadwal(){
        return $this->kode_jadwal;
    }

    public function get_id_ortu(){
        return $this->id_ortu;
    }

    public function get_nama(){
        return $this->nama;
    }

    public function get_tgllahir(){
        return $this->tgllahir;
    }

    public function get_jeniskelamin(){
        return $this->jeniskelamin;
    }

    public function get_anak_ke(){
        return $this->anak_ke;
    }

    public function get_jml_saudara(){
        return $this->jml_saudara;
    }


    //
    public function view(){
        $sql = "SELECT * FROM tbl_anak";
        return $this->db->query($sql);
    }

    public function  view_by_nis()
    {
        $sql = "SELECT *
					FROM tbl_anak
					WHERE nis ='".$this->get_nis()."'";
        return $this->db->query($sql);
    }

    public function insert(){
        $sql="insert into tbl_anak
					(nis, kode_jadwal, id_ortu, nama, tgllahir, jeniskelamin, anak_ke, jml_saudara)
					values
					('".$this->get_nis()."','".$this->get_kode_jadwal()."','".$this->get_id_ortu()."','".$this->get_nama()."','".$this->get_tgllahir()."','".$this->get_jeniskelamin()."',
					'".$this->get_anak_ke()."','".$this->get_jml_saudara()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_anak
					set kode_jadwal='".$this->get_kode_jadwal()."', id_ortu='".$this->get_id_ortu()."', nama='".$this->get_nama()."', tgllahir='".$this->get_tgllahir()."', jeniskelamin='".$this->get_jeniskelamin()."',
					    anak_ke='".$this->get_anak_ke()."', jml_saudara='".$this->get_jml_saudara()."'
					where nis='".$this->get_nis()."'";
        $this->db->query($sql);
    }

    public function delete(){
        $sql = "delete from tbl_anak
					where nis='".$this->get_nis()."'";
        $this->db->query($sql);
    }

    public function delete_all(){
        $sql = "truncate tbl_anak ";
        $this->db->query($sql);
    }

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>