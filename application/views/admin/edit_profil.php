<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Edit Profile</span>
      </h1>
      <p class="title-bar-description">
        <a href="widgets.html">247 Meeting Room Reservation</a>
      </p>
    </div>
    <div class="row p-y-lg">
      <div class="col-md-6 col-md-offset-3">
        <?php echo form_open('admin/edit_profile_exc');?>    
        <form data-toggle="md-validator" id="demo-inputmask">
        <?php foreach ($data as $row) : ?>
          <input class="md-form-control" type="hidden" name="id" value="<?php echo $row->id_karyawan; ?>">
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="text" name="nama" value="<?php echo $row->nama; ?>" spellcheck="false" required>
              <label class="md-control-label">Name</label>
                <small class="md-help-block">Enter your name.</small>
          </div>
           <div class="md-form-group md-label-floating">
            <select class="md-form-control" name="departemen" required>
              <option value="<?php echo $row->id_departemen; ?>" selected="selected"><?php echo $row->departemen; ?></option>
              <?php foreach ($devisi_unselect as $row_dprt) : ?>
                <option value="<?php echo $row_dprt->id_departemen; ?>"><?php echo $row_dprt->departemen; ?></option>
              <?php endforeach; ?>

            </select>
              <label class="md-control-label">Departemen</label>
                <small class="md-help-block">Choose you departement.</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="email" name="email" value="<?php echo $row->email; ?>" spellcheck="false" autocomplete="off" required>
              <label class="md-control-label">Email</label>
                <small class="md-help-block">Enter your email</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="text" name="notelp" value="<?php echo $row->no_telp; ?>" spellcheck="false" data-inputmask="'alias': 'numeric'"   required>
              <label class="md-control-label">No. Telp</label>
                <small class="md-help-block">Enter your phone number.</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="text" name="username" value="<?php echo $row->username; ?>" spellcheck="false" required>
              <label class="md-control-label">Username</label>
                <small class="md-help-block">Enter your username.</small>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <script src="<?php echo base_url() ?>asset/js/vendor.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/elephant.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/application.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/demo.min.js"></script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
  </script>
  </body>
<!-- Mirrored from demo.naksoid.com/elephant/flatistic-green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Nov 2016 06:10:08 GMT -->
</html>
