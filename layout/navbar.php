<!-- Navigation section  -->

<div class="navbar navbar-default navbar-static-top" role="navigation">
     <div class="container">

          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <a href="<?php echo BASE_URL.'/index.php' ?>" class="navbar-brand">Blog</a>
          </div>
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right" id="#myTab">
                    <li class="active"><a href="<?php echo BASE_URL."/index.php" ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL.'/about.php' ?>">About</a></li>
                    <li><a href="<?php echo BASE_URL.'/gallery.php' ?>">Gallery</a></li>
                    <li><a href="<?php echo BASE_URL."/contact.php" ?>">Contact</a></li>

                    <li><!-- logged in user information -->
                         <?php if (isset($_SESSION['user'])) : 
                                   echo '<a href="'.BASE_URL.'/registration/logout.php" style="color: red;">logout</a>';?>
                         <?php else:
                                   echo '<a href="'.BASE_URL.'/registration/login.php" style="color: blue;">Login</a>';         
                              endif ?>
                    </li>
                    <li>
                         <?php if(isset($_SESSION['admin'])&&$_SESSION['admin'])
                              echo '<a href="'.BASE_URL.'/admin/index.php">Dashboard</a>';?>
                    </li>
               </ul>
               
          </div>

  </div>
</div>