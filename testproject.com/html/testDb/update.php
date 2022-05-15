<?php
require "../login.php";

$id = $_POST["id"];
$title = $_POST["title"];
$text = $_POST["text"];
$cat = $_POST['category_id'];
$aut = $_POST['author_id'];
$v = $_POST["views"];
//"UPDATE posts SET title = '" . $title . "' WHERE id = " . $id . ";";
$update = mysqli_query($db, "UPDATE `posts` SET `title` = '$title' WHERE `id` = $id");
//var_dump("UPDATE 'test.posts' SET `title`= $title WHERE `id` = $id");
if (!$update) {
    die("error");
}

die("ok");