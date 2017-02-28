<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Ubah Password</span>
      </h1>
      <p class="title-bar-description">
        <a href="widgets.html">247 Meeting Room Reservation</a>
      </p>
    </div>
    <div class="row p-y-lg">
    <div class="col-md-8">
      <?php if (!empty($messages)) { ?>
      <div class="demo-form-wrapper">
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span class="icon icon-info-circle icon-lg"></span>
          <small><?php echo $messages; ?></small>
        </div>
        <?php }; ?>
      <div class="col-md-6 col-md-offset-3">
        <?php echo form_open('user/ubah_password');?>    
        <form data-toggle="md-validator" id="demo-inputmask">
          <input class="md-form-control" type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>">
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="password" name="late_pwd" value="12345678" spellcheck="false" minlength="8" required>
              <label class="md-control-label">Password Lama</label>
                <small class="md-help-block">Enter your late password(minlenght : 8).</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="password" name="new_pwd" value="12345678" spellcheck="false" minlength="8" required>
              <label class="md-control-label">Password Baru</label>
                <small class="md-help-block">Enter your new password(minlenght : 8).</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="password" name="confirm_pwd" value="12345678" spellcheck="false" minlength="8" required>
              <label class="md-control-label">Konfirmasi Password</label>
                <small class="md-help-block">Confirm new password(minlenght : 8).</small>
          </div>
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
