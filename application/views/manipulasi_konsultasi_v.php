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

<!------------------------------------------PROFIL------------------------------------------------>

<div class="container">
    <!--?php
    if($this->uri->segment(3) =='error_save')
    {

        ?-->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alldesc">
                <div class="col-md-6 col-sm-6 col-xs-12 centertext">
                    <!--p class="all-td">Profil</p-->
                    <h2>Konsultasi</h2>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------END PROFIL------------------------------------------------------>

    <!-----------------------------------------MANIPULASI DATA ADMIN----------------------------------------------->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                <h3 class="panel-title"></h3>
            </div>
            <div class="pull-right">
                <?php
                if($this->session->userdata('nama') == "")
                {
                    ?>
                    <li><a href="#" class="page-scroll">Login</a></li>
                <?php
                }
                else
                {
                    ?>
                    <a href="<?php echo site_url(); ?>login/logout">
                        <i class="glyphicon glyphicon-log-out"></i> Logout |
                    </a> <?php echo $this->session->userdata('nama'); ?><br><br>
                <?php
                }
                ?>

                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_manipulasi_konsultasi">
                    <i class="glyphicon glyphicon-plus"></i> Tambah
                </button>
                <button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_konfirmasi">
                    <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                </button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!--?php
    }
    ?-->

    <table class="table table-responsive" id="table">
        <thead>
        <tr>
            <th>Kode Konsultasi</th>
            <th>Id Ortu</th>
            <th>Id Pengajar</th>
            <th>Waktu Input</th>
            <th>Waktu Respon</th>
            <th>Isi Konsultasi</th>
            <th>Respon Konsultasi</th>
            <th>Modifikasi</th>
        </tr>
        </thead>
        <tbody>

        <?PHP
        $query = $this->manipulasi_konsultasi_m->view();

        foreach($query->result() as $row) :
            ?>

            <tr>
                <td>
                    <?PHP echo $row->kode_konsultasi; ?>
                    <input type="hidden" id="id_ortu_<?PHP echo $row->kode_konsultasi; ?>" value="<?PHP echo $row->id_ortu; ?>">
                    <input type="hidden" id="id_pengajar_<?PHP echo $row->kode_konsultasi; ?>" value="<?PHP echo $row->id_pengajar; ?>">
                    <input type="hidden" id="waktu_input_<?PHP echo $row->kode_konsultasi; ?>" value="<?PHP echo $row->waktu_input; ?>">
                    <input type="hidden" id="waktu_respon_<?PHP echo $row->kode_konsultasi; ?>" value="<?PHP echo $row->waktu_respon; ?>">
                    <input type="hidden" id="isi_konsultasi_<?PHP echo $row->kode_konsultasi; ?>" value="<?PHP echo $row->isi_konsultasi; ?>">
                    <input type="hidden" id="respon_konsultasi_<?PHP echo $row->kode_konsultasi; ?>" value="<?PHP echo $row->respon_konsultasi; ?>">
                </td>
                <td><?PHP echo $row->id_ortu; ?></td>
                <td><?PHP echo $row->id_pengajar; ?></td>
                <td><?PHP echo $row->waktu_input; ?></td>
                <td><?PHP echo $row->waktu_respon; ?></td>
                <td><?PHP echo $row->isi_konsultasi; ?></td>
                <td><?PHP echo $row->respon_konsultasi; ?></td>
                <td>

                    <!--?PHP
                    if($this->session->userdata('status') == 1)
                    {
                    ?-->

                    <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_manipulasi_konsultasi" id="ubah_<?php echo $row->kode_konsultasi; ?>">
                        <i class="glyphicon glyphicon-edit"></i> Ubah
                    </button>
                    <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->kode_konsultasi; ?>">
                        <i class="glyphicon glyphicon-trash"></i> Hapus
                    </button>
                </td>
            </tr>

        <?PHP
        endforeach;
        ?>
        </tbody>
    </table>

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

<div class="modal fade" id="modal_manipulasi_konsultasi>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Form Konsultasi</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_manipulasi_konsultasi">
                    <div class="form-group">
                        <label>Kode Konsultasi</label>
                        <input type="text" class="form-control" name="kode_konsultasi" id="kode_konsultasi" placeholder="Kode Konsultasi" required>
                        <input type="hidden" name="kode_konsultasi_tmp" id="kode_konsultasi_tmp">
                    </div>
                    <div class="form-group">
                        <label>Id Ortu</label>
                        <input type="text" class="form-control" name="id_ortu" id="id_ortu" placeholder="Id Ortu" required>
                    </div>
                    <div class="form-group">
                        <label>Id Pengajar</label>
                        <input type="text" class="form-control" name="id_pengajar" id="id_pengajar" placeholder="Id Pengajar" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Input</label>
                        <input type="text" class="form-control" name="waktu_input" id="waktu_input" placeholder="Waktu Input" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Respon</label>
                        <input type="text" class="form-control" name="waktu_respon" id="waktu_respon" placeholder="Waktu Respon" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Konsultasi</label>
                        <input type="text" class="form-control" name="isi_konsultasi" id="isi_konsultasi" placeholder="Isi Konsultasi" required>
                    </div>
                    <div class="form-group">
                        <label>Respon Konsultasi</label>
                        <input type="text" class="form-control" name="respon_konsultasi" id="respon_konsultasi" placeholder="Respon Konsultasi" required>
                    </div>
                            <?PHP
                            $query = $this->manipulasi_konsultasi_m->view();

                            foreach($query->result() as $row) :
                                ?>

                            <?php
                            endforeach;
                            ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_konsultasi" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_konsultasi" id="update">
                    Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Batal
                </button>
            </div>
    </div>
</div>

</div>
<!------------------------------------------END MANIPULASI DATA ADMIN------------------------------------------------>

<?php
$this->load->view('footer_v');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add').click(function() {
            $('#save').show();
            $('#update').hide();
            $('#kode_konsultasi').val('');
            $('#kode_konsultasi').attr('disabled', false);
            $('#id_otu').val('');
            $('#id_pengajar').val('');
            $('#waktu_input').val('');
            $('#waktu_respon').val('');
            $('#isi_konsultasi').val('');
            $('#respon_konsultasi').val('');
            $('#form_manipulasi_konsultasi').attr('action','<?PHP echo site_url(); ?>manipulasi_konsultasi/save');
        });

        $('.edit').click(function() {
            var id = this.id.substr(5);

            $('#save').hide();
            $('#update').show();
            var id = this.id.substr(5);
            $('#kode_konsultasi').val(id);
            $('#kode_konsultasi_tmp').val(id);
            $('#kode_konsultasi').attr('disabled',true);
            $('#id_ortu').val($('#id_ortu_' + id).val());
            $('#id_pengajar').val($('#id_pengajar' + id).val());
            $('#waktu_input').val($('#waktu_input_' + id).val());
            $('#waktu_respon').val($('#waktu_respon_' + id).val());
            $('#isi_konsultasi').val($('#isi_konsultasi_' + id).val());
            $('#respon_konsultasi').val($('#respon_konsultasi_' + id).val());
            $('#form_manipulasi_konsultasi').attr('action','<?PHP echo site_url(); ?>manipulasi_konsultasi/update');
        });

        $('.delete').click(function(){
            $('#delete_all').hide();
            $('#delete').show();
            var id = this.id.substr(7);
            $('#kode_konsultasi').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });

        $('.delete_all').click(function(){
            $('#delete_all').show();
            $('#delete').hide();
            $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
        });

        $('#delete').click(function(){
            window.location='<?php echo site_url();?>manipulasi_konsultasi/delete/'+$('#kode_konsultasi').val();
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>manipulasi_konsultasi/delete_all';
        });
        $('.table').dataTable();
    });
</script>