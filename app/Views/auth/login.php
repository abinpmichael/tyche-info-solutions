<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tyche</title>
         <link rel="shortcut icon" href='assets/img/favicon.png'>
  <link rel="shortcut icon" type="image/png" href="assets/admin/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/admin/css/styles.min.css" />
</head>
<body>
  

   

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
              
                <img src="assets/img/logo.png" width="100%">
                <form action="<?= site_url('auth/dologin') ?>" method="POST">
                  <div class="mb-3">
                    <?= csrf_field(); ?>
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" id="username" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                 
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" id="password" required class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between ">
                  
                    <button type="submit" class="btn btn-outline-primary m-1">Login</button>
                     <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
                    
                  </div>
                  
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <p><a href="<?= site_url('register') ?>">Don't have an account? Register</a></p>
<script src="assets/admin/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
