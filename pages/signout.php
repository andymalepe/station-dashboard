<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('../includes/header.php'); ?>
    <title>Sign Out</title>
  </head>
  <body>
    <?php require_once('../includes/navbar.php'); ?>
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
        </div>
        <div class="col">
        </div>
      </div>
      <div class="row">
        <div class="col">
        </div>
        <div class="col-md-auto justify-content-md-center">
          <button type="button" class="btn btn-outline-success disabled" id="btn-user-area-sign-in">Sign In</button>
        </div>
        <div class="col">
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
    </button> -->

    <!-- Standard Modal -->
    <div class="modal fade" id="standard-dashboard-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="standard-dashboard-modal-body">
            ...

          </div>
          <div class="modal-footer  justify-content-md-center">
            <button type="button" class="btn btn btn-outline-success" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../js/signout.js"></script>

  </body>
</html>
