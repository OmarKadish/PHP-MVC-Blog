<?php 
     require_once("config.php");
     include(ROOT_PATH.'/controllers/post_controller.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH.'/layout/header.php'); ?>
<?php include(ROOT_PATH.'/layout/navbar.php'); ?>

<!-- Home Section -->

<section id="home" class="main-single-post parallax-section" style='background: url("<?php echo BASE_URL.$current_post['header_photo'] ?>") no-repeat '>
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <h1>Single Post</h1>
               </div>

          </div>
     </div>
</section>

<!-- Blog Single Post Section -->

<section id="blog-single-post">
     <div class="container">
          <div class="row" style="padding-bottom: 32px;">
               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="blog-single-post-thumb">
                         <div class="blog-post-title">
                              <h2><?php echo $current_post['title'] ?></a></h2>
                         </div>
                         <div class="blog-post-format">
                              <ul class="list-inline">
                                   <li>By <span><a href="#"><i class="fa fa-user"></i> <?php echo $current_post['auther'] ?></a></span></li>
                                  <li><span><a href="#"><i class="fa fa-calendar"></i> <?php echo date('F d, Y', strtotime($current_post['created_at']));?></a></span></li>
                                  <li><span><a href="#comments"><i class="fa fa-comments"></i> 3 Comments</a></span></li>
                              </ul>
                         </div>
<!--                        other styles-->
                         <!-- <div class="blog-post-format">
                              <span><a href="#"><img src="<php echo BASE_URL.$current_post['photo'] ?>" class="img-responsive img-circle"> <php echo $current_post['auther'] ?></a></span>
                              <span><i class="fa fa-date"></i> <php echo date('Y-m-d', strtotime($current_post['created_at'])); ?></span>
                              <span><a href="#comments"><i class="fa fa-comment-o"></i> 124 Comments</a></span>
                         </div> -->
                         <!-- <div class="blog-post-format">
                              <img src="<php echo BASE_URL.$current_post['photo'] ?>" class="img-responsive img-circle">
                              <p><span>Posted by <a href="#"><php echo $current_post['auther']?></a>
                              on <i class="fa fa-date"></i><php echo date('Y-m-d', strtotime($current_post['created_at'])); ?></span>
                              <span><a href="#comments"><i class="fa fa-comment-o"></i> 124 Comments</a></span></p>
                         </div> -->

                         <div class="blog-post-des">
                              <?php echo $current_post['content'] ?>
                         </div>
                            <div class="tag-items" >
                                <span class="small-text">Tags:</span>
                                <?php foreach ($tags as $tag):
                                    echo '<a href="/tagfilter.php?selectedTag='.$tag['title'].'" rel="tag">'.$tag['title'].'</a>';
                                endforeach; ?>
                            </div>
<!--                            Social media sharing buttons.-->
                            <div class="share-items" style="margin-top: 30px">
                                <span>Share This Post:</span><br>
<!--                                The sharing buttons are written well, but they won't work on localhost.-->
                                <a href="https://twitter.com/share?url=<?php echo BASE_URL.'/single-post.php?openpost='.$current_post['id']; ?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank" class="fa fa-twitter"></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo BASE_URL.'/single-post.php?openpost='.$current_post['id']; ?>" target="_blank" class="fa fa-linkedin"></a>
                                <a href="https://www.facebook.com/sharer.php?u=<?php echo BASE_URL.'/single-post.php?openpost='.$current_post['id']; ?>" target="_blank" class="fa fa-facebook"></a>
                            </div>

                         <div class="blog-author">
                              <div class="media">
                                   <div class="media-object pull-left">
                                        <img src="./Images/blank-profile.png" class="img-circle img-responsive" alt="blog">
                                   </div>
                                   <div class="media-body">
                                        <h3 class="media-heading"><a href="#"><?php echo $current_post['auther'] ?></a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                   </div>
                              </div>
                         </div>

                         <div class="blog-comment" id="comments">
                              <h3>Comments</h3>
                              <?php if($comments): ?>
                                   <?php foreach($comments as $comment): ?>
                                   <div class="media" style="border-top:1px solid #dce4e6; padding-top:30px">
                                        <div class="media-object pull-left">
                                             <img src="./Images/blank-profile.png" class="img-responsive img-circle" alt="Blog Image 11">
                                        </div>
                                        <div class="media-body">
                                             <h3 class="media-heading"><?php echo $comment['name'] ?></h3><a href="#" class="comment-reply">Reply</a>
                                             <div><p><?php echo date('F d, Y', strtotime($comment['created_at'])).' at '.date('H:i A', strtotime($comment['created_at']));?></p></div>
                                             <div><p><?php echo $comment['content'] ?></p></div>
                                        </div>
                                   </div>
                                   <?php endforeach; ?>
                              <?php else: ?>
                                   <p>No Comments yet.</p>
                              <?php endif;?>
                         </div>

                         <div class="blog-comment-form" id="comment-form">
                              <h3>Leave a Comment</h3>
                              <form action="<?php echo(isset($validationMsg))? 'single-post.php?openpost='.$current_post['id']:'single-post.php?openpost='.$current_post['id'].'#comment-form'; ?>" method="post">
                                   <div>
                                        <input type="text" class="form-control" placeholder="Name" 
                                             name="name" value="<?php echo htmlspecialchars($name); ?>">
                                        <div class="p-3 mb-2 bg-danger text-white"><?php echo $validationMsg['name']; ?></div>
                                   </div>
                                   <div>
                                        <input type="email" class="form-control" placeholder="Email" 
                                             name="email" value="<?php echo htmlspecialchars($email); ?>">
                                        <div class="p-3 mb-2 bg-danger text-white"><?php echo $validationMsg['email']; ?></div>
                                   </div>
                                   <div>
                                        <textarea name="content" rows="5" class="form-control" id="content" placeholder="Your comment"
                                             message="message" value="<?php echo $content; ?>"></textarea>
                                        <div class="p-3 mb-2 bg-danger text-white"><?php echo $validationMsg['content']; ?></div>
                                   </div>
                                   <div class="col-md-3 col-sm-4">
                                        <input type="hidden" name="currPostid" value="<?php echo $current_post['id']; ?>"></input>
                                        <input name="postComment" type="submit" class="form-control" id="submit" value="Post Your Comment">
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
<!--         Related post's slider.-->
         <div class="row" style="padding-top: 32px; border-top: 1px solid #f0f0f0">
              <div class="col-md-offset-1 col-md-10 col-sm-10">
                  <h3>Check out more</h3>
                  <?php if(!empty($relatedPosts)){ ?>
                      <div class="slider owl-carousel">
                            <?php foreach($relatedPosts as $post): ?>
                                  <div class="card" style="max-height: 20%;">
                                      <div class="img">
                                          <img src="<?php echo BASE_URL.$post['header_photo'] ?>" alt="">
                                      </div>
                                      <div class="content">
                                          <div class="title" style="font-size: medium"><a href='<?php echo "single-post.php?openpost=".$post['id'] ?>'><?php echo $post['title']; ?></a></div>
                                          <p><?php echo substr(strip_tags($post['content']), 0, 60); ?></p>
                                        <!--       strip_tags is a function used to skip image kod in text fields.-->
                                          <div class="btn">
                                              <a href='<?php echo "single-post.php?openpost=".$post['id'] ?>'>Read more</a>
                                          </div>
                                      </div>
                                  </div>
                            <?php endforeach; ?>
                      </div>
                  <?php } else
                      echo '<div class="title" style="font-size: medium">There is No Related Post to The Current Post.</div>'; ?>
              </div>
              <script>
                  $(".slider").owlCarousel({
                      loop: true,
                      autoplay: true,
                      autoplayTimeout: 2000, //2000ms = 2s;
                      autoplayHoverPause: true,
                  });
              </script>
         </div>
     </div>
</section>

<!-- Footer Section -->

<?php include(ROOT_PATH.'/layout/footer.php'); ?>