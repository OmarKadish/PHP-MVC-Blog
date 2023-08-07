<?php
    include(ROOT_PATH.'/admin/public_functions.php');
    // initializing variables
        $title = $description = $target_path = '';
        $validatImage = array('title'=>'', 'g_image'=>'');

    // Adding New Image
    if (isset($_POST['addImage'])) {
        // receive all input values from the form
        // validate the title
        if (empty($_POST['title'])) {
            $validatImage['title'] = 'This Field is required.';
        } else{
            $title = $_POST['title'];
            if (!preg_match("/^[a-zA-Z\s\w\d]+$/", $title)) {
                $validatImage['title'] = "Entered value is not Valid.";
            }
        }
        $description = $_POST['description'];
        $status = $_POST['status'];

        // start configuring image.
        //configuring the path to gallery folder.
        $folder= '/Images/gallery/';
        $uploaded_img=$_FILES['g_image'];
        $target_path = $folder . basename($uploaded_img["name"]);
        $validatImage['g_image'] = validateFile($target_path,$uploaded_img);

        // Upload and save the Image if there are no errors in the for
        if (!array_filter($validatImage)) { 
            if(move_uploaded_file($uploaded_img['tmp_name'], ROOT_PATH.$target_path)) {
                $query = "INSERT INTO images (title, description, status, image_path, user_id) 
                    VALUES(?,?,?,?,?)";
                $conn->prepare($query)->execute([$title, $description, $status, $target_path, $_SESSION['user']['id']]);
                header('location: '.BASE_URL.'/admin/gallery/index.php');
            } else
                echo "Sorry, there was an error uploading your file."; //todo: handel the error. 
            
        } else{
            
            header('location: '.BASE_URL.'/admin/gallery/view.php');
        }
    }

    if(isset($_GET['task'])){

        switch ($_GET['task']) {
            case 'editImage':
                $id= $_GET['gid'];
                $query = "SELECT * FROM images where id=?";
                $result=$conn->prepare($query);
                $result->execute([$id]);
                $editedImage = $result->fetch();
                break;
            
            case 'delImage':
                $id= $_GET['gid'];
                $query = "SELECT image_path FROM images where id=?";
                $res=$conn->prepare($query);
                $res->execute([$id]);
                $path_to_delete= $res->fetch();
                try {
                    $query = "DELETE FROM images where id=?";
                    $conn->prepare($query)->execute([$id]);
                    //delete image locally after it has been deleted from DB 
                    unlink(ROOT_PATH.$path_to_delete['image_path']);
                    sleep(1);
                    header('location: '.BASE_URL.'/admin/gallery/index.php');
                } catch (Exception $e) {
                    echo $e;
                }   
                break;
            default:
                # code...
                break;
        }

    }

    if(isset($_POST['imageEdited'])){
            $id= $_POST['gid'];
            if (empty($_POST['title'])) {
                $validatImage['title'] = 'This Field is required.';
            } else{
                $title = $_POST['title'];
                if (!preg_match("/^[a-zA-Z\s\d\w\.\,]+$/", $title)) {
                    $validatImage['title'] = "Entered value is not Valid.";
                }
            }
            $description = $_POST['description'];
            $status = $_POST['status'];

            // Save the post if there are no errors in the form
            if (!array_filter($validatImage)) {
                //saving the old image path in case a new image been uploaded.
                $query = "SELECT image_path FROM images where id=?";
                $res=$conn->prepare($query);
                $res->execute([$id]);
                $old_path= $res->fetch();
                // check if a new image was uploaded
                if (is_uploaded_file($_FILES['g_image']['tmp_name'])) {
                    //configuring the path to gallery folder.
                    $folder= '/Images/gallery/';
                    $uploaded_img=$_FILES['g_image'];
                    $target_path = $folder . basename($uploaded_img["name"]);
                    $validatImage['g_image'] = validateFile($target_path,$uploaded_img);
                    //delete the old image and then save the new one locally
                    unlink(ROOT_PATH.$old_path['image_path']); 
                    move_uploaded_file($uploaded_img['tmp_name'], ROOT_PATH.$target_path);
                } else
                    $target_path= $old_path['image_path']; //save the old path to DB in case of no new image


                $query = "UPDATE images SET title=?, description=?, status=?, image_path=?, user_id=? where id=?";
                $result=$conn->prepare($query);
                $result->execute([$title, $description, $status, $target_path, $_SESSION['user']['id'], $id]);
                sleep(1);
                header('location: '.BASE_URL.'/admin/gallery/index.php');
            } else{
                //todo refill the last entered data to continue editing 
                $editedImage['id']=$id;
                $editedImage['title']=$title;
                $editedImage['description']=$description;
                $editedImage['status']=$status;
                $editedImage['image_path']=$target_path;
                //header('location: '.BASE_URL.'/admin/gallery/view.php');
            }
            
    }
?>