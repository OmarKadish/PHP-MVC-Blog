
<!-- Footer Section -->

<footer>
     <div class="container">
          <div class="row">

               <div class="col-md-5 col-md-offset-1 col-sm-6">
                    <h3>Blog</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    <div class="footer-copyright">
                         <p>Copyright &copy; 2021-<?php echo date("Y");?> All rights reserved.</p>
                    </div>
               </div>

               <div class="col-md-4 col-md-offset-1 col-sm-6">
                    <h3>Contact me</h3>
                    <p><i class="fa fa-map"></i> Ankara, Turkey</p>
                    <p><a href="tel:00905522997016" style="color: #777;"><i class="fa fa-phone"></i>00905522997016</a></p>
                    <p><a href="mailto:omarkadish@gmail.com" style="color: #777;"><i class="fa fa-envelope"></i>omarkadish@gmail.com</a></p>
               </div>

               <div class="clearfix col-md-12 col-sm-12">
                    <hr>
               </div>

               <div class="col-md-12 col-sm-12">
                    <ul class="social-icon">
                         <li><a href="https://github.com/OmarKadish" target="_blank" class="fa fa-github"></a></li>
                         <li><a href="https://www.linkedin.com/in/omar-kadish" target="_blank" class="fa fa-linkedin"></a></li>
                         <li><a href="https://join.skype.com/invite/rekXnJwHcevb" target="_blank" class="fa fa-skype"></a></li>
                         <li><a href="https://mobile.twitter.com/omarabdalazeez6" target="_blank" class="fa fa-twitter"></a></li>
                         <li><a href="https://www.instagram.com/omarabdalazeez6/" target="_blank" class="fa fa-instagram"></a></li>
                    </ul>
               </div>
               
          </div>
     </div>
</footer>

<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- SCRIPTS -->

<!-- SCRIPTS for gallery -->
<script src="<?php echo BASE_URL.'/style/js/jquery.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/particles.min.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/app.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/jquery.magnific-popup.min.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/magnific-popup-options.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/jquery.parallax.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/smoothscroll.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/style/js/custom.js'; ?>"></script>

<!-- Select Plugin js start -->
<script src="<?php echo BASE_URL.'/admin/style/vendors/select2/select2.min.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/admin/style/js/select2.js'; ?>"></script>
<!-- Select Plugin js end -->
<script>
     $('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');
</script>

</body>
</html>