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
          </ul>
          <!-- <div class="row row-cols-1 row-cols-md-3 g-4" id="store-items-list-grid">
          </div> -->
        </main>
    </div>

    <!-- Item Modal -->
    <div class="modal fade" id="store-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="store-item-name"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="store-modal-body">
            <input type="number" id="store-item-id" value="" hidden>
            <button type="button" class="btn btn btn-outline-warning" id="add-to-checkout-items" style="margin: 5px; display: flex; float: right;">Add to Basket</button>
            <div class="qty" style="margin: 5px; display: flex; float: right; text-align: center;">
              <span class="minus bg-dark">-</span>
                <input type="number" class="count" id="store-item-qty" name="qty" value="1" style="width: 24px;border: 0px; padding-bottom:6px; margin: 0px 8px;">
              <span class="plus bg-dark">+</span>
            </div>
            <h5 class="display-7" id="store-item-grams"></h5>
            <h5 class="display-7" id="store-item-ml"></h5>
            <h5 class="display-7" id="store-item-stock"></h5>
            <span class="badge badge-primary badge-pill" id="checkout-message"></span>

          </div>
          <div class="modal-footer  justify-content-md-center">
            <button type="button" class="btn btn btn-outline-danger" data-dismiss="modal" id="checkout-cancel">Cancel</button>
            <button type="button" class="btn btn btn-outline-success" data-dismiss="modal" id="checkout-items">Next</button>
          </div>
        </div>
      </div>
    </div>



    <!-- Basket Modal -->
    <div class="modal fade" id="basket-store-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="basket-store-item-name">Basket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="basket-store-modal-body">

            <main class="bd-content" role="main">
              <table class="table" id="basket-store-items-list" style="padding-top: 1rem !important;">
                <tr>
                  <th>Description</th>
                  <th>Quantity</th>
                </tr>
              </table>
            </main>

          </div>
          <div class="modal-footer  justify-content-md-center">
            <button type="button" class="btn btn btn-outline-danger" data-dismiss="modal" id="basket-checkout-cancel">Cancel</button>
            <button type="button" class="btn btn btn-outline-success" data-dismiss="modal" id="basket-checkout-items">Checkout</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="store-message-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="store-message-modal-body">
            ...

          </div>
          <div class="modal-footer  justify-content-md-center">
            <button type="button" class="btn btn btn-outline-success" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../js/shop.js"></script>

  </body>
</html>
