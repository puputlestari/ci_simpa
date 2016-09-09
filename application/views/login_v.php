<?php
//if($this->session->userdata('id')){
    $this->load->view('header_v');
    ?>

    <div id="content">
				<div class="col_43">
				<!--img src="<?php echo site_url();?>assets/images/head.png" width="990px" height="3px" /-->
				<br />
				<br />
                <br />
                    <div class="col col_col212" style="margin-left:300px; margin-right:300px; padding-bottom:20px;
                        padding-left:30px; background-color:#e7e7e7; text-align:justify; height:320px;">
					<br />
                        <h3>Login</h3>
					<br />
					<form method="post" action="<?php echo base_url()?>login/sign_in" id="form_login">
					ID<br />
					<input type="text" maxlength="60" size="80px" name="id"/><br /><br />
					Password<br />
					<input type="password" maxlength="60" size="80px" name="password"/><br /><br />
					<br />
					<br />
					<div class="col_right">
						<button type="submit" class="btn btn-or">Login</button>
					</form>
					</div>
				</div>
				<div class="clear"></div>
    </div>
    <div class="clear"></div>
<?php
    $this->load->view('footer_v');
//}
//else{
    //redirect(base_url());
//}
?>