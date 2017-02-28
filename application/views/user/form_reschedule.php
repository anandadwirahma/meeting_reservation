<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Booking Ruang</span>
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
              <h4 class="card-title">Form Booking Ruang
              </h4>
            </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="demo-form-wrapper">
                  <?php 
                  $atributes = array('class' => 'form form-horizontal', 'id' => 'demo-inputmask');
                  echo form_open('user/reschedule_exc', $atributes);
                  ?>
                  <input class="form-control" type="hidden" value="<?php echo $prs_frm['id_booking']; ?>" name="id_booking">
                  <input class="form-control" type="hidden" value="<?php echo $prs_frm['id_det_booking']; ?>" name="id_det_booking">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Tanggal</label>
                          <div class="col-sm-6">
                            <div class="input-with-icon">
                              <input class="form-control" type="text" value="<?php echo $prs_frm['tgl'];?>" name="tanggal" readonly="" required>
                                <span class="icon icon-calendar input-icon"></span>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Jam</label>
                          <div class="col-sm-3">
                            <div class="input-with-icon">
                              <input id="form-control-2" class="form-control" value="<?php echo $prs_frm['start_time'];?>" name="start_time" readonly="" type="text" data-inputmask="'alias': 'hh:mm'" required>
                              <span class="help-block">Input start time (hh:mm).</span>
                            </div>
                          </div>
                         <div class="col-sm-3">
                            <div class="input-with-icon">
                              <input id="form-control-2" class="form-control" value="<?php echo $prs_frm['end_time'];?>" name="end_time" readonly="" type="text" data-inputmask="'alias': 'hh:mm'" required>
                              <span class="help-block">Input end time (hh:mm).</span>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Email</label>
                         <div class="col-sm-6">
                          <select id="demo-select2-2" name="email[]" class="form-control" multiple="multiple" required>
                          <?php foreach ($email_selected as $mail_selected): ?>
                            <option value="<?php echo $mail_selected->id_karyawan ?>" selected="selected" ><?php echo $mail_selected->email ?></option>
                          <?php 
                              endforeach;
                            foreach ($email_unselected as $mail_unselected): ?>
                            <option value="<?php echo $mail_unselected->id_karyawan ?>"><?php echo $mail_unselected->email ?></option>
                          <?php endforeach; ?>
                          </select>
                          <span class="help-block">Input participant.</span>
                        </div>  
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Ruangan</label>
                         <div class="col-sm-6">
                          <select class="md-form-control" name="ruang" required>
                          <?php foreach ($ruang as $room) : ?>
                            <option value="<?php echo $room->id_ruang ?>"><?php echo $room->nama_ruang ?></option>
                          <?php endforeach; ?>
                          </select>
                          <span class="help-block">Input room.</span>
                         </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-3">Topik</label>
                          <div class="col-sm-6">
                          <?php foreach ($topik as $tpk): ?>
                            <input id="form-control-3" class="form-control" type="input" name="topik" value="<?php echo $tpk->topik ?>" placeholder="Topik Meeting" required>
                          <?php endforeach;?>
                          <span class="help-block">Input Topik.</span>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary btn-block">Book</button>
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
