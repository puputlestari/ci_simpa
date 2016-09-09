<?php
if($this->session->userdata('status') == 'orangtua'){
    $this->load->view('headerorangtua_v');
}
elseif($this->session->userdata('status') == 'pengajar'){
    $this->load->view('headerpengajar_v');
}
else {
    $this->load->view('headeradmin_v');
}
?>

    <div class="container">
        <br><br><br>

        <?php
        if($this->uri->segment(3) =='error_save')
        {

            ?>

            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data gagal disimpan
            </div>
        <?php
        }
        ?>

        <div class="panel panel-default">
           <div class="panel-heading">

            	<a href="<?PHP echo site_url(); ?>data_konsultasi">
                Pesan Terkirim</a>||
               	<a href="<?PHP echo site_url(); ?>data_mkonsultasi">
                Kotak Masuk</a>
           </div>
<?php
 if ($this->session->userdata('status')== 'pengajar') {
     ?>

     <table class="table table-responsive" id="table">
         <thead>
         <tr>
             <th>Id Pengajar</th>
             <th>Waktu Respon</th>
             <th>Respon Konsultasi</th>
         </tr>
         </thead>
         <tbody>

         <?PHP
         $query = $this->data_mkonsultasi_m->view_pengajar();

         foreach ($query->result() as $row) :
             ?>

             <tr>
                 <td><?PHP echo $row->id_pengajar; ?></td>
                        <input type="hidden" id="waktu_respon_<?PHP echo $row->kode_konsultasi; ?>"value="<?PHP echo $row->waktu_respon; ?>">
                        <!--input type="hidden" id="id_pengajar_<?PHP echo $row->kode_konsultasi; ?>"value="<?PHP echo $row->id_pengajar; ?>"-->
                        <input type="hidden" id="respon_konsultasi_<?PHP echo $row->kode_konsultasi; ?>"value="<?PHP echo $row->respon_konsultasi; ?>">

                        <td><?PHP echo $row->waktu_respon; ?></td>
                        <td><?PHP echo $row->id_pengajar; ?></td>
                        <td><?PHP echo $row->respon_konsultasi; ?></td>
                 <td>
                     <button class="btn btn-warning btn-sm edit" title="Balas" data-toggle="modal"
                             data-target="#modal_data_pesan" id="edit_<?PHP echo $row->kode_konsultasi; ?>">
                         <i class="glyphicon glyphicon-edit"></i> Lihat
                     </button>
                     <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal"
                             data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->kode_konsultasi; ?>">
                         <i class="glyphicon glyphicon-trash"></i> Hapus
                     </button>
                 </td>
             </tr>

         <?PHP
         endforeach;
         ?>

         <?PHP
         }
         ?>

         </tbody>

     </table>
   
<div class="modal fade" id="modal_data_konsultasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Form Respon Konsultasi</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_data_konsultasi">
					 <?php if($this->session->userdata('status')== 'pengajar') {
                        ?>
                        <div class="form-group">
                            <label>Id Pengajar</label>
                            <input type="text" class="form-control" value="orangtua" disabled = "disabled" >
                            <input type="hidden" name="orangtua" id="orangtua" value="orangtua" >
                        </div>
					<?php
                    }
                    ?>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="kode_konsultasi" id="kode_konsultasi" placeholder="kode_konsultasi" required>
                        <input type="hidden" name="kode_konsultasi_tmp" id="kode_konsultasi_tmp">
                    </div>
                    <!--div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="judul" required>
                    </div-->
                    <div class="form-group">
                        <label>Respon Konsultasi</label>
                         <textarea class="form-control" rows="5" id="respon_konsultasi" name="respon_konsultasi" placeholder="Respon Konsultasi"></textarea>
                    </div>
                </form>
            </div>
	
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_data_konsultasi" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_data_konsultasi" id="update">
                    Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_konfirmasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p id="confirm_str">Apakah Anda yakin akan menghapus data ?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" id="delete_all">
                    Ok
                </button>
                <button class="btn btn-primary btn-sm" id="delete">
                    Ok
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>


<script src="<?PHP echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
<script src="<?PHP echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?PHP echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('.add').click(function()
        {
            $('#save').show();
            $('#update').hide();
            $('#kode_konsultasi').val('');
			$('#kode_konsultasi').attr('disabled',true);
            //$('#judul').val('');
            $('#respon_konsultasi').val('');
            $('#respon_konsultasi').attr('disabled',false);
            $('#id_pengajar').val('');

            $('#form_data_konsultasi').attr('action','<?php echo site_url(); ?>data_konsultasi/save');
        });
        $('.edit').click(function(){
            $('#save').hide();
            $('#update').show();
            var id = this.id.substr(5);
            $('#kode_konsultasi').val(kode_konsultasi);
            $('#kode_konsultasi').attr('disabled',true);
            $('#kode_konsultasi_tmp').val(kode_konsultasi);
            $('#isi_konsultasi').val($('#isi_konsultasi_'+ kode_konsultasi).val());
            $('#isi_konsultasi').attr('disabled',true);
            $('#id_ortu').val($('#id_ortu_'+ kode_konsultasi).val());
			
            $('#form_data_konsultasi').attr('action','<?php echo site_url(); ?>data_konsultasi/update');
        });
        $('.delete_all').click(function(){
            $('#delete_all').show();
            $('#delete').hide();
            $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
        });
        $('.delete').click(function(){
            $('#delete_all').hide();
            $('#delete').show();
            var id = this.id.substr(7);
            $('#kode_konsultasi').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });
        $('#delete').click(function(){
            window.location='<?php echo site_url();?>data_konsultasi/delete/'+$('#kode_konsultasi').val();;
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>data_konsultasi/delete_all';
        });
        $('.table').dataTable();

    });
</script>
