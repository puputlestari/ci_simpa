<?PHP
$this->load->view('headerpengajar_v');
?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css"/>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <div class="container">
        <h2>Form Perkembangan Anak</h2>
        <form class="form-horizontal" role="form" action="<?PHP echo site_url(); ?>penilaian_anak/save" method="post">
            <?php foreach($asd as $data){?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nis">NIS:</label>
                <div class="col-sm-10">
                    <input type="text"class="form-control" name="nis" id="nis" value="<?php echo $this->uri->segment(3);?>">
                </div>
            </div>
            <?php
            }
            ?>

            <?PHP

            $this->manipulasi_pengajar_m->set_id_pengajar($this->session->userdata('id'));
            $query = $this->manipulasi_pengajar_m->view_by_id_pengajar();

            foreach($query->result() as $row) :
            ?>
            <!--?php foreach($sss as $data){?-->
            <div class="form-group">
                <label class="control-label col-sm-2" for="id_pengajar">Id Pengajar:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_pengajar" id="id_pengajar" value="<?php echo $row->id_pengajar; ?>">
                </div>
            </div>
            <!--?php
            }
            ?-->
            <?PHP
            endforeach;
            ?>

            <div class="form-group">
                <label class="control-label col-sm-2" for="kode_mapel">Kode Mapel :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" placeholder="Kode Mapel">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nilai">Nilai:</label>
                <div class="col-sm-10">
                    <select name="nilai" id="nilai" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="keterangan">Keterangan:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                </div>
            </div>

            <br /><br />
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </div>
        </form>



    </div>

<?PHP
$this->load->view('footer_v');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add').click(function() {
            $('#save').show();
            $('#update').hide();
            //$('#kode_perkembangan').val('');
            //$('#kode_perkembangan').attr('disabled', false);
            $('#id_pengajar').val('');
            $('#nis').val('');
            $('#kode_mapel').val('');
            $('#nilai').val('');
            $('#keterangan').val('');
            $('#form-horizontal').attr('action','<?PHP echo site_url(); ?>penilaian_anak/save');
        });
</script>