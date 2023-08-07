<?php
    require_once("../../config.php");
    include(ROOT_PATH.'/admin/post/post_functions.php');
    $all_posts_query = "SELECT p.*, concat(u.firstName, ' ', u.lastName) AS writer 
    FROM posts p
    INNER JOIN users u ON p.user_id=u.id";
    $result= $conn->prepare($all_posts_query);
    $result->execute();
    $posts = $result->fetchall();
    //print_r($posts);

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
                    <h4 class="card-title">Posts Table</h4>
                    <table class="table table-hover text-center">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>View Count</th>
                        <th>Writer</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post): 
                            echo "<tr><td>".$post['id']."</td>"
                            ."<td class='text-left'>".substr($post['title'],0,40)."</td>";
                            if($post['status']=="1"):
                                echo "<td><label class='badge badge-success'>Active</label></td>";
                                else:
                                    echo "<td><label class='badge badge-danger'>Not Active</label></td>";
                            endif;
                            echo "<td>".$post['view_count']."</td><td>".$post['writer']
                            ."</td><td><a href='./view.php?task=editPost&pid=".$post['id']."'><button type='button' title='View' class='btn btn-inverse-dark btn-icon'>
                            <i class='icon-pencil'></i></button></a></td><td><a href='./view.php?task=delPost&pid=".$post['id']."'><button type='button' title='Delete' class='btn btn-inverse-danger btn-icon'>
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
