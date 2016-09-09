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
error_reporting(E_ALL ^ (E_NOTICE |E_WARNING))
?>

<!------------------------------------------PROFIL------------------------------------------------>
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

<div class="container">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alldesc">
                <div class="col-md-6 col-sm-6 col-xs-12 centertext">
                    <p class="all-td">Profil</p>
                    <h2>Admin</h2>
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
                    </a>
                    <?php echo $this->session->userdata('nama'); ?><br><br>
                <?php
                }
                ?>

                <?PHP
                if($this->session->userdata('status') == 'admin')
                {
                ?>

                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_manipulasi_admin">
                    <i class="glyphicon glyphicon-plus"></i> Tambah
                </button>
                <button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_konfirmasi">
                    <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                </button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

                <?php
                }
                ?>


    <table class="table table-responsive" id="table">
        <thead>
        <tr>
            <th>Id Admin</th>
            <th>Nama</th>
            <!--th>Username</th-->
            <th>Modifikasi</th>
        </tr>
        </thead>
        <tbody>

        <?PHP
        $query = $this->manipulasi_admin_m->view();

        foreach($query->result() as $row) :
            ?>

            <tr>
                <td>
                    <?PHP echo $row->id_admin; ?>
                    <input type="hidden" id="nama_<?PHP echo $row->id_admin; ?>" value="<?PHP echo $row->nama; ?>">
                    <!--input type="hidden" id="username_<?PHP echo $row->id_admin; ?>" value="<?PHP echo $row->username; ?>"-->
                </td>

                <td><?PHP echo $row->nama; ?></td>
                <!--td><?PHP echo $row->username; ?></td-->

            <?PHP
            if($this->session->userdata('status') == 'admin')
            {
            ?>
                <td>
                    <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_manipulasi_admin" id="ubah_<?php echo $row->id_admin; ?>">
                        <i class="glyphicon glyphicon-edit"></i> Ubah
                    </button>
                    <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_admin; ?>">
                        <i class="glyphicon glyphicon-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            <?php
               }
            ?>

        <?PHP
        endforeach;
        ?>
        </tbody>
    </table>

<div class="modal fade" id="modal_manipulasi_admin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Form Admin</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_manipulasi_admin">
                    <div class="form-group">
                        <label id="label_id">Id Admin</label>
                        <input type="text" class="form-control" name="id_admin" id="id_admin" placeholder="Id Admin" required>
                        <input type="hidden" name="id_admin_tmp" id="id_admin_tmp">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <!--div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div-->
                            <?PHP
                            $query = $this->manipulasi_admin_m->view();

                            foreach($query->result() as $row) :
                                ?>

                            <?php
                            endforeach;
                            ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_admin" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_admin" id="update">
                    Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Batal
                </button>
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
            $('#label_id').hide();
            $('#id_admin').val('');
            //$('#id_admin').attr('disabled', false);
            $('#nama').val('');
            $('#nama').attr('disabled', false);
            //$('#username').val('');
            $('#password').val('');
            $('#form_manipulasi_admin').attr('action','<?PHP echo site_url(); ?>manipulasi_admin/save');
        });

        $('.edit').click(function() {
            var id = this.id.substr(5);

            $('#save').hide();
            $('#update').show();
            $('#id_admin').hide();
            $('#label_id').hide();
            //var id = this.id.substr(5);
            $('#id_admin').val(id);
            $('#id_admin_tmp').val(id);
            $('#id_admin').attr('disabled',true);
            $('#nama').val($('#nama_' + id).val());
            //$('#username').val($('#username_' + id).val());
            $('#password').val($('#password_' + id).val());
            $('#form_manipulasi_admin').attr('action','<?PHP echo site_url(); ?>manipulasi_admin/update');
        });

        $('.delete').click(function(){
            $('#delete_all').hide();
            $('#delete').show();
            var id = this.id.substr(7);
            $('#id_admin').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });

        $('.delete_all').click(function(){
            $('#delete_all').show();
            $('#delete').hide();
            $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
        });

        $('#delete').click(function(){
            window.location='<?php echo site_url();?>manipulasi_admin/delete/'+$('#id_admin').val();
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>manipulasi_admin/delete_all';
        });
        $('.table').dataTable();
    });
</script>