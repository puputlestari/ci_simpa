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
                    <p class="all-td">Laporan</p>
                    <h2>Perkembangan Anak</h2>
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
                if($this->session->userdata('status') == 'pengajar')
                {
                ?>

                <!--button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_manipulasi_perkembangan_anak">
                    <i class="glyphicon glyphicon-plus"></i> Tambah
                </button-->
                <button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_konfirmasi">
                    <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                </button>
                <button class="btn btn-primary btn-sm add" title="Export" data-toggle="modal" data-target="#modal_export">
                    <i class="glyphicon glyphicon-export"></i> Export
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
            <th>Kode Perkembangan</th>
            <th>Id Pengajar</th>
            <th>NIS</th>
            <th>Kode Mapel</th>
            <th>Nilai</th>
            <th>Keterangan</th>

            <?PHP
            if($this->session->userdata('status') == 'pengajar')
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
        $query = $this->manipulasi_perkembangan_anak_m->view();

        foreach($query->result() as $row) :
            ?>

            <tr>
                <td>
                    <?PHP echo $row->kode_perkembangan; ?>
                    <input type="hidden" id="id_pengajar_<?PHP echo $row->kode_perkembangan; ?>" value="<?PHP echo $row->id_pengajar; ?>">
                    <input type="hidden" id="nis_<?PHP echo $row->kode_perkembangan; ?>" value="<?PHP echo $row->nis; ?>">
                    <input type="hidden" id="kode_mapel_<?PHP echo $row->kode_perkembangan; ?>" value="<?PHP echo $row->kode_mapel; ?>">
                    <input type="hidden" id="nilai_<?PHP echo $row->kode_perkembangan; ?>" value="<?PHP echo $row->nilai; ?>">
                    <input type="hidden" id="keterangan_<?PHP echo $row->kode_perkembangan; ?>" value="<?PHP echo $row->keterangan; ?>">
                </td>
                <td><?PHP echo $row->id_pengajar; ?></td>
                <td><?PHP echo $row->nis; ?></td>
                <td><?PHP echo $row->kode_mapel; ?></td>
                <td><?PHP echo $row->nilai; ?></td>
                <td><?PHP echo $row->keterangan; ?></td>
                <td>

                    <?PHP
                    if($this->session->userdata('status') == 'pengajar')
                    {
                    ?>

                    <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_manipulasi_perkembangan_anak" id="ubah_<?php echo $row->kode_perkembangan; ?>">
                        <i class="glyphicon glyphicon-edit"></i> Ubah
                    </button>
                    <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->kode_perkembangan; ?>">
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

<div class="modal fade" id="modal_manipulasi_perkembangan_anak">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Form Perkembangan Anak</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_manipulasi_perkembangan_anak">
                    <div class="form-group">
                        <label>Kode Perkembangan</label>
                        <input type="text" class="form-control" name="kode_perkembangan" id="kode_perkembangan" placeholder="Kode Perkembangan" required>
                        <input type="hidden" name="kode_perkembangan_tmp" id="kode_perkembangan_tmp">
                    </div>
                    <div class="form-group">
                        <label>Id Pengajar</label>
                        <input type="text" class="form-control" name="id_pengajar" id="id_pengajar" placeholder="Id Pengajar" required>
                    </div>
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Mapel</label>
                        <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" placeholder="Kode Mapel" required>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <!--input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" required-->
                        <select name="nilai" id="nilai" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                    </div>
                            <?PHP
                            $query = $this->manipulasi_perkembangan_anak_m->view();

                            foreach($query->result() as $row) :
                                ?>

                            <?php
                            endforeach;
                            ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_perkembangan_anak" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_perkembangan_anak" id="update">
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
<!------------------------------------------END MANIPULASI DATA ADMIN------------------------------------------------>

<?php
$this->load->view('footer_v');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add').click(function() {
            $('#save').show();
            $('#update').hide();
            $('#kode_perkembangan').val('');
            $('#kode_perkembangan').attr('disabled', false);
            $('#id_pengajar').val('');
            $('#nis').val('');
            $('#kode_mapel').val('');
            $('#nilai').val('');
            $('#keterangan').val('');
            $('#form_manipulasi_perkembangan_anak').attr('action','<?PHP echo site_url(); ?>manipulasi_perkembangan_anak/save');
        });

        $('.edit').click(function() {
            var id = this.id.substr(5);

            $('#save').hide();
            $('#update').show();
            var id = this.id.substr(5);
            $('#kode_perkembangan').val(id);
            $('#kode_perkembangan_tmp').val(id);
            $('#kode_perkembangan').attr('disabled',true);
            $('#id_pengajar').val($('#id_pengajar_' + id).val());
            $('#nis').val($('#nis_' + id).val());
            $('#kode_mapel').val($('#kode_mapel_' + id).val());
            $('#nilai').val($('#nilai_' + id).val());
            $('#keterangan').val($('#keterangan_' + id).val());
            $('#form_manipulasi_perkembangan_anak').attr('action','<?PHP echo site_url(); ?>manipulasi_perkembangan_anak/update');
        });

        $('.delete').click(function(){
            $('#delete_all').hide();
            $('#delete').show();
            var id = this.id.substr(7);
            $('#kode_perkembangan').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });

        $('.delete_all').click(function(){
            $('#delete_all').show();
            $('#delete').hide();
            $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
        });

        $('#delete').click(function(){
            window.location='<?php echo site_url();?>manipulasi_perkembangan_anak/delete/'+$('#kode_perkembangan').val();
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>manipulasi_perkembangan_anak/delete_all';
        });
        $('.table').dataTable();
    });
</script>