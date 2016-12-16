<!DOCTYPE html>
<html>
<head>
  <title>Login-admin</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/flat-admin.css">

  <style type="text/css" media="screen">
    .app-form {
      background: #ffffff;
      padding: 20px 50px;
      border-radius: 2px;
    }
  </style>
</head>
<body>
  <br><br><br>
  <div class="app app-default">

  <div class="container">
    <div class="flex-center">
      <div class="app-body">
        <div class="app-form">
          <div class="page-header">
            <!-- <div class="app-brand"><span class="highlight">LOGIN</span> Admin</div> -->
            <h3>Login</h3>
          </div>
          <?php
              if ($this->session->has_userdata('status')) {
                echo "<p class='text text-danger'>" .$this->session->flashdata('status') ."</p>";
              }
          ?>
          <form action="<?php echo base_url('admin/proses_login'); ?>" method="POST">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon2">
              </div>
              <div class="text-right">
                  <input type="submit" class="btn btn-success btn-submit" value="Login">
              </div>
          </form>
          <a href="<?php echo base_url(); ?>" title=""><i class="fa fa-long-arrow-left"></i> <i>Go to site</i></a>
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript" src="../assets/js/vendor.js"></script>
  <script type="text/javascript" src="../assets/js/app.js"></script>

</body>
</html>