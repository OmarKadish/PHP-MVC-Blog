<?php
require("config.php");
include 'controllers/post_controller.php';

if (isset($_GET['ids'])) {
    $tagIds = $_GET['ids'];
    $filteredPosts = filterPosts($conn, $tagIds);
} elseif (isset($_GET['all'])) {
    $tagIds = $_GET['all'];
    $filteredPosts = getAllPosts($conn);
}

foreach ($filteredPosts as $post) {
    echo '<li class="cards_item">
                   <div class="card">
                   <div class="card_image">
                       <a href="single-post.php?openpost=' . $post['id'] . '">
                              <img src="' . BASE_URL . $post['header_photo'] . '" class="img-responsive" alt="Blog Image">
                       </a>
                   </div>
                   <div class="card_content">
                        <h2 class="card_title"><a href="single-post.php?openpost=' . $post['id'] . '">' . $post['title'] . '</a></h2>
                        <div class="blog-post-des">
                        <p class="card_text">' . substr(strip_tags($post['content']), 0, 150) . '</p>
                        <a style="display: block" href="single-post.php?openpost=' . $post['id'] . '" class="btn btn-default">Read More</a>
            <div/>
        </div>
        </div>
        </li>';
}

?>