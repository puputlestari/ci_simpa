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

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alldesc">
                <div class="col-md-6 col-sm-6 col-xs-12 centertext">
                    <!--p class="all-td">Profil</p--> </br></br>
                    <h2>Pengajar</h2>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------END PROFIL------------------------------------------------------>

    <!-----------------------------------------MANIPULASI DATA PENGAJAR----------------------------------------------->
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
                    <a href="<?php echo site_url();?>login/logout">
                        <i class="glyphicon glyphicon-log-out"></i> Logout |
                    </a> <?php echo $this->session->userdata('nama'); ?><br><br>
                <?php
                }
                ?>

                <?PHP
                if($this->session->userdata('status') == 'admin')
                {
                ?>

                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_manipulasi_pengajar">
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
            <th>Id Pengajar</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Tingkat Pendidikan</th>
            <th>Modifikasi</th>
        </tr>
        </thead>
        <tbody>

        <?PHP
        $query = $this->manipulasi_pengajar_m->view();

        foreach($query->result() as $row) :
            ?>

            <tr>
                <td>
                    <?PHP echo $row->id_pengajar; ?>
                    <input type="hidden" id="password_<?PHP echo $row->id_pengajar; ?>" value="<?PHP echo $row->password; ?>">
                    <input type="hidden" id="nama_<?PHP echo $row->id_pengajar; ?>" value="<?PHP echo $row->nama; ?>">
                    <input type="hidden" id="jeniskelamin_<?PHP echo $row->id_pengajar; ?>" value="<?PHP echo $row->jeniskelamin; ?>">
                    <input type="hidden" id="tgllahir_<?PHP echo $row->id_pengajar; ?>" value="<?PHP echo $row->tgllahir; ?>">
                    <input type="hidden" id="notelp_<?PHP echo $row->id_pengajar; ?>" value="<?PHP echo $row->notelp; ?>">
                    <input type="hidden" id="alamat_<?PHP echo $row->id_pengajar; ?>" value="<?PHP echo $row->alamat; ?>">
                    <input type="hidden" id="tingkat_pendidikan_<?PHP echo $row->id_pengajar; ?>" value="<?PHP echo $row->tingkat_pendidikan; ?>">
                </td>
                <td><?PHP echo $row->password; ?></td>
                <td><?PHP echo $row->nama; ?></td>
                <td><?PHP echo $row->jeniskelamin; ?></td>
                <td><?PHP echo $row->tgllahir; ?></td>
                <td><?PHP echo $row->notelp; ?></td>
                <td><?PHP echo $row->alamat; ?></td>
                <td><?PHP echo $row->tingkat_pendidikan; ?></td>
                <td>

                    <?PHP
                    if($this->session->userdata('status') == 'admin')
                    {
                    ?>

                    <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_manipulasi_pengajar" id="ubah_<?php echo $row->id_pengajar; ?>">
                        <i class="glyphicon glyphicon-edit"></i> Ubah
                    </button>
                    <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_pengajar; ?>">
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

<div class="modal fade" id="modal_manipulasi_pengajar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Form Pengajar</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_manipulasi_pengajar">
                    <div class="form-group">
                        <label>Id Pengajar</label>
                        <input type="text" class="form-control" name="id_pengajar" id="id_pengajar" placeholder="Id Pengajar" required>
                        <input type="hidden" name="id_pengajar_tmp" id="id_pengajar_tmp">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin" placeholder="P/L" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgllahir" id="tgllahir" placeholder="YY-MM-DD" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Tingkat Pendidikan</label>
                        <input type="text" class="form-control" name="tingkat_pendidikan" id="tingkat_pendidikan" placeholder="Tingkat Pendidikan" required>
                    </div>
                            <?PHP
                            $query = $this->manipulasi_pengajar_m->view();

                            foreach($query->result() as $row) :
                                ?>

                            <?php
                            endforeach;
                            ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_pengajar" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_pengajar" id="update">
                    Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Batal
                </button>
            </div>
    </div>
</div>

</div>
<!------------------------------------------END MANIPULASI DATA PENGAJAR------------------------------------------------>

<?php
$this->load->view('footer_v');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add').click(function() {
            $('#save').show();
            $('#update').hide();
            $('#id_pengajar').val('');
            $('#id_pengajar').attr('disabled', false);
            //$('#username').val('');
            $('#password').val('');
            $('#nama').val('');
            $('#jeniskelamin').val('');
            $('#tgllahir').val('');
            $('#notelp').val('');
            $('#alamat').val('');
            $('#tingkat_pendidikan').val('');
            $('#form_manipulasi_pengajar').attr('action','<?PHP echo site_url(); ?>manipulasi_pengajar/save');
        });

        $('.edit').click(function() {
            var id = this.id.substr(5);

            $('#save').hide();
            $('#update').show();
            var id = this.id.substr(5);
            $('#id_pengajar').val(id);
            $('#id_pengajar_tmp').val(id);
            $('#id_pengajar').attr('disabled',true);
            //$('#username').val($('#username_' + id).val());
            $('#password').val($('#password_' + id).val());
            $('#nama').val($('#nama_' + id).val());
            $('#jeniskelamin').val($('#jeniskelamin_' + id).val());
            $('#tgllahir').val($('#tgllahir_' + id).val());
            $('#notelp').val($('#notelp_' + id).val());
            $('#alamat').val($('#alamat_' + id).val());
            $('#tingkat_pendidikan').val($('#tingkat_pendidikan_' + id).val());
            $('#form_manipulasi_pengajar').attr('action','<?PHP echo site_url(); ?>manipulasi_pengajar/update');
        });

        $('.delete').click(function(){
            $('#delete_all').hide();
            $('#delete').show();
            var id = this.id.substr(7);
            $('#id_pengajar').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });

        $('.delete_all').click(function(){
            $('#delete_all').show();
            $('#delete').hide();
            $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
        });

        $('#delete').click(function(){
            window.location='<?php echo site_url();?>manipulasi_pengajar/delete/'+$('#id_pengajar').val();
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>manipulasi_pengajar/delete_all';
        });
        $('.table').dataTable();
    });
</script>