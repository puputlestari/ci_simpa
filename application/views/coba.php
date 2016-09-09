<form method="post" id="form_manipulasi_admin" style="text-align:left;">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="" required>
    </div>
    <div class="form-group">
        <label>Password Lama</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="" required>
    </div>
    <div class="form-group">
        <label>Password Baru</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="" required>
    </div>
    <!--?PHP
    $query = $this->load->manipulasi_admin_m->id_admin();

    foreach($query->result() as $row) :
       ?>
            <option value="<!--?PHP echo $row->id_admin; ?>"><!--?PHP echo $row->nama; ?></option>
            <!--?PHP
    endforeach;
    ?>-->

</form>