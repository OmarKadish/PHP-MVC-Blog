<?php
//include(ROOT_PATH"");

//getting all the posts form DB along with the writer name
$posts_query = "SELECT p.*, u.photo_path As photo, 
    concat(u.firstName, ' ', u.lastName) AS auther
    FROM posts p
    INNER JOIN users u ON p.user_id=u.id AND p.status =1
    order by created_at DESC
    limit 10";
$result = $conn->prepare($posts_query);
$result->execute();
$posts = $result->fetchall();

//getting all the tags form DB
$tag_query = "SELECT * FROM tags";
$t_res = $conn->prepare($tag_query);
$t_res->execute();
$tagList = $t_res->fetchall();


//open single post in new view.
if (isset($_GET['openpost'])) {
    $curr_id = $_GET['openpost'];
    $query = "SELECT p.*, concat(u.firstName, ' ', u.lastName) AS auther, u.photo_path As photo
        FROM posts p, users u WHERE p.id=? AND p.user_id=u.id";
    $res = $conn->prepare($query);
    $res->execute([$curr_id]);
    $current_post = $res->fetch();
    // increase the view count of the viewed post.
    $query = "UPDATE posts SET view_count=view_count+1 where id=?";
    $conn->prepare($query)->execute([$curr_id]);

    //get tags
    $tag_query = "SELECT * FROM tags where id in(select tag_id FROM post_tag WHERE post_id=?)";
    $t_res = $conn->prepare($tag_query);
    $t_res->execute([$curr_id]);
    $tags = $t_res->fetchall();

    //get comments
    $comment_query = "SELECT * FROM comments WHERE post_id=?";
    $c_res = $conn->prepare($comment_query);
    $c_res->execute([$curr_id]);
    $comments = $c_res->fetchall();

    $related_query = "SELECT DISTINCT p.* FROM posts p
		INNER JOIN post_tag pt ON pt.post_id = p.id 
        AND pt.tag_id IN (SELECT t.id FROM tags t
		INNER JOIN post_tag pt ON t.id = pt.tag_id AND pt.post_id = ?)
       	WHERE p.id != ?;";
    $related = $conn->prepare($related_query);
    $related->execute([$curr_id, $curr_id]);
    $relatedPosts = $related->fetchall();
}

//validate and save new comment linked to the current post.
$name = $email = $content = '';
$validationMsg = array('name' => '', 'email' => '', 'content' => '');
if (isset($_POST['postComment']))//check if the submit button has been pressed.
{
    //validate the name
    if (empty($_POST['name'])) {
        $validationMsg['name'] = 'Please Enter Your Name.';
    } else {
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $validationMsg['name'] = "The Name format is not valid. Must not contain number or special characters";
        }
    }
    //validate the email
    if (empty($_POST['email'])) {
        $validationMsg['email'] = 'Please Enter Your Email.';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validationMsg['email'] = 'The Email is Not Valid!!';
        }
    }
    //validate the content
    if (empty($_POST['content'])) {
        $validationMsg['content'] = 'Please Enter Your Comment.';
    } else {
        $content = $_POST['content'];
        if (!preg_match('/^([a-zA-Z\s\d]+)(\s*[a-zA-Z\s\d]*)*$/', $content)) {
            $validationMsg['content'] = 'Not Valid Content!!';
        }
    }
    if (!array_filter($validationMsg)) {
        //save the data to DB if no errors and refresh the page.
        $sql = "INSERT INTO comments(name, email, content, post_id) VALUES(?,?,?,?)";
        $conn->prepare($sql)->execute([$name, $email, $content, $_POST['currPostid']]);
        header('location: ' . BASE_URL . '/single-post.php?openpost=' . $_POST['currPostid']);
    } else {

        //header('location: '.BASE_URL.'/single-post.php?openpost='.$_POST['currPostid'].'#comment-form');
        //echo error in the form.

    }
}

// To filter results according to the selected tags.
function filterPosts($conn, $tagIds)
{
    $query = "SELECT DISTINCT p.* FROM posts p
		INNER JOIN post_tag pt ON pt.post_id = p.id 
        AND pt.tag_id IN (" . $tagIds . ");";

    $results = $conn->prepare($query);
    $results->execute();
    return $results->fetchall();
}

// To get all posts if no tag selected.
function getAllPosts($conn)
{
    $query = "SELECT * FROM posts";

    $results = $conn->prepare($query);
    $results->execute();
    return $results->fetchall();
}

?>