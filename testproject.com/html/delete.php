<?php
require "login.php";

$id = $_GET["id"];

$delete = mysqli_query($db, "DELETE  FROM `posts` WHERE `id` = $id");

if (!$delete) {
    die("error");
}

die("ok");