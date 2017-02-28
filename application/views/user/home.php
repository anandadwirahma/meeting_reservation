<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Dashboard
        </span>
      </h1>
      <p class="title-bar-description">
        <small>Selamat Datang di 
          <a href="<?php echo base_url() ;?>user">247 Meeting Room Reservation
          </a>
        </small>
      </p>
    </div>
    <div class="layout-content-body">
      <div class="row gutter-xs">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Info Ketersediaan Ruangan</h4>
                <?php echo form_open('user');?>
                <div class="col-sm-1 navbar-right">
                  <div class="input-with-icon">
                    <button type="submit" class="btn btn-primary btn-block">
                  <span class="icon icon-search icon-sm icon-fw"></span>
                  </div>
                </div>
                <div class="col-sm-2 navbar-right">
                  <div class="input-with-icon">
                    <input id="tanggal" class="form-control" type="text" name="start_date" required>
                    <span class="icon icon-calendar input-icon"></span>
                  </div>
                </div>    
                <?php echo form_close(); ?>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table border=1 class="table table-middle nowrap">
                  <?php 
                    $start_date = null;
                    if (empty($startdate)){
                      date_default_timezone_set("Asia/Bangkok");
                      $start_date = date('Y-m-d', strtotime('sunday this week', strtotime('last saturday')));
                    }else{
                      $start_date = $startdate;
                    }

                  ?>
                  <thead>
                    <tr>
                    <?php 
                      $tgl = array();
                      $backdate = 0;
                      while ($backdate <= 6) {
                        $tgl[] = date('Y-m-d', strtotime("+$backdate days $startdate"));
                        $backdate++; 
                      }
                    ?>
                      <th>Nama Ruang</th>
                      <th><center>Sunday<br/>(<?php echo $tgl[0]; ?>)</center></th>
                      <th><center>Monday<br/>(<?php echo $tgl[1]; ?>)</center></th>
                      <th><center>Tuesday<br/>(<?php echo $tgl[2]; ?>)</center></th>
                      <th><center>Wednesday<br/>(<?php echo $tgl[3]; ?>)</center></th>
                      <th><center>Thursday<br/>(<?php echo $tgl[4]; ?>)</center></th>
                      <th><center>Friday<br/>(<?php echo $tgl[5]; ?>)</center></th>
                      <th><center>Saturday<br/>(<?php echo $tgl[6]; ?>)</center></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ruang as $row) : ?>
                      <tr>
                        <td><?php echo $row->nama_ruang; ?><br>
                            (Lokasi : Lt.<?php echo $row->lokasi; ?> <br>
                            Kapasitas : <?php echo $row->kapasitas; ?> Orang
                            )
                        </td>
                        <td>
                          <?php
                            foreach ($data_booking as $row_booking) {

                              $sts = $row_booking->status;
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

                              if($row->id_ruang == $row_booking->id_ruang && $row_booking->hari == 'sunday'){ ?>       
                                <center><span class="<?php echo $label; ?>"><?php echo "$row_booking->nama ($row_booking->waktu)<br/>($row_booking->status)"; ?></span><br></center>
                              <?php }else{
                                echo "";
                              }
                            }  
                          ?>
                        </td>
                        <td>
                          <?php
                            foreach ($data_booking as $row_booking) {

                              $sts = $row_booking->status;
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

                              if($row->id_ruang == $row_booking->id_ruang && $row_booking->hari == 'monday'){ ?>      
                                <center><span class="<?php echo $label; ?>"><?php echo "$row_booking->nama ($row_booking->waktu)<br/>($row_booking->status)"; ?></span><br></center>
                               <?php }else{
                                echo "";
                              }
                            }  
                          ?>
                        </td>
                        <td>
                          <?php
                            foreach ($data_booking as $row_booking) {

                              $sts = $row_booking->status;
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

                              if($row->id_ruang == $row_booking->id_ruang && $row_booking->hari == 'tuesday'){ ?>     
                                <center><span class="<?php echo $label; ?>"><?php echo "$row_booking->nama ($row_booking->waktu)<br/>($row_booking->status)"; ?></span><br></center>
                             <?php }else{
                                echo "";
                              }
                            }  
                          ?>
                        </td>
                        <td>
                          <?php
                            foreach ($data_booking as $row_booking) {
                              
                              $sts = $row_booking->status;
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

                              if($row->id_ruang == $row_booking->id_ruang && $row_booking->hari == 'wednesday'){ ?> 
                                <center><span class="<?php echo $label; ?>"><?php echo "$row_booking->nama ($row_booking->waktu)<br/>($row_booking->status)"; ?></span><br></center>
                              <?php }else{
                                echo "";
                              }
                            }  
                          ?>
                        </td>
                        <td>
                          <?php
                            foreach ($data_booking as $row_booking) {
                              
                              $sts = $row_booking->status;
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

                              if($row->id_ruang == $row_booking->id_ruang && $row_booking->hari == 'thursday'){ ?>
                                <center><span class="<?php echo $label; ?>"><?php echo "$row_booking->nama ($row_booking->waktu)<br/>($row_booking->status)"; ?></span><br></center> 
                             <?php }else{
                                echo "";
                              }
                            }  
                          ?>
                        </td>
                        <td>
                          <?php
                            foreach ($data_booking as $row_booking) {

                              $sts = $row_booking->status;
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

                              if($row->id_ruang == $row_booking->id_ruang && $row_booking->hari == 'friday'){ ?>       
                                <center><span class="<?php echo $label; ?>"><?php echo "$row_booking->nama ($row_booking->waktu)<br/>($row_booking->status)"; ?></span><br/></center>
                               <?php }else{
                                echo "";
                              }
                            }  
                          ?>
                        </td>
                        <td>
                          <?php
                            foreach ($data_booking as $row_booking) {

                              $sts = $row_booking->status;
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

                              if($row->id_ruang == $row_booking->id_ruang && $row_booking->hari == 'saturday'){ ?>      
                                <center><span class="<?php echo $label; ?>"><?php echo "$row_booking->nama ($row_booking->waktu)<br/>($row_booking->status)"; ?></span><br></center>
                              <?php }else{
                                echo "";
                              }
                            }  
                          ?>
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
  <script src="<?php echo base_url() ?>asset/js/vendor.min.js"></script>
  
  <script src="<?php echo base_url() ?>asset/js/jquery.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
  <script>
    $( function() {
      $( "#tanggal" ).datepicker({
        beforeShowDay: function(date) {
          return [date.getDay() == 0];
      }
      });
    });
  </script>
</body>
<!-- Mirrored from demo.naksoid.com/elephant/flatistic-green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Nov 2016 06:10:08 GMT -->
</html>
