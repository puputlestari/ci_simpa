<?php
class Manipulasi_Mapel_M extends CI_Model{
    private $kode_mapel;
    private $nama_mapel;
    private $kegiatan;

    //setter
    public function set_kode_mapel($value){
        $this->kode_mapel = $value;
    }

    public function set_nama_mapel($value){
        $this->nama_mapel = $value;
    }

    public function set_kegiatan($value){
        $this->kegiatan = $value;
    }

    //getter
    public function get_kode_mapel(){
        return $this->kode_mapel;
    }

    public function get_nama_mapel(){
        return $this->nama_mapel;
    }

    public function get_kegiatan(){
        return $this->kegiatan;
    }

    //
    public function view(){
        $sql = "SELECT * FROM tbl_mapel";
        return $this->db->query($sql);
    }

    public function  view_by_kode_mapel()
    {
        $sql = "SELECT *
					FROM tbl_mapel
					WHERE kode_mapel='".$this->get_kode_mapel()."'";
        return $this->db->query($sql);
    }

    public function insert(){
        $sql="insert into tbl_mapel
					(kode_mapel, nama_mapel, kegiatan)
					values
					('".$this->get_kode_mapel()."','".$this->get_nama_mapel()."','".$this->get_kegiatan()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_mapel
					set nama_mapel='".$this->get_nama_mapel()."', kegiatan='".$this->get_kegiatan()."'
					where kode_mapel='".$this->get_kode_mapel()."'";
        $this->db->query($sql);
    }

    public function delete(){
        $sql = "delete from tbl_mapel
					where kode_mapel='".$this->get_kode_mapel()."'";
        $this->db->query($sql);
    }

    public function delete_all(){
        $sql = "truncate tbl_mapel ";
        $this->db->query($sql);
    }

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>