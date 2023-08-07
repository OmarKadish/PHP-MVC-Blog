<?php

    if(isset($_GET['task'])){
        switch ($_GET['task']) {
            case 'view':
                $id= $_GET['mid'];
                $query = "SELECT * FROM messages where id=?";
                $result=$conn->prepare($query);
                $result->execute([$id]);
                $cur_message = $result->fetch();
                //make the msg status readed.
                if ($cur_message['status']==0) {
                    $query = "UPDATE messages SET status=1 where id=?";
                    $result=$conn->prepare($query);
                    $result->execute([$id]);        
                }
                break;
            
            case 'del':
                try{ 
                    $id= $_GET['mid'];
                    $query = "DELETE FROM messages where id=?";
                    $conn->prepare($query)->execute([$id]);
                    header('location: '.BASE_URL.'/admin/message/index.php');
                } catch (Exception $e) {
                    echo $e;
                }
                break;
            
            default:
                sleep(1);
                header('location: '.BASE_URL.'/admin/message/index.php');
                break;
        }
    
    }

?>