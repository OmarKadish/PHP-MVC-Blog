<?php
    require_once("../../config.php");
    include(ROOT_PATH.'/admin/message/msg_functions.php');
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH.'/admin/layout/header.php'); ?>
<?php include(ROOT_PATH.'/admin/layout/sidebar.php'); ?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                <div class="card-header">
                        <p class="card-title" style="font-size: 20px">Subject: <?php echo $cur_message['subject'] ?></p>
                        <h6 class="card-subtitle text-muted" style="font-size: 12px">Sender Name: <?php echo $cur_message['name'] ?></h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $cur_message['content'] ?></p>
                    </div>
                    <div class="card-footer" style="display: inline-flex">
                            <a href="./index.php" class="btn btn-secondary" style="margin-left:auto;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
<?php include(ROOT_PATH.'/admin/layout/footer.php'); ?>
