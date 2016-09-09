<?php
class Penilaian_Anak_M extends CI_Model{
    //private $kode_perkembangan;
    private $id_pengajar;
    private $nis;
    private $kode_mapel;
    private $nilai;
    private $keterangan;

    //setter
    //public function set_kode_perkembangan($value){
        //$this->kode_perkembangan = $value;
    //}





    public function set_id_pengajar($value){
        $this->id_pengajar = $value;
    }

    public function set_nis($value){
        $this->nis = $value;
    }

    public function set_kode_mapel($value){
        $this->kode_mapel = $value;
    }

    public function set_nilai($value){
        $this->nilai = $value;
    }

    public function set_keterangan($value){
        $this->keterangan = $value;
    }

    //getter
    //public function get_kode_perkembangan(){
        //return $this->kode_perkembangan;
    //}

    public function get_id_pengajar(){
        return $this->id_pengajar;
    }

    public function get_nis(){
        return $this->nis;
    }

    public function get_kode_mapel(){
        return $this->kode_mapel;
    }

    public function get_nilai(){
        return $this->nilai;
    }

    public function get_keterangan(){
        return $this->keterangan;
    }

    //
    public function view(){
        $sql = "SELECT * FROM tbl_laporanperkembangan";
        return $this->db->query($sql);
    }

    /*public function kode_perkembangan(){

        $this->load->database('db_simpa');

        $temp = $this->db->get('tbl_laporanperkembangan');

        foreach($temp->result() as $row){
            $idk = $row->kode_perkembangan;
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
    public function view_by_nis()
    {
        $sql = "SELECT *
					FROM tbl_laporanperkembangan
					WHERE nis='".$this->get_nis()."'";
        return $this->db->query($sql);
    }

    public function nilai($asd){
        $this->db->where("nis",$asd);
        //$this->db->limit(0,1);
        $query = $this->db->get("tbl_laporanperkembangan");
        return $query->result();
    }

    public function pengajar($sss){
        $this->db->where("nama",$sss);
        $query = $this->db->get("tbl_laporanperkembangan");
        return $query->result();
    }


    public function insert(){
        $sql="insert into tbl_laporanperkembangan
					( nis, id_pengajar, kode_mapel, nilai, keterangan)
					values
					('".$this->get_nis()."','".$this->get_id_pengajar()."','".$this->get_kode_mapel()."','".$this->get_nilai()."','".$this->get_keterangan()."')";
        $this->db->query($sql);
    }

    public function update(){
        $sql = "update tbl_laporanperkembangan
					set nis='".$this->get_nis()."', id_pengajar='".$this->get_id_pengajar()."', kode_mapel='".$this->get_kode_mapel()."', nilai='".$this->get_nilai()."', keterangan='".$this->get_keterangan()."'
					where kode_perkembangan='".$this->get_kode_perkembangan()."'";
        $this->db->query($sql);
    }

    public function delete(){
        $sql = "delete from tbl_laporanperkembangan
					where kode_perkembangan='".$this->get_kode_perkembangan()."'";
        $this->db->query($sql);
    }

    public function delete_all(){
        $sql = "truncate tbl_laporanperkembangan ";
        $this->db->query($sql);
    }

    public function konten()
    {
        $sql = "SELECT * FROM tbl_konten";
        return $this->db->query($sql);
    }
}
?>