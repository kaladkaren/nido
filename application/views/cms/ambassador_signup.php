<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <!-- <link rel="shortcut icon" href="img/favicon.png"> -->

  <title>Ambassador Sign-up</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('public/admin/') ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('public/admin/') ?>css/bootstrap-reset.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url('public/admin/') ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('public/admin/') ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('public/admin/') ?>css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url('public/admin/') ?>js/html5shiv.js"></script>
  <script src="<?php echo base_url('public/admin/') ?>js/respond.min.js"></script>
  <![endif]-->
  <style media="screen">
  html {
    height: 100%;
  }
  body {
    margin: 0;
    padding: 0;
    height: 100%;
    background-color: #434343;
    background-image:linear-gradient(#434343, #282828);
  }
  #content{
    background-color: transparent;
    background-image:       linear-gradient(0deg, transparent 24%, rgba(255, 255, 255, .05) 25%, rgba(255, 255, 255, .05) 26%, transparent 27%, transparent 74%, rgba(255, 255, 255, .05) 75%, rgba(255, 255, 255, .05) 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, rgba(255, 255, 255, .05) 25%, rgba(255, 255, 255, .05) 26%, transparent 27%, transparent 74%, rgba(255, 255, 255, .05) 75%, rgba(255, 255, 255, .05) 76%, transparent 77%, transparent);
    height:100%;
    background-size:50px 50px;
  }

  .follow-me {
    position:absolute;
    bottom:10px;
    right:10px;
    text-decoration: none;
    color: #FFFFFF;
  }

  .form-signin{
    max-width: 500px !important; margin: 50px auto 0 !important;
  }
  </style>
  <script type="text/javascript">
  const base_url = '<?php echo base_url(); ?>';
  </script>
</head>

<body class="login-body">
  <div class="container">
    <form class="form-signin" method="post" action="<?php echo base_url('cms/login/register') ?>">
      <h2 class="form-signin-heading" style="background: dimgray;">
        <!-- <img src="<?php echo base_url('public/admin/'); ?>img/nido_logo.png" alt="nido-logo" style="max-height:80px; margin: 0 10px;">  -->
        Ambassador Registration
      </h2>
      <div class="login-wrap"> 

        <?php if ($flash_msg = $this->session->flash_msg): ?>
          <p style="color: <?php echo $flash_msg['color'] ?>; text-align: center; font-weight: bold; font-size: 16px;"><?php echo $flash_msg['message'] ?>
            <br><br>
          </p>
        <?php 
          $this->session->unset_userdata('flash_msg');
          endif; 
        ?>
        
        <form role="form" method="post" id="main-form" action="<?php echo base_url('cms/login/register') ?>">
          <div class="form-group">
          <label >First Name</label>
            <input type="text" class="form-control" name="fname" placeholder="First name" required>
          </div>

          <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="lname" placeholder="Last name" required>
          </div>

          <div class="form-group">
            <label >Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>

          <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" name="password" placeholder="New Password" required>
          </div>

          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" placeholder="Confirm New Password" required>
          </div>

          <button class="btn btn-lg btn-success btn-block" type="submit">REGISTER</button>
        </form>

        <br>
        <p style="color: black;"><small>Back to <a href="<?php echo base_url('cms/login')?>" style="color: blue; text-decoration: underline;">login</a> page.</small></p>

      </div>
    </form>
  </div>

  
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('public/admin/') ?>js/jquery.js"></script>
  <script src="<?php echo base_url('public/admin/') ?>js/bootstrap.min.js"></script>
  <!-- <script src="<?php echo base_url('public/admin/js/custom/') ?>login.js"></script> -->

  <script type="text/javascript">
     $('#main-form').on('submit', function (){

      let p = $('input[name=password]').val()
      let cp = $('input[id=confirm_password]').val()

      if (!(p === cp)) {
        alert('Passwords don\'t match')
        return false
      }

    });
  </script>

</body>
</html>
