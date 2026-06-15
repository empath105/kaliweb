<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EgorovaIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand d-flex align-items-center gap-3">
                <img src="3.jpeg" alt="logo" class="me-2">
                <span class="text-light">History</span>
            </a>
            <?php
                if(isset($_COOKIE['User'])):
            ?> 
                <form action="/logout.php" method="POST" class="d-flex">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            <?php
            endif;
            ?> 
        </div>
    </nav>
    <div class="container">
        <div class="story-container">
            <div class="story-text">
                <p>dgdgdgdgdg dbdbbbbbbbbbbbbbbbbbbbbb dbdbdbf fhrhhhhf fhfhfhhfhfhf fhfhfhfhfh fhfhfhfhhf fhfhf b b bb b hhhhhh h h h gg g g gggggg ggggg hgchhchchc </p>
            </div>
            <img src="1.jpeg" alt="фото" class="hacker-img">
        </div>

        <div class="text-center mt-4">
            <button id="toggleButton" class="btn btn-primary">Open</button>
        </div>

        <div id="extraImage" class="mt-3 text-center" style="display: none;">
            <img class="hacker-img" src="2.jpeg" alt="photo2">
        </div>
        <div class="post-form-block">
            <h3 class="text-center mb-3">Add New Post</h3>
            <form action="profile.php" id="postForm" class="d-flex flex-column gap-2" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label" for="postTitle">Post Title</label>
                    <input type="text" name="postTitle" class="form-control custom-input" id="postTitle" placeholder="Enter post Title" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="postContent">Post Content</label>
                    <textarea name="postContent" class="form-control custom-input" id="postContent" placeholder="Enter post Content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="file">Upload file</label>
                    <input type="file" name="file" class="form-control custom-input" id="file">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Save Post</button>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>

<?php

if (!isset($_COOKIE['User'])) {
    header("Location: /login.php");
    exit(); 
}

require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'eve@123', 'first1');

if (isset($_POST['submit'])) {
    $title = $_POST['postTitle'];
    $content = $_POST['postContent'];

    if (!$title || !$content) die('no data post');

    $sql = "INSERT INTO posts(title, content) VALUES ('$title', '$content')";
    
    if (!mysqli_query($link, $sql)) die('error insert data post');

    if (!empty($_FILES["file"])) {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 1024000000)) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "load in: " . "upload/" . $_FILES["file"]["name"];
        } else {
            echo "upload failed";
        }
    }
}
?>