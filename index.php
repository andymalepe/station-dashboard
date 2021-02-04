<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <link rel="stylesheet" href="lib/foundation.min.css">
    <link rel="stylesheet" href="lib/bootstrap.css">
    <!-- <link rel="stylesheet" href="lib/dataTables.bootstrap.css"> -->
    <link rel="stylesheet" href="lib/dataTables.foundation.min.css">
    <link rel="stylesheet" href="lib/select.dataTables.min.css">
    <link rel="stylesheet" href="lib/buttons.dataTables.min.css">
    buttons.dataTables.min.css
    <link rel="stylesheet" href="lib/buttons.foundation.min.css">
    <!-- <link rel="stylesheet" href="lib/bootstrap-select.min.css"> -->
    <link rel="stylesheet" href="css/master.css">
    <meta charset="utf-8">
    <title>SANAE IV</title>
  </head>
  <body>
    <nav class="navbar navbar-light sticky-top bg-light justify-content-center nav-station-logo">
      <a class="navbar-brand navbar-text" href="#">
        <img src="images/s60-logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
        SANAE IV
      </a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Weather</a>
          </li>
        </ul>
      </div>
      <form class="form-inline">
        <button class="btn btn-outline-success my-2 my-sm-0 page-elements-right-margin" type="submit" href="/login/">Admin</button>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Station Sign Out</button>
      </form>
    </nav>

    <div class="container-fluid">
      <div class="row justify-content-md-center row-sign-out-title">
        <div class="col">
        </div>
        <div class="col-md-auto div-sign-out-title">
         Sign Out Page
        </div>
        <div class="col">
        </div>
      </div>
      <div class="row">
        <div class="col">
        </div>
        <div class="col-6">
          <div class="input-group mb-3">
              <div class="input-group-prepend" data-show-subtext="true" data-live-search="true">
                <label class="input-group-text" for="inputGroupSelect01">User</label>
              </div>
              <select class="custom-select page-elements-right-margin" id="sel-sign-out-users" data-show-subtext="true" data-live-search="true">
                <option selected>Choose user</option>
              </select>

            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Area</label>
            </div>
            <select class="custom-select page-elements-right-margin" id="sel-sign-out-areas">
              <option selected>Choose area</option>
            </select>
            <button type="button" class="btn btn-outline-success" id="btn-user-area-sign-out">Sign Out</button>
          </div>
        </div>
        <div class="col">
        </div>
      </div>
      <div class="row">
        <div class="col">
        </div>
        <div class="col-8">
          <table id="tbl-signed-out-user-areas" class="cell-border" style="width:100%">
          </table>
          <div class="col-md-auto">
            <button type="button" class="btn btn-outline-success" id="btn-user-area-sign-in">Sign In</button>
          </div>
        </div>
        <div class="col">
        </div>
      </div>
    </div>


    <!-- libs -->
    <script type="text/javascript" src="lib/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="lib/popper.min.js"></script>
    <!-- <script type="text/javascript" src="lib/foundation.min.js"></script> -->
    <script type="text/javascript" src="lib/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="lib/jquery.dataTables.min.js"></script>


    <!-- <script type="text/javascript" src="lib/dataTables.bootstrap4.min.js"></script> -->
    <script type="text/javascript" src="lib/dataTables.foundation.min.js"></script>
    <script type="text/javascript" src="lib/dataTables.select.min.js"></script>
    <script type="text/javascript" src="lib/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="lib/buttons.foundation.min.js"></script>
    <!-- <script type="text/javascript" src="lib/bootstrap-select.min.js"></script> -->
    <script type="text/javascript" src="js/signout.js"></script>
  </body>
</html>
