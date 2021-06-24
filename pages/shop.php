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
        <div class="row flex-xl-nowrap">
          <div class="col-12 col-md-3 col-xl-2 bd-sidebar">

            
            <div class="bd-toc-item">
              <a class="bd-toc-link" href="/docs/4.0/getting-started/introduction/">
                Getting started
              </a>
            </div>
            <div class="bd-toc-item">
              <a class="bd-toc-link" href="/docs/4.0/layout/overview/">
                Layout
              </a>
            </div>
          </div>
        </div>

        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
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
            <button type="button" class="btn btn btn-outline-success" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
    <script type="text/javascript" src="../js/shop.js"></script>

  </body>
</html>
