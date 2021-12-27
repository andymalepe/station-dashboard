<?php require_once('../config.php'); ?>
<nav class="navbar navbar-light sticky-top bg-light justify-content-center nav-station-logo">
  <a class="navbar-brand navbar-text" href="#">
    <img src="../images/sanap-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    <?php echo STATION; ?> STATION
  </a>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active" id="home">
        <a class="nav-link" href="/home/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active" id="weather">
        <a class="nav-link" href="/forecast/">Weather </a>
      </li>

      <li class="nav-item" id="signout">
        <a class="nav-link" href="/signout/">Station Sign Out </a>
      </li>
      <li class="nav-item" id="admin">
        <a class="nav-link" href="/login/">Admin </a>
      </li>
      <li class="nav-item" id="store">
        <a class="nav-link" href="/shop/">Food Store </a>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <!-- <li class="nav-item">
      <a class="btn btn-outline-success my-2 my-sm-0 page-elements-right-margin" href="/login/">Admin</a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="btn btn-outline-success my-2 my-sm-0" href="/signout/">Station Sign Out</a>
    </li> -->
  </ul>
</nav>
