<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../lib/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">


  </head>
  <body>
    <div class="sidenav">
             <div class="login-main-text">
                <h2><?php require_once('../config.php'); echo STATION; ?> Station<br>Admin Login Page</h2>
                <p>Login to admin dashboard.</p>
             </div>
          </div>
          <div class="main">
             <div class="col-md-6 col-sm-12">
                <div class="login-form">
                   <form id="loginForm">
                      <div class="form-group">
                         <label>Email Address</label>
                         <input type="text" id="loginFormEmailAddress" class="form-control" placeholder="Email Address">
                      </div>
                      <div class="form-group">
                         <label>Password</label>
                         <input type="password" id="loginFormPassword" class="form-control" placeholder="Password">
                      </div>
                      <button id="btnAdminLogin" type="submit" class="btn btn-outline-success">Login</button>
                      <a id="btnAdminLoginancel" class="btn btn-outline-danger" href="/home/">Cancel</a>
                   </form>
                </div>
             </div>
          </div>
          <script>

          </script>
          <script  type="text/javascript" src="../lib/js/jquery-3.5.1.min.js"></script>
          <script  type="text/javascript" src="../lib/js/popper.min.js"></script>
          <script  type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
          <script  type="text/javascript" src="../js/login.js"></script>
  </body>
</html>
<!------ Include the above in your HEAD tag ---------->
