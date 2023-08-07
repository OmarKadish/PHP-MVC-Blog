<?php
    include("../../config.php");
    $all_messages_query = "SELECT * FROM messages";
    $result= $conn->prepare($all_messages_query);
    $result->execute();
    $messages = $result->fetchall();
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
                    <h4 class="card-title">Contact Messages Table</h4>
                    <table class="table table-hover text-center">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Sent Date</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($messages as $msg): 
                        $is_readed=($msg['status']==0)? 'icon-eye':'icon-envelope-open';
                            echo "<tr><td>".$msg['id']."</td>"
                            ."<td>".$msg['name']."</td>
                            <td>".$msg['subject']."</td><td>".date('F d, Y', strtotime($msg['created_at']))."</td>
                            <td><a href='./view.php?task=view&mid=".$msg['id']."'><button type='button' title='View' class='btn btn-inverse-dark btn-icon'>
                            <i class='".$is_readed."'></i></button></a></td>
                            <td><a href='./view.php?task=del&mid=".$msg['id']."'><button type='button' title='Delete' class='btn btn-inverse-danger btn-icon'><i class='icon-trash'></i></button></a></td></tr>";
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
