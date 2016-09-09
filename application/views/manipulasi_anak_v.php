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
                    <h2>Anak</h2>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------END PROFIL------------------------------------------------------>

    <!-----------------------------------------MANIPULASI DATA ANAK----------------------------------------------->
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

                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_manipulasi_anak">
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
            <th>NIS</th>
            <th>Kode Jadwal</th>
            <th>Id Ortu</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Anak-ke</th>
            <th>Jumlah Saudara</th>
            <th>Modifikasi</th>
        </tr>
        </thead>
        <tbody>

        <?PHP
        $query = $this->manipulasi_anak_m->view();

        foreach($query->result() as $row) :
            ?>

            <tr>
                <td>
                    <?PHP echo $row->nis; ?>
                    <input type="hidden" id="kode_jadwal_<?PHP echo $row->nis; ?>" value="<?PHP echo $row->kode_jadwal; ?>">
                    <input type="hidden" id="id_ortu_<?PHP echo $row->nis; ?>" value="<?PHP echo $row->id_ortu; ?>">
                    <input type="hidden" id="nama_<?PHP echo $row->nis; ?>" value="<?PHP echo $row->nama; ?>">
                    <input type="hidden" id="tgllahir_<?PHP echo $row->nis; ?>" value="<?PHP echo $row->tgllahir; ?>">
                    <input type="hidden" id="jeniskelamin_<?PHP echo $row->nis; ?>" value="<?PHP echo $row->jeniskelamin; ?>">
                    <input type="hidden" id="anak_ke_<?PHP echo $row->nis; ?>" value="<?PHP echo $row->anak_ke; ?>">
                    <input type="hidden" id="jml_saudara_<?PHP echo $row->nis; ?>" value="<?PHP echo $row->jml_saudara; ?>">
                </td>

                <td><?PHP echo $row->kode_jadwal; ?></td>
                <td><?PHP echo $row->id_ortu; ?></td>
                <td><?PHP echo $row->nama; ?></td>
                <td><?PHP echo $row->tgllahir; ?></td>
                <td><?PHP echo $row->jeniskelamin; ?></td>
                <td><?PHP echo $row->anak_ke; ?></td>
                <td><?PHP echo $row->jml_saudara; ?></td>
                <td>

                    <?PHP
                    if($this->session->userdata('status') == 'admin')
                    {
                    ?>

                    <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_manipulasi_anak" id="ubah_<?php echo $row->nis; ?>">
                        <i class="glyphicon glyphicon-edit"></i> Ubah
                    </button>
                    <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->nis; ?>">
                        <i class="glyphicon glyphicon-trash"></i> Hapus
                    </button>

                    <?php
                    }
                    ?>

                    <?PHP
                    if($this->session->userdata('status') == 'pengajar')
                    {
                    ?>
                    <a href="penilaian_anak/nilai/<?PHP echo $row->nis; ?>" class="btn btn-success">Penilaian</a>
                    <?php
                    }
                    ?>

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

<div class="modal fade" id="modal_manipulasi_anak">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Form Anak</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_manipulasi_anak">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS" value="<?php echo $data;?>" required>
                        <input type="hidden" name="nis_tmp" id="nis_tmp">
                    </div>
                    <div class="form-group">
                        <label>Kode Jadwal</label>
                        <input type="text" class="form-control" name="kode_jadwal" id="kode_jadwal" placeholder="Kode Jadwal" required>
                    </div>
                    <div class="form-group">
                        <label>Id Ortu</label>
                        <input type="text" class="form-control" name="id_ortu" id="id_ortu" placeholder="Id Ortu" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgllahir" id="tgllahir" placeholder="YY-MM-DD" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin" placeholder="P/L" required>
                    </div>
                    <div class="form-group">
                        <label>Anak-ke</label>
                        <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak-ke" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Saudara</label>
                        <input type="text" class="form-control" name="jml_saudara" id="jml_saudara" placeholder="Jumlah Saudara" required>
                    </div>
                            <?PHP
                            $query = $this->manipulasi_anak_m->view();

                            foreach($query->result() as $row) :
                                ?>

                            <?php
                            endforeach;
                            ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_anak" id="save">
                    Simpan
                </button>
                <button class="btn btn-primary btn-sm" type="submit" form="form_manipulasi_anak" id="update">
                    Perbaharui
                </button>
                <button class="btn btn-default btn-sm" data-dismiss="modal">
                    Batal
                </button>
            </div>
    </div>
</div>

</div>
<!------------------------------------------END MANIPULASI DATA ANAK------------------------------------------------>

<?php
$this->load->view('footer_v');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add').click(function() {
            $('#save').show();
            $('#update').hide();
            $('#nis').val('');
            $('#nis').attr('disabled', false);
            $('#kode_jadwal').val('');
            $('#id_ortu').val('');
            $('#nama').val('');
            $('#tgllahir').val('');
            $('#jeniskelamin').val('');
            $('#anak_ke').val('');
            $('#jml_saudara').val('');
            $('#form_manipulasi_anak').attr('action','<?PHP echo site_url(); ?>manipulasi_anak/save');
        });

        $('.edit').click(function() {
            var id = this.id.substr(5);

            $('#save').hide();
            $('#update').show();
            var id = this.id.substr(5);
            $('#nis').val(id);
            $('#nis_tmp').val(id);
            $('#nis').attr('disabled',true);
            $('#kode_jadwal').val($('#kode_jadwal_' + id).val());
            $('#id_ortu').val($('#id_ortu_' + id).val());
            $('#nama').val($('#nama_' + id).val());
            $('#tgllahir').val($('#tgllahir_' + id).val());
            $('#jeniskelamin').val($('#jeniskelamin_' + id).val());
            $('#anak_ke').val($('#anak_ke_' + id).val());
            $('#jml_saudara').val($('#jml_saudara_' + id).val());
            $('#form_manipulasi_anak').attr('action','<?PHP echo site_url(); ?>manipulasi_anak/update');
        });

        $('.delete').click(function(){
            $('#delete_all').hide();
            $('#delete').show();
            var id = this.id.substr(7);
            $('#nis').val(id);
            $('#confirm_str').html('Apakah anda yakin akan menghapus '+ id +'?');
        });

        $('.delete_all').click(function(){
            $('#delete_all').show();
            $('#delete').hide();
            $('#confirm_str').html('Apakah anda yakin akan menghapus semua data?');
        });

        $('#delete').click(function(){
            window.location='<?php echo site_url();?>manipulasi_anak/delete/'+$('#nis').val();
        });
        $('#delete_all').click(function(){
            window.location='<?php echo site_url();?>manipulasi_anak/delete_all';
        });
        $('.table').dataTable();
    });
</script>