<!DOCTYPE html>
<!-- https://icons8.com/icon/set/shopping/office -->
<html lang="en" dir="ltr">
  <head>
    <?php require_once('../includes/header.php'); ?>
    <link rel="stylesheet" href="../css/store.css">
    <title>Food Store</title>
  </head>
  <body>
    <?php require_once('../includes/navbar.php'); ?>
    <div class="container-fluid">
      <div class="row justify-content-md-center row-sign-out-title">
        <div class="col">
        </div>
        <div class="col-md-auto div-sign-out-title">
         <!-- Food Sign Out Page -->
        </div>
        <div class="col">
        </div>
      </div>

      <div class="row">
        <div class="col">
        </div>
        <div class="col-6">
          <div class="card-deck">
            <div class="card border-success" style="width: 16rem;">
              <img class="card-img-top" src="../images/icons8-buying-96.png" alt="Shop">
              <div class="card-body">
                <h5 class="card-title">Shop</h5>
              </div>
            </div>
            <div id="update-stock-div" class="card border-success" style="width: 18rem;">
              <img class="card-img-top" src="../images/icons8-renew-80.png" alt="Update">
              <div class="card-body">
                <h5 class="card-title">Update Stock</h5>
              </div>
            </div>
            <div class="card border-success" style="width: 18rem;">
              <img class="card-img-top" src="../images/icons8-add-96.png" alt="Add">
              <div class="card-body">
                <h5 class="card-title">Add New Item</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
        </div>
      </div>
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
            <form>
             <div class="form-group">
               <label for="exampleFormControlFile1">Example file input</label>
               <input type="file" class="form-control-file" id="exampleFormControlFile1">
             </div>
            </form>
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
