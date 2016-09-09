<?php
class Manipulasi_Jadwal_M extends CI_Model{
    private $kode_jadwal;
    private $kode_mapel;
    private $id_pengajar;
    private $tanggal;
    private $jam;
    private $ruang;

    //setter
    public function set_kode_jadwal($value){
        $this->kode_jadwal = $value;
    }

    public function set_kode_mapel($value){
        $this->kode_mapel = $value;
    }

    public function set_id_pengajar($value){
        $this->id_pengajar = $value;
    }

    public function set_tanggal($value){
        $this->tanggal = $value;
    }

    public function set_jam($value){
        $this->jam = $value;
    }

    public function set_ruang($value){
        $this->ruang = $value;
    }

    //getter
    public function get_kode_jadwal(){
        return $this->kode_jadwal;
    }

    public function get_kode_mapel(){
        return $this->kode_mapel;
    }

    public function get_id_pengajar(){
        return $this->id_pengajar;
    }

    public function get_tanggal(){
        return $this->tanggal;
    }

    public function get_jam(){
        return $this->jam;
    }

    public function get_ruang(){
        return $this->ruang;
    }

    //
    public function view(){
        $sql = "SELECT * FROM tbl_jadwal";
        return $this->db->query($sql);
    }

    public function  view_by_kode_jadwal()
    {
        $sql = "SELECT *
					FROM tbl_jadwal
					WHERE kode_jadwal='".$this->get_kode_jadwal()."'";
        return $this->db->query($sql);
    }

    public function insert(){
        $sql="insert into tbl_jadwal
					(kode_jadwal,kode_mapel,id_pengajar,tanggal,jam,ruang)
					values
					('".$this->get_kode_jadwal()."','".$this->get_kode_mapel()."','".$this->get_id_pengajar()."','".$this->get_tanggal()."','".$this->get_jam()."','".$this->get_ruang()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_jadwal
					set kode_mapel='".$this->get_kode_mapel()."', id_pengajar='".$this->get_id_pengajar()."', tanggal='".$this->get_tanggal()."', jam='".$this->get_jam()."', ruang='".$this->get_ruang()."'
					where kode_jadwal='".$this->get_kode_jadwal()."'";
        $this->db->query($sql);
    }

    public function delete(){
        $sql = "delete from tbl_jadwal
					where kode_jadwal='".$this->get_kode_jadwal()."'";
        $this->db->query($sql);
    }

    public function delete_all(){
        $sql = "truncate tbl_jadwal ";
        $this->db->query($sql);
    }

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>