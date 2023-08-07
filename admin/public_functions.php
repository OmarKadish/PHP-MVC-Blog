<?php

    
    function validateFile($file_to_check,$uploaded_img){
        // Check file size
        if ($uploaded_img["size"] > 500000) {
            return "Sorry, your file is too large.";
        }
        // Allow certain file formats
        $img_extension = strtolower(pathinfo($file_to_check,PATHINFO_EXTENSION));
        $valid_extension = array("png","jpeg","jpg","bmp");
        if(!in_array($img_extension,$valid_extension)) {
            return "Sorry, only JPG, JPEG, PNG & BMP files are allowed.";
        }
        // Check if file already exists
        if (file_exists($file_to_check)) {
            return "Sorry, file already exists.";
        }
    }

?>