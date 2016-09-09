<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Monitoring Perkembangan Anak</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css"/>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,200,100,300,500,600,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,700italic,900,400italic,300italic' rel='stylesheet' type='text/css'>
    <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>


    <script>
        $(window).load(function(){
            $("#menu").sticky({ topSpacing: 0 });
        });
    </script>

    <!------------------------------------------HEADER------------------------------------------------>
</head>
<body>
<!--div class="container-fluid banner text-center" id="banner">
    <div class="row">
        <div class="col-md-12 line">
            <div class="tablebox">
                <div class="banner-text" id="bannertext">
                    <h1 class="hostyle" id="heads">Day Care</h1>
                    <p class="pstyle">Sistem informasi monitoring perkembangan anak</p>
                    <a href="#features" class="page-scroll arrow"><i class="fa fa-angle-down"></i></a>
                </div>
            </div>
        </div>
    </div>
</div!-->
<div class="navbar menubar" id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle menu-button" data-toggle="collapse" data-target="#myNavbar">
                <span class="glyphicon glyphicon-align-justify"></span>
            </button>
            <a class="navbar-brand logo" href="#">Day Care</a>
        </div>
        <div>
            <nav class="collapse navbar-collapse" id="myNavbar" role="navigation">
                <ul class="nav navbar-nav navbar-right navstyle">
                    <!--li><a href="#banner" class="page-scroll active">Beranda</a></li-->
                    <li><a href="beranda" class="page-scroll">Beranda</a></li>
                    <li><a href="#gallery" class="page-scroll">Galeri</a></li>
                    <!--li><a href="data_konsultasi" class="page-scroll">Konsultasi</a></li-->
                    <?php
                    if($this->session->userdata('username') == "")
                    {
                    ?>
                    <li><a href="<?php echo site_url(); ?>login " class="page-scroll">Login</a></li>
                    <?php
                    } else
                    {
                    ?>
                            <a href="<?php echo site_url(); ?>login/logout">
                                <i class="glyphicon glyphicon-log-out"></i> Logout
                            </a>
                            <?php echo $this->session->userdata('username'); ?><br><br>
                    <?php
                    }
                    ?>

                    <li><a href="#contact" class="page-scroll">Kontak Kami</a></li>

                </ul>
            </nav>
        </div>
    </div>
</div>
</body>
</html>
<!------------------------------------------END HEADER------------------------------------------------>