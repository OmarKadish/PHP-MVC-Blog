<?php
    // initializing variables
        $title = $content = '';
        $status= false;
        $tags=getAllTags($conn);
        
        $validatPost = array('title'=>'','content'=>'');



    // Adding New Post
    if (isset($_POST['addPost'])) {
        // receive all input values from the form
        //validating the data
        validatPost($validatPost,$title,$content);
        $status= $_POST['status'];
        $selected_tag_ids=$_POST['tags'];

        // Save the post if there are no errors in the form
        if (!array_filter($validatPost)) {
            
            $query = "INSERT INTO posts (title, content, status, user_id) 
                    VALUES(?,?,?,?)";
            $conn->prepare($query)->execute([$title, $content, $status, $_SESSION['user']['id']]);
            $last_post_id = $conn->prepare('SELECT LAST_INSERT_ID()')->execute();
            $tagQuery="INSERT INTO post_tag (post_id ,tag_id) VALUES(?, ?)";
            foreach($selected_tag_ids as $id){
                $conn->prepare($tagQuery)->execute([$last_post_id,$id]);
            }

            sleep(1);
            header('location: '.BASE_URL.'/admin/post/index.php');
        } else{
            //header('location: '.BASE_URL.'/admin/post/view.php');
        }
    }

    if(isset($_GET['task'])){

        switch ($_GET['task']) {
            case 'editPost':
                $id= $_GET['pid'];
                $query = "SELECT * FROM posts where id=?";
                $result=$conn->prepare($query);
                $result->execute([$id]);
                $editedPost = $result->fetch();
                $postTags= getPostTags($conn,$id);

                break;
            
            case 'delPost':
                $id= $_GET['pid'];
                try {
                    $query = "DELETE FROM posts where id=?";
                    $conn->prepare($query)->execute([$id]);
                    sleep(2);
                    header('location: '.BASE_URL.'/admin/post/index.php');
                } catch (Exception $e) {
                    echo $e;
                }
                break; 
            default:
                header('location: '.BASE_URL.'/admin/post/index.php');
                break;
        }

    }

    if(isset($_POST['postEdited'])){
            $id= $_POST['pid'];
            //validating the data
            validatPost($validatPost,$title,$content);
            $status= $_POST['status'];
            $selected_tag_ids=$_POST['tags'];
    
            // Save the post if there are no errors in the form
            if (!array_filter($validatPost)) {
                $query = "UPDATE posts SET title=?, content=?, status=?, user_id=? where id=?";
                $result=$conn->prepare($query);
                $result->execute([$title, $content, $status, $_SESSION['user']['id'], $id]);
                // Todo: is there a way to update without deleting all relations and reinsert them.
                //delete the relations between the edited post and tags. Then re insert new ones.
                $res = $conn->prepare("SELECT id from post_tag where post_id=?");
                $res->execute([$id]);
                $old_tags_ids = $res->fetchall();
                foreach($old_tags_ids as $to_del_id){
                    $conn->prepare("DELETE FROM post_tag where id=?")->execute([$to_del_id['id']]);
                }

                $tagQuery="INSERT INTO post_tag (post_id ,tag_id) VALUES(?, ?)";
                //("INSERT INTO post_tag (post_id ,tag_id) VALUES(?, ?)
                //WHERE not exists(select * from post_tag where tag_id=? AND post_id=?)")
                foreach($selected_tag_ids as $tag_id){
                    $conn->prepare($tagQuery)->execute([$id,$tag_id]);
                }
                sleep(1);
                header('location: '.BASE_URL.'/admin/post/index.php');
            } else{
                //todo refill the last entered data to continue editing               
                header('location: '.BASE_URL.'/admin/post/view.php');
            }
            
    }

    function getAllTags($connection){
        $query = "SELECT * FROM tags";
        $result=$connection->prepare($query);
        $result->execute();
        return $result->fetchall(PDO::FETCH_ASSOC);
    }

    function getPostTags($connection, $pid){
        $query = "SELECT * FROM tags where id in(select tag_id FROM post_tag WHERE post_id=?)";
        $result=$connection->prepare($query);
        $result->execute([$pid]);
        
        return $result->fetchall(PDO::FETCH_ASSOC);
    }


    function validatPost(&$validatArr,&$title,&$content){
        //validate the title
        if (empty($_POST['title'])) {
            $validatArr['title'] = 'This Field is required.';
        } else{
            $title = $_POST['title'];
            if (!preg_match("/^[a-zA-Z\s\d\w]+$/", $title)) {
                $validatArr['title'] = "Entered value is not Valid.";
            }
        }
        //validate the Content is not empty
        if (empty($_POST['content'])) {
            $validatArr['content'] = 'This Field is required.';
        } else{
            $content = $_POST['content'];
        }
    }


?>