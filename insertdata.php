<?php
require_once 'db.php';
//echo $getcontent;
for ($i = 1; $i <= 30; $i++) {
    $getcontent = file_get_contents("https://loripsum.net/api/3/short", true);
    $insert = "INSERT INTO `posts` VALUES (NULL,?,default)";
    $query = $connect->prepare($insert);
    $query->bind_param('s', $getcontent);
    $error = $query->execute();
    if ($error) echo "done $i" . "<br/>";
}
