<?php
    $this->load->view('header_v');
?>



    <div class="container2">
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

            	<a href="<?PHP echo site_url(); ?>data_pesan">
                Pesan Terkirim</a>||
               	<a href="<?PHP echo site_url(); ?>data_kpesan">
                Kotak Masuk</a>





           </div>


<?php
 if ($this->session->userdata('status')==1) {
     ?>

     <table class="table table-responsive" id="table">
         <thead>
         <tr>
             <th>Tanggal</th>
             <th>Dari</th>
             <th>judul</th>
             <th>isi</th>


         </tr>
         </thead>
         <tbody>

         <?PHP
         $query = $this->data_kpesan_m->view_admin();

         foreach ($query->result() as $row) :
             ?>

             <tr>
                 <td><?PHP echo $row->tgl_pesan; ?></td>

                 <input type="hidden" id="judul_<?PHP echo $row->id_pesan; ?>" value="<?PHP echo $row->judul; ?>">
                 <input type="hidden" id="isi_<?PHP echo $row->id_pesan; ?>" value="<?PHP echo $row->isi; ?>">
                 <input type="hidden" id="penerima_<?PHP echo $row->id_pesan; ?>" value="<?PHP echo $row->penerima; ?>">
                 <td><?PHP echo $row->username; ?></td>
                 <td><?PHP echo $row->judul; ?></td>
                 <td><?PHP echo $row->isi; ?></td>


                 <td>
                     <button class="btn btn-warning btn-sm edit" title="Lihat" data-toggle="modal"
                             data-target="#modal_data_pesan" id="edit_<?PHP echo $row->id_pesan; ?>">
                         <i class="glyphicon glyphicon-edit"></i> Lihat
                     </button>
                     <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal"
                             data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_pesan; ?>">
                         <i class="glyphicon glyphicon-trash"></i> Hapus
                     </button>


                 </td>


             </tr>

         <?PHP
         endforeach;
         ?>

         </tbody>

     </table>



            <!--    <div class="panel-heading">
                  <div class="pull-left">
                      <h3 class="panel-title">Pesan</h3>
                  </div>
                  <div class="pull-right">
                      <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_data_pesan">
                          <i class="glyphicon glyphicon-plus"></i> Tambah
                      </button>


                    <button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_konfirmasi">
                          <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                      </button>
                      <!--
                      <button class="btn btn-primary btn-sm excel" title="export to excel" >
                          <i class="glyphicon glyphicon-export"></i> Eksport to excel
                      </button>
                      <button class="btn btn-primary btn-sm pdf" title="export to pdf" >
                          <i class="glyphicon glyphicon-export"></i> Eksport to pdf
                      </button>

                      <button class="btn btn-primary btn-sm add" title="Export" data-toggle="modal" data-target="#modal_export">
                          <i class="glyphicon glyphicon-export"></i> Export
                      </button>
                      <button class="btn btn-primary btn-sm chart" title="Report_chart" data-toggle="modal" data-target="#modal_grafik">
                          <i class="glyphicon glyphicon-stats"></i> Grafik
                      </button> -->
            </div>
            <div class="clearfix"></div>
        </div>
      </div>


 <?php
 } if ($this->session->userdata('status')==0) {
     ?>
     <table class="table table-responsive" id="table">
         <thead>
         <tr>
             <th>Tanggal</th>
             <th>Dari</th>
             <th>judul</th>
             <th>isi</th>


         </tr>
         </thead>
         <tbody>

         <?PHP
		
		$this->data_kpesan_m->set_username($this->session->userdata('username'));
         $query = $this->data_kpesan_m->view_pengguna();

         foreach ($query->result() as $row) :
             ?>

             <tr>
                 <td><?PHP echo $row->tgl_pesan; ?></td>

                 <input type="hidden" id="judul_<?PHP echo $row->id_pesan; ?>" value="<?PHP echo $row->judul; ?>">
                 <input type="hidden" id="isi_<?PHP echo $row->id_pesan; ?>" value="<?PHP echo $row->isi; ?>">
                 <input type="hidden" id="penerima_<?PHP echo $row->id_pesan; ?>" value="<?PHP echo $row->penerima; ?>">
                 <td><?PHP echo $row->username; ?></td>
                 <td><?PHP echo $row->judul; ?></td>
                 <td><?PHP echo $row->isi; ?></td>


                 <td>
                     <button class="btn btn-warning btn-sm edit" title="Lihat" data-toggle="modal"
                             data-target="#modal_data_pesan" id="edit_<?PHP echo $row->id_pesan; ?>">
                         <i class="glyphicon glyphicon-edit"></i> Lihat
                     </button>
                     <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal"
                             data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_pesan; ?>">
                         <i class="glyphicon glyphicon-trash"></i> Hapus
                     </button>


                 </td>


             </tr>

         <?PHP
         endforeach;
         ?>

         </tbody>

     </table>
 <?php
 }
