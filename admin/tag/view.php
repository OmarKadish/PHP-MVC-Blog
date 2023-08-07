<?php
    require_once("../../config.php");
    include(ROOT_PATH.'/admin/tag/tag_functions.php');
       

 ?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH.'/admin/layout/header.php'); ?>
<?php include(ROOT_PATH.'/admin/layout/sidebar.php'); ?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body tag">
                        <h4 class="card-title"><?php echo(isset($editedTag))? "Edit Tag": "Add New Tag";?></h4>
                        <form method="POST" action="view.php"">
                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title: </label>
                                <div class="col-sm-10">
                                <input type="text" id="title" name="title" class="form-control form-control-sm"
                                value="<?php echo (isset($editedTag))? $editedTag['title']: "";?>" />
                                <div class="mb-2 bg-danger text-white"><?php echo $validatTag['title']; ?></div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description: </label>
                                <div class="col-sm-10">
                                <input type="text" id="description" name="description" class="form-control form-control-sm"
                                value="<?php echo (isset($editedTag))? $editedTag['description']: "";?>" />
                                <div class="mb-2 bg-danger text-white"><?php echo $validatTag['description']; ?></div>
                                </div>                       
                            </div>
                            <input type="hidden" name="tid" value="<?php echo(isset($editedTag))? $editedTag['id']:""; ?>"></input>
                            <button type="submit" name="<?php echo(isset($editedTag))? "tagEdited":"addTag"; ?>" class="btn btn-primary mr-2">Save</button>
                            <?php echo(isset($editedTag))? "<a href='./index.php'><button type='button' class='btn btn-light mr-2' data-dismiss='tag'>Cancel</button></a>":""; ?>
                            <!-- <button class="btn btn-light">Cancel</button> -->
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
<?php include(ROOT_PATH.'/admin/layout/footer.php'); ?>
