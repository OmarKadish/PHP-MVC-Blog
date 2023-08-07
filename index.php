<?php
     require("config.php");
     include(ROOT_PATH.'/controllers/post_controller.php');


 ?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH.'/layout/header.php'); ?>
<?php include(ROOT_PATH.'/layout/navbar.php'); ?>



<!-- Home Section -->

<section id="home" class="main-home parallax-section">
     <div class="overlay"></div>
     <div id="particles-js"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <h1>Hello! This is My Blog.</h1>
                    <h4>Responsive Blog </h4>
                    <!-- <a href="#blog" class="smoothScroll btn btn-default">Discover More</a> -->
               </div>

          </div>
     </div>
</section>

<!-- Blog Section -->

<section id="blog">
     <div class="container">
          <div class="row">
               <div class="col-md-offset-1 col-md-10 col-sm-12">
               <?php foreach($posts as $post): ?>
                    <div class="blog-post-thumb">
                         <div class="blog-post-image">
                              <a href='<?php echo "single-post.php?openpost=".$post['id'] ?>'>
                                   <img style="height: 300px;" src="<?php echo BASE_URL.$post['header_photo'] ?>" class="img-responsive" alt="Blog Image">
                              </a>
                         </div>
                         <div class="blog-post-title">
                              <h3><a href='<?php echo "single-post.php?openpost=".$post['id'] ?>'><?php echo $post['title'] ?></a></h3>
                         </div>
                         <div class="blog-post-format">
                              <span><a href="#"><img src="<?php echo BASE_URL.$post['photo'] ?>" class="img-responsive img-circle"> <?php echo $post['auther'] ?></a></span>
                              <span><i class="fa fa-date"></i> <?php echo date('F d, Y', strtotime($post['created_at'])); ?></span>
                              <!-- Todo: get the count of comments for every post  -->
                              <!-- <span><a href="#"><i class="fa fa-comment-o"></i> 35 Comments</a></span> -->
                         </div>
                         <div class="blog-post-des">
                              <!-- Todo: Here a post summery will be added...  Done  -->
                              <p><?php echo substr(strip_tags($post['content']), 0, 200); ?></p></p>
                              <!-- if we could get the tags array for every post in the same query. -->
                              <!-- <div class="tag-items">
                                   <span class="small-text">Tags:</span>
                                   <php foreach ($tags as $tag):
                                        echo '<a href="#" rel="tag">'.$tag['title'].'</a> ';
                                        endforeach; ?>
                              </div> -->
                              <a href='<?php echo "single-post.php?openpost=".$post['id'] ?>' class="btn btn-default">Continue Reading</a>
                         </div>
                         
                    </div>
               <?php endforeach; ?>
               </div>

          </div>
     </div>
</section>


<?php include('./layout/footer.php'); ?>