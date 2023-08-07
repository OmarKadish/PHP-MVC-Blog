<?php
//Connecting to DataBase using Php Data Object.
/*
 try {
       $dbh = new PDO('mysql:host=localhost;dbname=myblog', 'omar', 'omar123456');
  } catch (PDOException $e) {
       print "Error!: " . $e->getMessage() . "<br/>";
       die();
      }

   //connecting normaly.
   $conn= mysqli_connect('localhost','omar','omar123456','myblog');

   //write query to get all users.
   $sql='select * from users';

   //get the results.
   $result=mysqli_query($conn, $sql);
   //fetch the data rows as an array
   $users=mysqli_fetch_all($result, MYSQLI_ASSOC);

   //free the result from the memory.
   mysqli_free_result($result);

   //closing the connection.
   mysqli_close($conn);
   //print_r($users);
*/

session_start();
//C:\Users\omara\www\collage\MyBlog
define('ROOT_PATH', realpath(dirname(__FILE__)));
//MyBlog/
const BASE_URL = 'http://myblog';
try {
    //connecting using PDO
    $conn = new PDO('mysql:host=myblog;dbname=myblog;charset=utf8', 'omar', 'omar123456');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    header('location: ' . BASE_URL . '/registration/logout.php');
}


?>