<?php
    include("../../config.php");
    $all_tags_query = "SELECT * FROM tags";
    $result= $conn->prepare($all_tags_query);
    $result->execute();
    $tags = $result->fetchall();
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
                    <h4 class="card-title">Tags Table</h4>
                    <table class="table table-hover text-center">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tags as $tag): 
                            echo "<tr><td>".$tag['id']."</td>"
                            ."<td >".$tag['title']."</td>
                            <td>".substr($tag['description'],0,40)."</td>
                            <td><a href='./view.php?task=editTag&tid=".$tag['id']."'>
                            <button type='button' title='View' class='btn btn-inverse-dark btn-icon'><i class='icon-pencil'></i></button></a></td>
                            <td><a href='./view.php?task=delTag&tid=".$tag['id']."'><button type='button' title='Delete' class='btn btn-inverse-danger btn-icon'>
                            <i class='icon-trash'></i></button></a></td></tr>";
                        endforeach;
                        ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
<?php include(ROOT_PATH.'/admin/layout/footer.php'); ?>
