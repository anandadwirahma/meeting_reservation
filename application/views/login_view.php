<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.naksoid.com/elephant/flatistic-green/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Nov 2016 06:12:22 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>247 Meeting Room Reservation</title>
<link rel="manifest" href="manifest.json">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="#27ae60">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/vendor.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/elephant.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/login-2.min.css">
</head>
<body>
<div class="login">
	<div class="login-body">
		<a class="login-brand" href="index.html"><img class="img-responsive" src="asset/img/solusi247.png" alt="Elephant"></a>
		<center>
		<h3 class="login-heading">Sign in</h3>
		</center>
		<div class="login-form">
			<?php echo form_open('login');?>
			<form data-toggle="validator">
				<div class="form-group">
					<label for="username">Username</label>
					<input id="username" class="form-control" type="input" name="username" data-msg-required="Please enter your username." required></div>
				<div class="form-group">
					<label for="password">Password</label>
					<input id="password" class="form-control" type="password" name="password" data-msg-required="Please enter your password." required></div>
				<!--<div class="form-group">
              <label class="custom-control custom-control-primary custom-checkbox">
                <input class="custom-control-input" type="checkbox" checked="checked">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-label">Keep me signed in</span>
              </label>
              <span aria-hidden="true">·</span>
              <a href="password-2.html">Forgot password?</a>
            </div>-->
				<button class="btn btn-primary btn-block" type="submit">Sign in</button>
			</form>
		</div>
	</div>
	<div class="login-footer">
		 Don't have an account? <a href="<?php echo base_url() ;?>daftar">Sign Up</a>
	</div>
</div>
<script src="asset/js/vendor.min.js"></script>
<script src="asset/js/elephant.min.js"></script>
<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
</body>
</html>