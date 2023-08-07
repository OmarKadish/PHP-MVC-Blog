<?php
    // initializing variables
        $title = $description = '';
        $validatTag = array('title'=>'','description'=>'');

    // Adding New Tag
    if (isset($_POST['addTag'])) {
        // receive all input values from the form
        //validate the title
        if (empty($_POST['title'])) {
            $validatTag['title'] = 'This Field is required.';
        } else{
            $title = $_POST['title'];
            if (!preg_match("/^[a-zA-Z\s\.\,]+$/", $title)) {
                $validatTag['title'] = "Entered value is not Valid.";
            }
        }
        //validate the description is not empty
        if (empty($_POST['description'])) {
            $validatTag['description'] = 'This Field is required.';
        } else{
            $description = $_POST['description'];
            if (!preg_match("/^[a-zA-Z\s\.\,\w]+$/", $description)) {
                $validatTag['description'] = "Entered value is not Valid.";
            }
        }
        // Save the tag if there are no errors in the form
        if (!array_filter($validatTag)) {
            
            $query = "INSERT INTO tags (title, description) 
                    VALUES(?,?)";
            $conn->prepare($query)->execute([$title, $description]);
            header('location: '.BASE_URL.'/admin/tag/index.php');
        } else{
            header('location: '.BASE_URL.'/admin/tag/view.php');
        }
    }

    if(isset($_GET['task'])){

        switch ($_GET['task']) {
            case 'editTag':
                $id= $_GET['tid'];
                $query = "SELECT * FROM tags where id=?";
                $result=$conn->prepare($query);
                $result->execute([$id]);
                $editedTag = $result->fetch();
                break;
            
            case 'delTag':
                $id= $_GET['tid'];
                try {
                    $query = "DELETE FROM tags where id=?";
                    $conn->prepare($query)->execute([$id]);
                    header('location: '.BASE_URL.'/admin/tag/index.php');
                } catch (Exception $e) {
                    echo $e;
                }
                
                break;
            
            default:
                # code...
                break;
        }

    }

    if(isset($_POST['tagEdited'])){
            $id= $_POST['tid'];
            if (empty($_POST['title'])) {
                $validatTag['title'] = 'This Field is required.';
            } else{
                $title = $_POST['title'];
                if (!preg_match("/^[a-zA-Z\s]+$/", $title)) {
                    $validatTag['title'] = "Entered value is not Valid.";
                }
            }
            //validate the Description is not empty
            if (empty($_POST['description'])) {
                $validatTag['description'] = 'This Field is required.';
            }
            $description = $_POST['description'];
            //  else{
            //     $description = $_POST['description'];
            //     if (!preg_match("/^[a-zA-Z\s]+$/", $description)) {
            //         $validatTag['description'] = "Entered value is not Valid.";
            //     }
            // }

            // Save the post if there are no errors in the form
            if (!array_filter($validatTag)) {
                
                $query = "UPDATE tags SET title=?, description=? where id=?";
                $result=$conn->prepare($query);
                $result->execute([$title, $description, $id]);
                header('location: '.BASE_URL.'/admin/tag/index.php');
            } else{
                //todo refill the last entered data to continue editing 
                $editedTag['title']=$title;
                $editedTag['description']=$description;
                header('location: '.BASE_URL.'/admin/tag/view.php');
            }
            
    }

?>