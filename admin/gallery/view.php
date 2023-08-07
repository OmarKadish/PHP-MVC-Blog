<?php
    require_once("../../config.php");
    include(ROOT_PATH.'/admin/gallery/gallery_functions.php');
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
                    <div class="card-body gallery">
                        <h4 class="card-title"><?php echo (isset($editedImage))? "Edit Image": "Add New Image";?></h4>
                        <form method="POST" action="view.php" enctype="multipart/form-data">
                        <div class="card" >
                            <div class="card-body" style="align-self: center">
                                <img style="height: 200px;" 
                                src="<?php echo (isset($editedImage))? BASE_URL.$editedImage['image_path']: "";?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title: </label>
                                <div class="col-sm-8">
                                <input type="text" id="title" name="title" class="form-control form-control-sm"
                                value="<?php echo (isset($editedImage))? $editedImage['title']: "";?>" />
                                <div class="mb-2 bg-danger text-white"><?php echo $validatImage['title']; ?></div>
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
                                value="<?php echo (isset($editedImage))? $editedImage['description']: "";?>" />
                                </div>                       
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status: </label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" name="status" id="exampleFormControlSelect3">
                                        <?php if($editedImage['status']==1): ?>
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        <?php else: ?>
                                            <option value="0">Not Active</option>
                                            <option value="1">Active</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload Images: </label>
                                <div class="col-sm-8">
                                    <input type="file" id="g_image" name="g_image" class="form-control form-control-sm"
                                    value="<?php echo (isset($editedImage))? $editedImage['image_path']: "";?>" />
                                    <div class="mb-2 bg-danger text-white"><?php echo $validatImage['g_image']; ?></div>
                                    <div class="mt-1 text-center">
                                        <div class="preview-image"></div>
                                    </div>
                                </div>                       
                            </div>
                            <input type="hidden" name="gid" value="<?php echo(isset($editedImage))? $editedImage['id']:""; ?>"></input>
                            <button type="submit" name="<?php echo(isset($editedImage))? "imageEdited":"addImage"; ?>" class="btn btn-primary mr-2">Save</button>
                            <?php echo(isset($editedImage))? "<a href='./index.php'><button type='button' class='btn btn-light mr-2' data-dismiss='gallery'>Cancel</button></a>":""; ?>
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
