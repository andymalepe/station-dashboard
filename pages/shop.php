<!DOCTYPE html>
<!-- https://icons8.com/icon/set/shopping/office -->
<html lang="en" dir="ltr">
  <head>
    <?php require_once('../includes/header.php'); ?>
    <link rel="stylesheet" href="../css/shop.css">
    <title>Food Store</title>
  </head>
  <body>

    <nav class="navbar navbar-light sticky-top bg-light justify-content-center nav-station-logo">
      <a class="navbar-brand navbar-text" href="#">
        <img src="../images/sanap-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        SANAE IV STATION
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
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Dashboard</a>
          </li> -->

          <li class="nav-item" id="signout">
            <a class="nav-link" href="/signout/">Station Sign Out</a>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" href="/login/">Admin</a>
          </li>
          <li class="nav-item" id="store">
            <a class="nav-link disabled" href="/store/">Food Store</a>
          </li>
          <!-- <li class="nav-item">
            <input class="form-control mr-sm-2" id="fld-search" type="search" placeholder="Search food item" aria-label="Search">
            <button type="button" class="btn btn-outline-success" id="search-store">Search</button>
          </li> -->
        </ul>

        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" id="fld-search" type="search" placeholder="Search" aria-label="Search">
            <button type="button" class="btn btn-outline-success" id="search-store">Search</button>
        </form> -->
      </div>


      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        <li class="nav-item">
          <a class="my-2 my-sm-0 page-elements-right-margin" id="shop-basket">
            <img src="../images/icons8-buying-48.png" width="32" alt="">

          </a>
        </li>
      </ul>
    </nav>


    <div class="container-fluid">
        <div class="row flex-xl-nowrap" style="float: left; padding-top: 1rem !important;">
          <div class="col-12 col-md-3 col-xl-2 bd-sidebar">

            <input class="form-control mr-sm-2" id="fld-search" type="search" placeholder="Search food item" aria-label="Search">
            <!-- <div class="input-group mb-3">
                <div class="input-group-prepend" data-show-subtext="true" data-live-search="true">
                  <label class="input-group-text" for="inputGroupSelect01">Category</label>
                </div>
                <select class="custom-select page-elements-right-margin" id="sel-category-name" data-show-subtext="true" data-live-search="true">
                  <option selected>Choose user</option>
                </select>
            </div> -->
            <!-- <div class="bd-toc-item">
              <a class="bd-toc-link" href="/docs/4.0/getting-started/introduction/">
                Basket
              </a>
            </div>
            <div class="bd-toc-item">
              <a class="bd-toc-link" href="/docs/4.0/layout/overview/">
                Layout
              </a>
            </div> -->
          </div>
        </div>

        <main class="bd-content" role="main">
          <ul class="list-group" id="store-items-list" style="padding-top: 1rem !important;">
            <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
              Example
              <span class="badge badge-primary badge-pill">63</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Beans
              <span class="badge badge-primary badge-pill">78</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Spaghetti
              <span class="badge badge-primary badge-pill">
                <img src="../images/icons8-add-80.png" alt="">
              </span>
              <span class="badge badge-primary badge-pill">78</span>
            </li> -->
          </ul>
        </main>
    </div>

    <!-- Standard Modal -->
    <div class="modal fade" id="store-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="store-modal-body">
            ...

          </div>
          <div class="modal-footer  justify-content-md-center">
            <button type="button" class="btn btn btn-outline-danger" data-dismiss="modal" id="checkout-cancel">Cancel</button>
            <button type="button" class="btn btn btn-outline-success" data-dismiss="modal" id="checkout-items">Checkout</button>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../js/shop.js"></script>

  </body>
</html>
