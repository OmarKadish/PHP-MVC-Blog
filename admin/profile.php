<?php
require_once("../config.php");
include(ROOT_PATH . '/admin/public_functions.php');
$user = $_SESSION['user'];

if (isset($_POST['submit'])) {
    //Saving profile photo.
    $target_path = '';
    $validatImage = array('profile' => '');// for later.
    $folder = '/Images/';
    $uploaded_img = $_FILES['profile'];
    $target_path = $folder . basename($uploaded_img["name"]);
    $validatImage['profile'] = validateFile($target_path, $uploaded_img);

    // Upload and save the Image if there are no errors in the for
    if (!array_filter($validatImage)) {
        if (move_uploaded_file($uploaded_img['tmp_name'], ROOT_PATH . $target_path)) {
            $query = "UPDATE users set photo_path=? where id=?";
            $conn->prepare($query)->execute([$target_path, $_SESSION['user']['id']]);
            header('location: ' . BASE_URL . '/admin/profile.php');
        } else
            echo "Sorry, there was an error uploading your file."; //todo: handel the error.

    } else {

        header('location: ' . BASE_URL . '/admin/profile.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/admin/layout/header.php'); ?>
<?php include(ROOT_PATH . '/admin/layout/sidebar.php'); ?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile</h4>
                        <form class="form-sample" method="POST" action="profile.php" enctype="multipart/form-data">
                            <p class="card-description"> Personal info </p>
                            <div class="form-group row">
                                <div style="align-self: center">
                                    <img style="height: 150px;" src="<?php echo BASE_URL . $user['photo_path']; ?>"
                                         alt="">
                                </div>
                                <div class="col-sm-5">
                                    <input type="file" id="profile" name="profile" class="form-control form-control-sm"
                                           value="<?php echo (isset($user)) ? "" : ""; ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" readonly class="form-control"
                                                   value="<?php echo $user['firstName']; ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" readonly class="form-control"
                                                   value="<?php echo $user['lastName']; ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <?php if ($user['gender'] == 0) : ?>
                                                    <option selected>Male</option>
                                                    <option>Female</option>
                                                <?php else : ?>
                                                    <option>Male</option>
                                                    <option selected>Female</option>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date of Birth</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $user['birthDate'] ?>"
                                                   readonly placeholder="yyyy/mm/dd"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $user['email'] ?>" readonly
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $user['phone'] ?>"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" name="submit" class="btn btn-primary mr-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include(ROOT_PATH . '/admin/layout/footer.php'); ?>
