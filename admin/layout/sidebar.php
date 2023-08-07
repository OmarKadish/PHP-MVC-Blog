<!-- partial -->
<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">

          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL.'/admin/index.php' ?>">
              <span class="menu-title">Dashboard</span>
              <i class="icon-screen-desktop menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-post" aria-expanded="false" aria-controls="ui-post">
              <span class="menu-title">Posts Managemnet</span>
              <i class="icon-list menu-icon"></i>
            </a>
            <div class="collapse" id="ui-post">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL.'/admin/post/view.php'; ?>">Add new post</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL.'/admin/post/index.php'; ?>">Manage Posts</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-gallery" aria-expanded="false" aria-controls="ui-gallery">
              <span class="menu-title">Gallery Management</span>
              <i class="icon-picture menu-icon"></i>
            </a>
            <div class="collapse" id="ui-gallery">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL.'/admin/gallery/view.php'; ?>">Add new photo</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL.'/admin/gallery/index.php'; ?>">Manage Gallery</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-tag" aria-expanded="false" aria-controls="ui-tag">
              <span class="menu-title">Tags Management</span>
              <i class="icon-tag menu-icon"></i>
            </a>
            <div class="collapse" id="ui-tag">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL.'/admin/tag/view.php'; ?>">Add new tag</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL.'/admin/tag/index.php'; ?>">Manage Tags</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL.'/admin/message/index.php'; ?>">
              <span class="menu-title">Messages</span>
              <i class="icon-speech menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL.'/admin/user/index.php'; ?>" >
              <span class="menu-title">Users Managemnet</span>
              <i class="icon-people menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->