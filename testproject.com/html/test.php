<?php

require "login.php";

$id = $_GET["id"];
$post = mysqli_query($db, "SELECT * FROM `posts` WHERE `id` = '$id'");
$post = mysqli_fetch_assoc($post);
?>

<h1><?= $post["title"] ?></h1>
    <p><?= $post["text"] ?></p>


<ul>

    <?php
    $comments = mysqli_query($db, "SELECT * FROM `commends` WHERE `title_id` = '$id'");
    $comments = mysqli_fetch_all($comments);
    foreach ($comments as $comment){
        ?>
        <li><?= $comment["1"] ?></li>
    <?php }
    ?>


</ul>
