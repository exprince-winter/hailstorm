<?php 

$image = $_GET["link"]; //this can also be a url

if (filter_var($image, FILTER_VALIDATE_URL)) {

$filename = basename($image);
$file_extension = strtolower(substr(strrchr($filename,"."),1));
switch( $file_extension ) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpeg"; break;
    default: 
}

$image = file_get_contents($image);
echo $image;
} else {
	die("invaild url.");
}
?>