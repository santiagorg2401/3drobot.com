<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (file_exists($target_file)) {
    //$info = "Sorry, file already exists.";
    $info = "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($imageFileType != "gcode") {
    $info =  "Only gcode files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    
    
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $info =  "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";}
    else {
        $info =  'Sorry, there was an error uploading your file.';
    }
}