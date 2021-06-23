<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('../includes/header.php'); ?>
    <title>Food Store</title>
  </head>
  <body>
    <?php require_once('../includes/navbar.php'); ?>
    <div class="container-fluid">
      <div class="row justify-content-md-center row-sign-out-title">
        <div class="col">
        </div>
        <div class="col-md-auto div-sign-out-title">
         Food Sign Out
        </div>
        <div class="col">
        </div>
      </div>

      <div class="row">
        <div class="col">
        </div>
        <div class="col-8">
          <table id="tbl-stock" class="cell-border" style="width:100%">
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
            <button type="button" class="btn btn btn-outline-success" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../js/store.js"></script>

  </body>
</html>
