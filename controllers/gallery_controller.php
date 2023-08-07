<?php 
    //include(ROOT_PATH"");

    //getting all the images form DB along with the uploader name
    $img_query = "SELECT i.*, concat(u.firstName, ' ', u.lastName) AS uploade
    FROM images i
    INNER JOIN users u ON i.user_id=u.id
    order by created_at DESC";
    $result= $conn->prepare($img_query);
    $result->execute();
    $images = $result->fetchall();



?>