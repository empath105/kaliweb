<?php
$link = mysqli_connect('127.0.0.1', 'root', 'eve@123', 'first1');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_array($result);
$title = $row['title'];
$content = $row['content'];
?>

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
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">    
            <div class="col-12 text-center">
                <div class="post-form-block">
                    <?php 
                        echo"<h1> $title </h1>"; 
                        echo"<p> $content </p>"; 
                    ?>
                    <a href="/index.php" class="btn btn-primary">Back to main</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>