<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IDZ</title>
</head>
<body>
<h2><p><b> Library </b></p></h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="filename"><br>
    <input type="submit" value="Загрузить"><br>
</form>
<?php
error_reporting(0);
if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
{
    $_FILES["filename"]["name"] = str_replace(' ', '-', $_FILES["filename"]["name"]);
    move_uploaded_file($_FILES["filename"]["tmp_name"], "".$_FILES["filename"]["name"]);
} else {
    echo("File upload error");
}

$dir = ".";
if (is_dir($dir)) {
    $files = scandir($dir);
    $valid_types = array("pdf" , "docx");
    array_shift($files);
    for ($i = 0; $i < count($files); $i++) {
        $path = $dir . "/" . $files[$i];
        $library = substr($files[$i], 1 + strrpos($files[$i], '.'));
        if (in_array($library, $valid_types)) {
            echo "<a href=".$path."> $files[$i]</a></br>";
        }
    }
} else echo $dir . ' there is no such directory<br>';

?>
</body>
</html>