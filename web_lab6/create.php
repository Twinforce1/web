<?php
$connection = mysqli_connect('127.0.0.1',  'root', '', 'task');

if (!$connection) {
    echo 'Не удалось подключиться к БД';
    echo mysqli_connect_error();
    exit();
}


if(isset($_POST['sbm'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $time = date("H:i:s");


    $sql="INSERT INTO BLOG (`title`, `description`, `time`) VALUES ('$title','$description', '$time')";
    mysqli_query($connection, $sql);

    header('location: index.php?page_layout=list');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Post</title>
</head>
<body>


<div id="myDIV" class="header">
    <h2 style="margin:5px">Create Post</h2>
    <br>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Введите title" required>
        <input type="text" name="description" id="description" placeholder="Введите description" required>
        <button id="sbm" name="sbm" class="addBtn" type="submit">Add</button>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="script/ajax.js"></script>
</body>
</html>