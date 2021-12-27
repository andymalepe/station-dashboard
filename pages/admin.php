<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('../includes/header.php'); ?>
    <link rel="stylesheet" href="../lib/css/materialdesignicons.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Admin</title>
  </head>
  <body>
    <?php require_once('../includes/navbar.php'); ?>
    <div class="container-fluid">
      <div class="row justify-content-md-center row-sign-out-title">
        <div class="col">
        </div>
        <div class="col-md-auto div-sign-out-title">
       
        </div>
        <div class="col">
        </div>
      </div>

      <div class="row">
        <div class="col">
        </div>
        <div class="col-8">
          <div class="card-deck">
            <div class="card border-success" style="width: 16rem;">
              <!-- <img class="card-img-top" src="../images/icons8-buying-96.png" alt="Shop"> -->
              <div class="card-body">
                <h5 class="card-title justify-content-md-center">Food Comsumption</h5>
                <div class="page-content page-container" id="page-content">
                <input type="text" id="startdate-stock-usage-export" class="datepicker" placeholder="Start">
                <input type="text" id="enddate-stock-usage-export" class="datepicker" placeholder="End">
                <button type="button" class="btn btn-outline-success disabled" id="btn-stock-usage-export">Export</button>
              </div>
              </div>
            </div>
            <div id="update-stock-div" class="card border-success" style="width: 18rem;">
              <!-- <img class="card-img-top" src="../images/icons8-renew-80.png" alt="Update"> -->
              <div class="card-body">
                <h5 class="card-title justify-content-md-center">Food Inventory</h5>
                
                <button type="button" class="btn btn-outline-success" id="btn-stock-download" style="margin-bottom: 15px;">Download Inventory</button>
                
                <input type="file" id="file-stock-upload" name="" class="">
                
                <button type="button" class="btn btn-outline-success disabled" id="btn-stock-update">Update</button>
              </div>
            </div>
            <div class="card border-success" style="width: 18rem;">
              
              <div class="card-body">
                <h5 class="card-title justify-content-md-center"><?php echo STATION; ?> Personnel</h5>
                <img class="card-img-top" src="../images/icons8-add-96.png" alt="Add">
              </div>
            </div>
          </div>
        </div>
        <div class="col">
        </div>
      </div>
    </div>
        
    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../lib/js/xlsx.full.min.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>
  </body>
</html>
