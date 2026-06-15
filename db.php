<?php
$server = "127.0.0.1";
$username = "root";
$password = "eve@123";
$dbname = "first1";

$link = mysqli_connect($server, $username, $password);

if (!$link) {
    die('error connect: ' . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!mysqli_query($link, $sql)) {
    echo 'error create db: ' . mysqli_error($link);
}


mysqli_close($link);

$link = mysqli_connect($server, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(15) NOT NULL)";

if (!mysqli_query($link, $sql)) {
    echo 'error create table users: ' . mysqli_error($link);
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    content VARCHAR(400) NOT NULL)";

if (!mysqli_query($link, $sql)) {
    echo 'error create table posts: ' . mysqli_error($link);
}

mysqli_close($link);
?>