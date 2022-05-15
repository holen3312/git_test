<?php
require "login.php";
print_r($_POST);

$id = $_GET["id"];
$post = mysqli_query($db, "SELECT * FROM `posts` WHERE `id` = '$id'");
$post = mysqli_fetch_assoc($post);

?>

<form action="testDb/update.php" method="post">
    <input type="hidden" name="id" value="<?= $post["id"] ?>">
    <p>Title</p>
    <input type="text" name="title" value="<?=$post["title"] ?>">
    <p>Text</p>
    <textarea name="text"><?= $post["text"] ?></textarea>
    <p>category_id</p>
    <input type="number" name="category_id" value="<?=$post["category_id"] ?>">
    <p>author_id</p>
    <input type="number" name="author_id" value="<?=$post["author_id"] ?>">
    <p>views</p>
    <input type="number" name="views" value="<?= $post["views"] ?>"> <br> <br>
    <button type="submit">SAVE UPDATE</button>
</form>
