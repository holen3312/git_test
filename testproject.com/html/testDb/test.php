<?php
require "../login.php";

$title = $_POST["title"];
$text = $_POST["text"];
$cat = $_POST['category_id'];
$aut = $_POST['author_id'];
$v = $_POST["views"];


$test = mysqli_query($db, "INSERT INTO `posts`(`id`, `title`, `text`, `category_id`, `author_id`, `views`) VALUES (NULL,'$title','$text', $cat, $aut, $v)");
if (!$test) {
    die("error bla");
}

die("ok");