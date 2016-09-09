<?php
class Manipulasi_Orangtua_M extends CI_Model{
    private $id_ortu;
    private $password;
    private $nama;
    private $jeniskelamin;
    private $tgllahir;
    private $notelp;
    private $email;
    private $alamat;

    //setter
    public function set_id_ortu($value){
        $this->id_ortu = $value;
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

    public function set_email($value){
        $this->email = $value;
    }

    public function set_alamat($value){
        $this->alamat = $value;
    }

    //getter
    public function get_id_ortu(){
        return $this->id_ortu;
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

    public function get_email(){
        return $this->email;
    }

    public function get_alamat(){
        return $this->alamat;
    }

    //
    public function view(){
        $sql = "SELECT * FROM tbl_orangtua";
        return $this->db->query($sql);
    }

    public function view_by_nilai(){
        $sql = "SELECT tbl_anak.nama as a, tbl_pengajar.nama as b, tbl_mapel.nama_mapel, tbl_laporanperkembangan.nilai, tbl_laporanperkembangan.keterangan
                FROM tbl_anak INNER JOIN tbl_laporanperkembangan ON tbl_anak.nis=tbl_laporanperkembangan.nis
                INNER JOIN tbl_pengajar ON tbl_pengajar.id_pengajar=tbl_laporanperkembangan.id_pengajar
                INNER JOIN tbl_mapel ON tbl_mapel.kode_mapel=tbl_laporanperkembangan.kode_mapel
                WHERE tbl_anak.nis=(SELECT nis FROM tbl_anak INNER JOIN tbl_orangtua ON tbl_anak.id_ortu=tbl_orangtua.id_ortu where tbl_orangtua.id_ortu='".$this->get_id_ortu()."')";
        return $this->db->query($sql);
    }

    public function  view_by_id_ortu()
    {
        $sql = "SELECT *
					FROM tbl_orangtua
					WHERE id_ortu='".$this->get_id_ortu()."'";
        return $this->db->query($sql);
    }

    public function insert(){
        $sql="insert into tbl_orangtua
					(id_ortu, password, nama, jeniskelamin, tgllahir, notelp, email, alamat)
					values
					('".$this->get_id_ortu()."','".$this->get_password()."','".$this->get_nama()."','".$this->get_jeniskelamin()."',
					'".$this->get_tgllahir()."','".$this->get_notelp()."','".$this->get_email()."','".$this->get_alamat()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_orangtua
					set password='".$this->get_password()."', nama='".$this->get_nama()."',jeniskelamin='".$this->get_jeniskelamin()."',
					tgllahir='".$this->get_tgllahir()."', notelp='".$this->get_notelp()."',email='".$this->get_email()."',
					alamat='".$this->get_alamat()."'
					where id_ortu='".$this->get_id_ortu()."'";
        $this->db->query($sql);
    }

    public function delete(){
        $sql = "delete from tbl_orangtua
					where id_ortu='".$this->get_id_ortu()."'";
        $this->db->query($sql);
    }

    public function delete_all(){
        $sql = "truncate tbl_orangtua ";
        $this->db->query($sql);
    }

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>