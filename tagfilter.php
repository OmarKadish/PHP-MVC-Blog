<?php
require("config.php");
include(ROOT_PATH . '/controllers/post_controller.php');

?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/layout/header.php'); ?>
<?php include(ROOT_PATH . '/layout/navbar.php'); ?>

    <!-- Home Section -->

    <section id="home" class="main-about parallax-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!--                   <h1>Filter</h1>-->
                    <!-- <a href="#blog" class="smoothScroll btn btn-default">Discover More</a> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->

    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-9">
                    <div class="form-group row">
                        <p class="col-sm-3 ">Filter by Tags: </p>
                        <div class="col-sm-6">
                            <select id="tag" class="js-example-basic-multiple" multiple="multiple" name="tags[]"
                                    style="width:100%">
                                <?php foreach ($tagList as $tag): ?>
                                    <option <?php echo (isset($_GET['selectedTag']) && $_GET['selectedTag'] == $tag['title']) ? "selected" : "" ?>
                                            value="<?php echo $tag['id'] ?>"><?php echo $tag['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="button" id="filterBtn" class="btn btn-default" value="Filter"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="main">
                        <ul id="postsData" class="cards">

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            //For the first page load.
            var tagIds = $('#tag').val();
            getData(tagIds);

            // $('#tag').blur(function (){
            //     if($(this).val()){
            //         var tagIds = $(this).val();
            //         //console.log($('#tag').val());
            //         getData(tagIds);
            //     }
            // });
            $("#filterBtn").click(function () {

                var tagIds = $('#tag').val();
                //console.log(tagIds);
                getData(tagIds);
            });
        });

        function getData(tagIds) {
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("postsData").innerHTML =
                    this.responseText;
                }
            };
            if (tagIds) {
                xhttp.open("GET", "filter.php?ids=" + tagIds, true);
            } else
                xhttp.open("GET", "filter.php?all=1", true);
            xhttp.send();
        }
    </script>

<?php include('./layout/footer.php'); ?>