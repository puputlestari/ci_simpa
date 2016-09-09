<?php
class Manipulasi_Konsultasi_M extends CI_Model{
    private $kode_konsultasi;
    private $id_ortu;
    private $id_pengajar;
    private $waktu_input;
    private $waktu_respon;
    private $isi_konsultasi;
    private $respon_konsultasi;

    //setter
    public function set_kode_konsultasi($value){
        $this->kode_konsultasi = $value;
    }

    public function set_id_ortu($value){
        $this->id_ortu = $value;
    }

    public function set_id_pengajar($value){
        $this->id_pengajar = $value;
    }

    public function set_waktu_input($value){
        $this->waktu_input = $value;
    }

    public function set_waktu_respon($value){
        $this->waktu_respon = $value;
    }

    public function set_isi_konsultasi($value){
        $this->isi_konsultasi = $value;
    }

    public function set_respon_konsultasi($value){
        $this->respon_konsultasi = $value;
    }

    //getter
    public function get_kode_konsultasi(){
        return $this->kode_konsultasi;
    }

    public function get_id_ortu(){
        return $this->id_ortu;
    }

    public function get_id_pengajar(){
        return $this->id_pengajar;
    }

    public function get_waktu_input(){
        return $this->waktu_input;
    }

    public function get_waktu_respon(){
        return $this->waktu_respon;
    }

    public function get_isi_konsultasi(){
        return $this->isi_konsultasi;
    }

    public function get_respon_konsultasi(){
        return $this->respon_konsultasi;
    }

    //
    public function view(){
        $sql = "SELECT * FROM tbl_konsultasi";
        return $this->db->query($sql);
    }

    public function kode_konsultasi(){

        $this->load->database('db_simpa');

        $temp = $this->db->get('tbl_konsultasi');

        foreach($temp->result() as $row){
            $idk = $row->kode_konsultasi;
        }
    }

    public function  view_by_kode_konsultasi()
    {
        $sql = "SELECT *
					FROM tbl_konultasi
					WHERE kode_konsultasi='".$this->get_kode_konsultasi()."'";
        return $this->db->query($sql);
    }

    public function insert(){
        $sql="insert into tbl_konsultasi
					(kode_konsultasi, id_ortu, id_pengajar, waktu_input, waktu_respon, isi_konsultasi, respon_konsultasi)
					values
					('".$this->get_kode_konsultasi()."','".$this->get_id_ortu().",'".$this->get_id_pengajar()."','".$this->get_waktu_input()."','".$this->get_waktu_respon()."','".$this->get_isi_konsultasi()."',,'".$this->get_respon_konsultasi()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_konsultasi
					set id_ortu='".$this->get_id_ortu()."', id_pengajar='".$this->get_id_pengajar()."', waktu_input='".$this->get_waktu_input()."', waktu_respon='".$this->get_waktu_respon()."', isi_konsultasi='".$this->get_isi_konsultasi()."', respon_konsultasi='".$this->get_respon_konsultasi()."'
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

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>