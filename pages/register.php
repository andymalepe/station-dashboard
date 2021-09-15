<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="../lib/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/register.css">

  </head>
  <body>
    <div class="sidenav">
             <div class="login-main-text">
                <h2><?php require_once('../config.php'); echo STATION; ?> Station<br>Register Page</h2>
             </div>
          </div>
          <div class="main">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                 <div class="login-form">
                    <form id="login-form">
                       <div class="form-group">
                          <label>First Name</label>
                          <input type="text" id="register-form-first-name" class="form-control" placeholder="First Name">
                       </div>
                       <div class="form-group">
                          <label>Email Address</label>
                          <input type="email" id="register-form-email-address" class="form-control" placeholder="Email Address">
                       </div>
                       <button id="btn-admin-login" type="submit" class="btn btn-outline-success">Login</button>
                       <a id="btn-admin-login-cancel" class="btn btn-outline-danger" href="/home/">Cancel</a>
                    </form>
                 </div>
              </div>
              <div class="col-md-6 col-sm-12">
                 <div class="login-form">
                    <form id="login-form">
                       <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" id="register-form-last-name" class="form-control" placeholder="Last Name">
                       </div>
                       <div class="form-group">
                          <label>Password</label>
                          <input type="password" id="register-form-password" class="form-control" placeholder="Password">
                       </div>
                    </form>
                 </div>
              </div>
            </div>

          </div>
          <script>

          </script>
          <script  type="text/javascript" src="../lib/js/jquery-3.5.1.min.js"></script>
          <script  type="text/javascript" src="../lib/js/popper.min.js"></script>
          <script  type="text/javascript" src="../lib/js/bootstrap.min.js"></script>

  </body>
</html>
<!------ Include the above in your HEAD tag ---------->
