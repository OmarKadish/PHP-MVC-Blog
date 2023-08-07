<?php
    include("../../config.php");
    $all_images_query = "SELECT i.*, concat(u.firstName, ' ', u.lastName) AS uploader 
    FROM images i
    INNER JOIN users u ON i.user_id=u.id";
    $result= $conn->prepare($all_images_query);
    $result->execute();
    $images = $result->fetchall();
 ?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH.'/admin/layout/header.php'); ?>
<?php include(ROOT_PATH.'/admin/layout/sidebar.php'); ?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Gallery Table</h4>
                    <table class="table table-hover text-center">
                    <thead>
                        <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Uploader</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($images as $image):
                            echo '<tr><td><img src="'.BASE_URL.$image['image_path'].'" /></td>'
                            .'<td>'.substr($image['title'],0,30).'</td>';
                            echo ($image['status']=="1")? '<td><label class="badge badge-success">Active</label></td>':'<td><label class="badge badge-danger">Not Active</label></td>';
                            echo '<td>'.$image['uploader'].'</td><td><a href="./view.php?task=editImage&gid='
                            .$image['id'].'"><button type="button" title="View" class="btn btn-inverse-dark btn-icon">
                            <i class="icon-pencil"></i></button></a></td><td><a href="./view.php?task=delImage&gid="'
                            .$image['id'].'"><button type="button" title="Delete" class="btn btn-inverse-danger btn-icon">
                            <i class="icon-trash"></i></button></a></td></tr>';
                        endforeach;?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
<?php include(ROOT_PATH.'/admin/layout/footer.php'); ?>
