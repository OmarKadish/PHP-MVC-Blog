<?php
    require_once("../config.php");
    $user_check_query = "SELECT * FROM userlogs WHERE user_id = ? ORDER BY login_date DESC LIMIT 5";
    $result= $conn->prepare($user_check_query);
    $result->execute([$_SESSION['user']['id']]);
    $userLogs = $result->fetchAll();

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
                    <div class="card-body">
                        <h4 class="card-title">Last Successful Login Attempts.</h4>
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>IP Address</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userLogs as $log):
                                echo "<tr><td>".$log['login_date']."</td>"
                                    ."<td><label class='badge badge-success'>Successful</label></td>"
                                    ."<td >".$log['user_ip']."</td></tr>";
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