?>
        </div>
   
<div class="modal fade" id="modal_data_pesan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">pesan</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_data_pesan">


                        <?php
                         if ($this->session->userdata('status')==0){


                        ?>
                    <div class="form-group">
                       <label>Ke</label>
                        <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Admin" disabled="true">

                        </div>


                        <?php
                        }
                        ?>
                    <?php
                    if ($this->session->userdata('status')==1){
                        ?>
                        <div class="form-group">
                            <label>Ke</label>
                            <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Ke" required>

                        </div>

                    <?php
                    }
                    ?>



                    <div class="form-group">

                        <input type="hidden" class="form-control" name="id_pesan" id="id_pesan" placeholder="id_pesan" required>
                        <input type="hidden" name="id_pesan_tmp" id="id_pesan_tmp">
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="judul" required>
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                         <textarea class="form-control" rows="5" id="isi" name="isi" placeholder="Isi Pesan"></textarea>

                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_data_pesan" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_data_pesan" id="update">
                    Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_export">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title" align="center">Export</h4>
            </div>
            <div class="modal-body" align="center">
                <button class="btn btn-primary btn-sm excel" title="Eksport to Excel" >
                    <i class="glyphicon glyphicon-export"></i> Eksport to Excel
                </button>
                <button class="btn btn-primary btn-sm pdf" title="Eksport to PDF" >
                    <i class="glyphicon glyphicon-export"></i> Eksport to PDF
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
<script src="<?PHP echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('.add').click(function()
        {
            $('#save').show();
            $('#update').hide();
            $('#id_pesan').val('');
           $('#id_pesan').attr('disabled',true);
            $('#judul').val('');
            $('#isi').val('');
            $('#penerima').val('');
            $('#username').val('');

            $('#form_data_pesan').attr('action','<?php echo site_url(); ?>data_pesan/save');
        });
        $('.edit').click(function(){
            $('#save').hide();
            $('#update').show();
            var id = this.id.substr(5);
            $('#id_pesan').val(id);
            $('#id_pesan_tmp').val(id);
            $('#judul').val($('#judul_'+ id).val());
             $('#judul').attr('disabled',true);
            $('#penerima').val($('#penerima_'+ id).val());

            $('#isi').val($('#isi_'+ id).val());
             $('#isi').attr('disabled',true);
            $('#form_data_pesan').attr('action','<?php echo site_url(); ?>data_pesan/update');
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
            $('#id_pesan').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });
        $('.excel').click(function(){
            window.location='<?php echo site_url();?>data_pesan/excel';

        });
        $('.pdf').click(function(){
            window.location='<?php echo site_url();?>data_pesan/pdf';

        });
        $('.chart').click(function(){
            window.location='<?php echo site_url();?>data_pesan/chart';

        });
        $('#delete').click(function(){
            window.location='<?php echo site_url();?>data_pesan/delete/'+$('#id_pesan').val();;
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>data_pesan/delete_all';
        });
        $('.table').dataTable();

    });
</script>
