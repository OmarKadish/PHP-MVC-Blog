<?php
    include("../../config.php");
    // For Personal data security no data will be viewed nor delete command can be made even by the admin
    $all_users_query = "SELECT id, concat(firstName, ' ', lastName) AS fullName, photo_path, roll, email FROM users order by roll Desc";
    $result= $conn->prepare($all_users_query);
    $result->execute();
    $users = $result->fetchall();
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
                    <h4 class="card-title">Users Table</h4>
                    <table class="table table-hover text-center">
                    <thead>
                        <tr>
                        <th></th>
                        <th>Full Name</th>
                        <th>Roll</th>
                        <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): 
                            echo '<tr><td><img src="'.BASE_URL.$user['photo_path'].'" /></td>'
                            .'<td >'.$user['fullName'].'</td>';
                            echo ($user['roll']=="manager")? '<td><label class="badge badge-success">Admin</label></td>':'<td><label class="badge badge-warning">User</label></td>';
                            echo '<td>'.$user['email'].'</td>';
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
