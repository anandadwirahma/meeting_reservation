<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Jadwal Booking
        </span>
      </h1>
      <p class="title-bar-description">
        <a href="<?php echo base_url() ;?>user">247 Meeting Room Reservation
        </a>
      </p>
    </div>
    <div class="layout-content-body">
      <div class="row gutter-xs">
        <div class="col-md-12">
          <div class="card">
            <div class="row">
              <div class="col-xs-12">
                <div class="panel">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                        <thead>
                          <tr>
                            <th>Pemesan</th>
                            <th>Ruang</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Waktu</th>
                            <th>Tanggal Meeting</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($history as $hist) : ?>
                          <tr>
                            <td><?php echo $hist->nama; ?></td>
                            <td><?php echo $hist->ruang; ?></td>
                            <td><?php echo $hist->tgl_psn; ?></td>
                            <td><?php echo $hist->waktu; ?></td>
                            <td><?php echo $hist->tgl_meeting; ?></td>
                            <td>
                              <?php
                              //get class status 
                              $sts = $hist->status;

                              if ($sts == 'Upcoming') {
                                $label = 'label label-info label-pill';
                              } elseif ($sts == 'Canceled') {
                                $label = 'label label-danger label-pill';
                              } elseif ($sts == 'On Progres') {
                                $label = 'label label-warning label-pill';
                              } elseif ($sts == 'Done') {
                                $label = 'label label-success label-pill';
                              } else {
                                $label = 'label label-success label-pill';
                              }
                                
                               ?>
                               <span class="<?php echo $label; ?>"><?php echo $hist->status; ?></span>
                            </td>
                            <td>
                            <?php if ($sts == 'Upcoming') { ?>
                              <a class="btn btn-xs btn-danger" href="<?php echo base_url() . 'user/cancel_booking/' . $hist->id_booking . '/' . $hist->id_det_booking;?>" >Cancel</a>
                              <a class="btn btn-xs btn-primary" href="<?php echo base_url() . 'user/reschedule/0/' . $hist->id_booking . '/' . $hist->id_det_booking;?>">Reschedule</a>
                            <?php } else { ?>
                              <span class="label label-xs label-default">Cancel</span>
                              <span class="label label-xs label-default">Reschedule</span>
                            <?php } ?>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
  <script src="<?php echo base_url() ?>asset/js/vendor.min.js">
  </script>
  <script src="<?php echo base_url() ?>asset/js/elephant.min.js">
  </script>
  <script src="<?php echo base_url() ?>asset/js/application.min.js">
  </script>
  <script src="<?php echo base_url() ?>asset/js/demo.min.js">
  </script>
  <script>
    (function(i,s,o,g,r,a,m){
      i['GoogleAnalyticsObject']=r;
      i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)}
        ,i[r].l=1*new Date();
      a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];
      a.async=1;
      a.src=g;
      m.parentNode.insertBefore(a,m)
    }
    )(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83990101-1', 'auto');
    ga('send', 'pageview');
  </script>
  </body>
<!-- Mirrored from demo.naksoid.com/elephant/flatistic-green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Nov 2016 06:10:08 GMT -->
</html>
