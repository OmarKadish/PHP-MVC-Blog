<?php
  //the validation for the admin panel authentications.

  if (isset($_SESSION['user'])) {
      if (isset($_SESSION['loginToken']) && $_SESSION['loginToken'] == '0136877') {
          if (!$_SESSION['admin']) {
              header('location: ' . BASE_URL . '/error-404.php');
          }
      }
  }else {
      $_SESSION['msg'] = "You must log in first";
      header('location: '.BASE_URL.'/registration/login.php');
  }

?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/admin/style/vendors/simple-line-icons/css/simple-line-icons.css'; ?>">
    <!-- <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/admin/style/vendors/css/vendor.bundle.base.css'; ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css"> -->
    <!-- <link rel="stylesheet" href="./vendors/chartist/chartist.min.css"> -->
    <!-- End plugin css for this page -->
    <!-- Select Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/admin/style/vendors/select2/select2.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/admin/style/vendors/select2-bootstrap-theme/select2-bootstrap.min.css'; ?>">
    <!-- End Select plugin css for this page -->
    <!-- summernote:css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">    <!-- endsummernote -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/admin/style/style.css' ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo BASE_URL.'/admin/images/favicon.png'; ?>" />
    <link rel="stylesheet" href="<?php echo BASE_URL.'/admin/style/scss/_sidebar.css' ?>">
    <!-- styling the preview image on uploads   -->
    <style>
    .image_pr {
        padding: 15px;
        max-width: 150px;
      }
    </style>
  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="<?php echo BASE_URL.'/index.php' ?>">
            <img src="images/logo.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo BASE_URL.'/index.php' ?>"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome To Blog Admin Panel!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="<?php echo BASE_URL.$_SESSION['user']['photo_path'];?>">
                <span class="font-weight-normal"><?php echo $_SESSION['user']['firstName']." ".$_SESSION['user']['lastName']; ?></span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" style="height: 60px;" src="<?php echo BASE_URL.$_SESSION['user']['photo_path'];?>">
                  <p class="mb-1 mt-3"><?php echo $_SESSION['user']['firstName']." ".$_SESSION['user']['lastName']; ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['user']['email']; ?></p>
                </div>
                <a href="<?php echo BASE_URL.'/admin/profile.php' ?>" class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a>
                <a href="<?php echo BASE_URL.'/registration/logout.php' ?>" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>