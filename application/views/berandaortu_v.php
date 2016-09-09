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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css"/>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

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
                        <h2>Perkembangan Anak</h2>
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


                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <table class="table table-responsive" id="table">
            <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Nama Pengajar</th>
                <th>Nama Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>

            <?PHP

            $this->manipulasi_orangtua_m->set_id_ortu($this->session->userdata('id'));
            $query = $this->manipulasi_orangtua_m->view_by_nilai();

            foreach($query->result() as $row) :
                ?>

                <tr>
                        <!--?PHP echo $row->kode_perkembangan; ?-->
                    <td><?PHP echo $row->a; ?></td>
                    <td><?PHP echo $row->b; ?></td>
                    <td><?PHP echo $row->nama_mapel; ?></td>
                    <td><?PHP echo $row->nilai; ?></td>
                    <td><?PHP echo $row->keterangan; ?></td>
                </tr>

            <?PHP
            endforeach;
            ?>
            </tbody>
        </table>
<?PHP
$this->load->view('footer_v');
?>
