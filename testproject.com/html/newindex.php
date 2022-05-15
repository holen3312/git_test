<?php
require __DIR__ . "/../redbean/newDb.php";

$user = R::dispense("users");
var_dump($user);

