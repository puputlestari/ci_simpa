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
                    <h2>Jadwal</h2>
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
        <?PHP
        if($this->session->userdata('status') == 'admin')
        {
        ?>
                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_manipulasi_jadwal">
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
            <th>Kode Jadwal</th>
            <th>Kode Mapel</th>
            <th>Id Pengajar</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Ruang</th>

            <?PHP
            if($this->session->userdata('status') == 'admin')
            {
            ?>
            <th>Modifikasi</th>
            <?php
            }
            ?>

        </tr>
        </thead>
        <tbody>

        <?PHP
        $query = $this->manipulasi_jadwal_m->view();

        foreach($query->result() as $row) :
            ?>

            <tr>
                <td>
                    <?PHP echo $row->kode_jadwal; ?>
                    <input type="hidden" id="kode_mapel_<?PHP echo $row->kode_jadwal; ?>" value="<?PHP echo $row->kode_mapel; ?>">
                    <input type="hidden" id="id_pengajar_<?PHP echo $row->kode_jadwal; ?>" value="<?PHP echo $row->id_pengajar; ?>">
                    <input type="hidden" id="tanggal_<?PHP echo $row->kode_jadwal; ?>" value="<?PHP echo $row->tanggal; ?>">
                    <input type="hidden" id="jam_<?PHP echo $row->kode_jadwal; ?>" value="<?PHP echo $row->jam; ?>">
                    <input type="hidden" id="ruang_<?PHP echo $row->kode_jadwal; ?>" value="<?PHP echo $row->ruang; ?>">
                </td>
                <td><?PHP echo $row->kode_mapel; ?></td>
                <td><?PHP echo $row->id_pengajar; ?></td>
                <td><?PHP echo $row->tanggal; ?></td>
                <td><?PHP echo $row->jam; ?></td>
                <td><?PHP echo $row->ruang; ?></td>
                <td>

                    <?PHP
                    if($this->session->userdata('status') == 'admin')
                    {
                    ?>

                    <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_manipulasi_jadwal" id="ubah_<?php echo $row->kode_jadwal; ?>">
                        <i class="glyphicon glyphicon-edit"></i> Ubah
                    </button>
                    <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->kode_jadwal; ?>">
                        <i class="glyphicon glyphicon-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            <?PHP
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

<div class="modal fade" id="modal_manipulasi_jadwal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Form Jadwal</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_manipulasi_jadwal">
                    <div class="form-group">
                        <label>Kode Jadwal</label>
                        <input type="text" class="form-control" name="kode_jadwal" id="kode_jadwal" placeholder="Kode_Jadwal" required>
                        <input type="hidden" name="kode_jadwal_tmp" id="kode_jadwal_tmp">
                    </div>
                    <div class="form-group">
                        <label>Kode Mapel</label>
                        <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" placeholder="Kode Mapel" required>
                    </div>
                    <div class="form-group">
                        <label>Id Pengajar</label>
                        <input type="text" class="form-control" name="id_pengajar" id="id_pengajar" placeholder="Id Pengajar" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="YY-MM-DD" required>
                    </div>
                    <div class="form-group">
                        <label>Jam</label>
                        <input type="text" class="form-control" name="jam" id="jam" placeholder="Jam" required>
                    </div>
                    <div class="form-group">
                        <label>Ruang</label>
                        <input type="text" class="form-control" name="ruang" id="ruang" placeholder="Ruang" required>
                    </div>

                            <?PHP
                            $query = $this->manipulasi_jadwal_m->view();

                            foreach($query->result() as $row) :
                                ?>

                            <?php
                            endforeach;
                            ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_jadwal" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_jadwal" id="update">
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
            $('#kode_jadwal').val('');
            $('#kode_jadwal').attr('disabled', false);
            $('#kode_mapel').val('');
            $('#id_pengajar').val('');
            $('#tanggal').val('');
            $('#jam').val('');
            $('#ruang').val('');
            $('#form_manipulasi_jadwal').attr('action','<?PHP echo site_url(); ?>manipulasi_jadwal/save');
        });

        $('.edit').click(function() {
            var id = this.id.substr(5);

            $('#save').hide();
            $('#update').show();
            var id = this.id.substr(5);
            $('#kode_jadwal').val(id);
            $('#kode_jadwal_tmp').val(id);
            $('#kode_jadwal').attr('disabled',true);
            $('#kode_mapel').val($('#kode_mapel_' + id).val());
            $('#id_pengajar').val($('#id_pengajar_' + id).val());
            $('#tanggal').val($('#tanggal_' + id).val());
            $('#jam').val($('#jam_' + id).val());
            $('#ruang').val($('#ruang_' + id).val());
            $('#form_manipulasi_jadwal').attr('action','<?PHP echo site_url(); ?>manipulasi_jadwal/update');
        });

        $('.delete').click(function(){
            $('#delete_all').hide();
            $('#delete').show();
            var id = this.id.substr(7);
            $('#kode_jadwal').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });

        $('.delete_all').click(function(){
            $('#delete_all').show();
            $('#delete').hide();
            $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
        });

        $('#delete').click(function(){
            window.location='<?php echo site_url();?>manipulasi_jadwal/delete/'+$('#kode_jadwal').val();
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>manipulasi_jadwal/delete_all';
        });
        $('.table').dataTable();
    });
</script>