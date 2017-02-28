<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Data Ruang
        </span>
      </h1>
      <p class="title-bar-description">
        <a href="<?php echo base_url() ;?>admin">247 Meeting Room Reservation
        </a>
      </p>
    </div>
    <div class="layout-content-body">
      <div class="row gutter-xs">
        <div class="col-md-8">
          <?php if (!empty($alert)) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
              </button>
              <span class="icon icon-info-circle icon-lg"></span>
                <small><?php echo $alert ?></small>
            </div>
          <?php } ?>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="col-md-3">
              <br>
              <?php echo form_open('admin/tambah_ruang');?>
              <button type="submit" class="btn btn-primary btn-block">
              <span>
                <span class="icon icon-plus icon-lg icon-fw"></span>
              </span>
              Tambah Ruangan
              </button>
              <?php echo form_close(); ?>
            </div>
           <div class="row">
              <div class="col-xs-12">
                <div class="panel">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                        <thead>
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Lokasi</th>
                            <th>Kapasitas</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($ruang as $r_ruang) : ?>
                          <tr>
                            <td><?php echo $r_ruang->nama_ruang; ?></td>
                            <td><?php echo 'Lantai ' . $r_ruang->lokasi; ?></td>
                            <td><?php echo $r_ruang->kapasitas; ?></td>
                            <td>
                              <a class="btn btn-xs btn-primary" href="<?php echo base_url() . 'admin/edit_ruang/' . $r_ruang->id_ruang;?>" >Edit</a>
                              <a class="btn btn-xs btn-danger" href="<?php echo base_url() . 'admin/delete_ruang/' . $r_ruang->id_ruang;?>" >Delete</a>
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
