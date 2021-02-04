
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../lib/bootstrap.min.css" crossorigin="anonymous">
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
                   <form>
                      <div class="form-group">
                         <label>User Name</label>
                         <input type="text" class="form-control" placeholder="User Name">
                      </div>
                      <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-outline-success">Login</button>
                   </form>
                </div>
             </div>
          </div>
          <script>

          </script>
          <script  type="text/javascript" src="../lib/jquery-3.5.1.min.js"></script>
          <script  type="text/javascript" src="../lib/popper.min.js"></script>
          <script  type="text/javascript" src="../lib/bootstrap.min.js"></script>

  </body>
</html>
<!------ Include the above in your HEAD tag ---------->
