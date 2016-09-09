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
                    <div class="col-md-6 col-sm-6 col-xs-12 centertext"> </br></br>
                        <!--p class="all-td">Profil</p-->
                        <h2>Orang Tua</h2>
                    </div>
                </div>
            </div>
        </div>
    <!------------------------------------------END PROFIL------------------------------------------------>

    <!---------------------------------------MANIPULASI DATA ORANG TUA------------------------------------->
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

            <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_manipulasi_orangtua">
                <i class="glyphicon glyphicon-plus"></i> Tambah
            </button>
            <button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_konfirmasi">
                <i class="glyphicon glyphicon-trash"></i> Hapus Semua
            </button>
            </div>
            <div class="clearfix"></div>

            <?PHP
            }
            ?>

        </div>
    </div>

    <table class="table table-responsive" id="table">
        <thead>
        <tr>
            <th>Id Orang Tua</th>
            <!--th>Username</th-->
            <th>Password</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Alamat</th>

            <?PHP
                if($this->session->userdata('status') == 'admin')
            {
            ?>

            <th>Modifikasi</th>

            <?PHP
            }
            ?>

        </tr>
        </thead>
        <tbody>

        <?PHP
            $query = $this->manipulasi_orangtua_m->view();

            foreach($query->result() as $row) :
         ?>

                <tr>
                <td>
                    <?PHP echo $row->id_ortu; ?>
                    <input type="hidden" id="password_<?PHP echo $row->id_ortu; ?>" value="<?PHP echo $row->password; ?>">
                    <input type="hidden" id="nama_<?PHP echo $row->id_ortu; ?>" value="<?PHP echo $row->nama; ?>">
                    <input type="hidden" id="jeniskelamin_<?PHP echo $row->id_ortu; ?>" value="<?PHP echo $row->jeniskelamin; ?>">
                    <input type="hidden" id="tgllahir_<?PHP echo $row->id_ortu; ?>" value="<?PHP echo $row->tgllahir; ?>">
                    <input type="hidden" id="notelp_<?PHP echo $row->id_ortu; ?>" value="<?PHP echo $row->notelp; ?>">
                    <input type="hidden" id="email_<?PHP echo $row->id_ortu; ?>" value="<?PHP echo $row->email; ?>">
                    <input type="hidden" id="alamat_<?PHP echo $row->id_ortu; ?>" value="<?PHP echo $row->alamat; ?>">
                </td>
                <td><?PHP echo $row->password; ?></td>
                <td><?PHP echo $row->nama; ?></td>
                <td><?PHP echo $row->jeniskelamin; ?></td>
                <td><?PHP echo $row->tgllahir; ?></td>
                <td><?PHP echo $row->notelp; ?></td>
                <td><?PHP echo $row->email; ?></td>
                <td><?PHP echo $row->alamat; ?></td>

                <?PHP
                if($this->session->userdata('status') == 'admin')
                {
                    ?>
                    <td>
                        <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_manipulasi_orangtua" id="edit_<?PHP echo $row->id_ortu; ?>">
                            <i class="glyphicon glyphicon-edit"></i> Ubah
                        </button>
                        <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_ortu; ?>">
                            <i class="glyphicon glyphicon-trash"></i> Hapus
                        </button>
                    </td>

                <?PHP
                }
                ?>

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

        <div class="modal fade" id="modal_manipulasi_orangtua">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">Form Orang Tua</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form_manipulasi_orangtua">
                            <div class="form-group">
                                <label>Id Orang Tua</label>
                                <input type="text" class="form-control" name="id_ortu" id="id_ortu" placeholder="Id Orang Tua" required>
                                <input type="hidden" name="id_ortu_tmp" id="id_ortu_tmp">
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
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                            </div>

                            <?PHP
                            $query = $this->manipulasi_orangtua_m->view();

                            foreach($query->result() as $row) :
                                ?>

                            <?php
                            endforeach;
                            ?>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_orangtua" id="save">
                            Simpan
                        </button>
                        <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_orangtua" id="update">
                            Perbaharui
                        </button>
                        <button class="btn btn-default btn-sm" data-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
</div>


<!------------------------------------------END MANIPULASI DATA ORANG TUA------------------------------------------------>

<?php
$this->load->view('footer_v');
?>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.add').click(function() {
                        $('#save').show();
                        $('#update').hide();
                        $('#id_ortu').val('');
                        $('#id_ortu').attr('disabled', false);
                        $('#password').val('');
                        $('#nama').val('');
                        $('#jeniskelamin').val('');
                        $('#tgllahir').val('');
                        $('#notelp').val('');
                        $('#email').val('');
                        $('#alamat').val('');
                        $('#form_manipulasi_orangtua').attr('action','<?PHP echo site_url(); ?>manipulasi_orangtua/save');
                    });

                    $('.edit').click(function() {
                        var id = this.id.substr(5);

                        $('#save').hide();
                        $('#update').show();
                        var id = this.id.substr(5);
                        $('#id_ortu').val(id);
                        $('#id_ortu_tmp').val(id);
                        $('#id_ortu').attr('disabled',true);
                        $('#password').val($('#password_' + id).val());
                        $('#nama').val($('#nama_' + id).val());
                        $('#jeniskelamin').val($('#jeniskelamin_' + id).val());
                        $('#tgllahir').val($('#tgllahir_' + id).val());
                        $('#notelp').val($('#notelp_' + id).val());
                        $('#email').val($('#email_' + id).val());
                        $('#alamat').val($('#alamat_' + id).val());
                        $('#form_manipulasi_orangtua').attr('action','<?PHP echo site_url(); ?>manipulasi_orangtua/update');
                    });

                    $('.delete').click(function(){
                        $('#delete_all').hide();
                        $('#delete').show();
                        var id = this.id.substr(7);
                        $('#id_ortu').val(id);
                        $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
                    });

                    $('.delete_all').click(function(){
                        $('#delete_all').show();
                        $('#delete').hide();
                        $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
                    });

                    $('#delete').click(function(){
                        window.location='<?php echo site_url();?>manipulasi_orangtua/delete/'+$('#id_ortu').val();
                    });
                    $('#delete_all').click(function(){
                        window.location='<?php echo site_url();?>manipulasi_orangtua/delete_all';
                    });
                    $('.table').dataTable();
                });
            </script>