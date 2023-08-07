<?php
    require_once("../../config.php");
    include(ROOT_PATH.'/admin/post/post_functions.php');


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
                    <div class="card-body post">
                        <h4 class="card-title"><?php echo (isset($editedPost))? "Edit Post": "Add New Post";?></h4>
                        <form method="POST" action="view.php"">
                        <div class="row">
                            <div class="col-md-9">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title: </label>
                                <div class="col-sm-10">
                                <input type="text" id="title" name="title" class="form-control form-control-sm"
                                value="<?php echo (isset($editedPost))? $editedPost['title']: "";?>" />
                                <div class="mb-2 bg-danger text-white"><?php echo $validatPost['title']; ?></div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tags: </label>
                                <div class="col-sm-10">
                                    <select id="tag" class="js-example-basic-multiple" multiple="multiple" name="tags[]" style="width:100%" >
                                        <?php if(isset($editedPost)): //if we are in edit mode it will have value.
                                                foreach($tags as $tag)://tags is an array contains all tags
                                                        (in_array($tag, $postTags))? $selected="selected": $selected="";
                                                        echo '<option value="'.$tag['id'].'" '.$selected.'>'.$tag['title'].'</option>';                                                    
                                            
                                         endforeach; ?>
                                        <?php else: foreach($tags as $tag): ?>
                                            <option value="<?php echo $tag['id'] ?>"><?php echo $tag['title'] ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status: </label>
                                <div class="col-sm-6">
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <?php if($editedPost['status']==1): ?>
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
                            <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Content: </label>
                                <div class="col-sm-12">
                                    <!-- <div id="toolbar-container"></div>
                                    <div id="editor">
                                        <p>Here goes the initial content of the editor.</p>
                                    </div> -->
                                    <!-- <textarea id="summernote" name="editordata"></textarea>   -->
                                    <textarea type="text" class="form-control" name="content" id="myTextarea"
                                          rows="4"><?php echo(isset($editedPost))? $editedPost['content']:""; ?></textarea>
                                    <div class="mb-2 bg-danger text-white"><?php echo $validatPost['content']; ?></div>
                                </div>                       
                            </div>
                            <input type="hidden" name="pid" value="<?php echo(isset($editedPost))? $editedPost['id']:""; ?>"></input>
                            <button type="submit" name="<?php echo(isset($editedPost))? 'postEdited':'addPost'; ?>" class="btn btn-primary mr-2">Save</button>
                            <?php echo(isset($editedPost))? "<a href='./index.php'><button type='button' class='btn btn-light mr-2' data-dismiss='post'>Cancel</button></a>":""; ?>
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
