            
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Omar 2021-<?php echo date("Y");?></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo BASE_URL.'/admin/style/vendors/js/vendor.bundle.base.js'; ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page --> 


    <!-- <script src="./vendors/chart.js/Chart.min.js"></script> -->
    <!-- <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script> -->

      <!-- Select Plugin js start -->
    <script src="<?php echo BASE_URL.'/admin/style/vendors/select2/select2.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL.'/admin/style/js/select2.js'; ?>"></script>
      <!-- Select Plugin js end -->

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo BASE_URL.'/admin/style/js/off-canvas.js'; ?>"></script>
    <script src="<?php echo BASE_URL.'/admin/style/js/misc.js'; ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="./js/dashboard.js"></script> -->
    <!-- End custom js for this page -->

    <!-- ckeditor5 js for this page-->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script> -->
    <!-- End ckeditor5 js for this page -->
    <!-- <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ))
        .catch( error => {
            console.error( error );
        } );
          document.querySelector( '#submit' ).addEventListener( 'click', () => {
          const editorData = editor.getData();
          // ...
          } );
    </script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
          $('#summernote').summernote({
          height: 100,
          });
        });
    </script> -->
    <!-- tinymce script -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#myTextarea',
        height: 300,
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks' +
            ' visualchars fullscreen image link media template codesample table charmap ' +
            'hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    })
</script>
<!---->
<!-- Preview Image on upload -->
<script type="text/javascript">
    $(function () {
        // Multiple images preview with JavaScript
        var multiImgPreview = function (input, imgPreviewPlaceholder) {
            if (imgPreviewPlaceholder.files) {
                imgPreviewPlaceholder.files.clear();
            }
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        var $clone = $($.parseHTML('<img>'));
                        $clone.attr('class', 'image_pr');
                        $clone.attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        // $('#images').on('change', function () {
        //     multiImgPreview(this, 'div.preview-image');
        // });
        $('#g_image').on('change', function () {
            // To delete the uploaded photo from preview after selecting new photo
            var arr = document.getElementsByClassName('image_pr');
            if (arr.length) {
                for (var i = 0; i < arr.length; i++) {
                    arr[i].remove();
                }
            }
            multiImgPreview(this, 'div.preview-image');
        });
    });

</script>

  </body>
</html>