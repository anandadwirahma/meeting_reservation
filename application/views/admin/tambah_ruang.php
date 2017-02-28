<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Tambah Ruang</span>
      </h1>
      <p class="title-bar-description">
        <a href="widgets.html">247 Meeting Room Reservation</a>
      </p>
    </div>
    <div class="layout-content-body">
      <div class="row gutter-xs">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Form Tambah Ruang
              </h4>
            </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="demo-form-wrapper">
                  <?php
                  $atributes = array('class' => 'form form-horizontal', 'id' => 'demo-inputmask');
                  echo form_open('admin/tambah_ruang',$atributes);
                  ?>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-3">Nama Ruangan</label>
                          <div class="col-sm-6">
                            <input id="form-control-3" class="form-control" type="input" name="nama_ruangan" placeholder="Nama Ruangan" required>
                          <span class="help-block">Input Nama Ruangan.</span>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-3">Lokasi</label>
                          <div class="col-sm-6">
                            <input id="form-control-3" class="form-control" type="number" name="lokasi" placeholder="Lokasi Ruangan" required>
                          <span class="help-block">Input Lokasi Ruangan.</span>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-3">Kapasitas</label>
                          <div class="col-sm-6">
                            <input id="form-control-3" class="form-control" type="number" name="kapasitas" placeholder="Kapasitas Ruangan" required>
                          <span class="help-block">Input Kapasitas Ruangan.</span>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary btn-block">Add Room</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="layout-footer">
    <div class="layout-footer-body">
      <small class="copyright">2016 &copy; By 
        <a href="#">Rendy Prakosa
        </a>
      </small>
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