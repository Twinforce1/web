<?php
$get_id=$_GET['id'];
$dom = new DOMDocument();
$dom->load('data/data.xml');
$products = $dom->getElementsByTagName('posts')->item(0);
$product=$products->getElementsByTagName('post');
$index = $product->length;

if(isset($_POST['sbm'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $new_prd = $dom->createElement('post');

    $node_id = $dom->createElement('id', $get_id);
    $new_prd->appendChild($node_id);

    $node_title= $dom->createElement('title', $title);
    $new_prd->appendChild($node_title);

    $node_description = $dom->createElement('description', $description);
    $new_prd->appendChild($node_description);

    $time = date("H:i:s");
    $node_time = $dom->createElement('time', $time);
    $new_prd->appendChild($node_time);

    if (strlen($title) <= 3) {
        header('location: index.php?page_layout=create');
        exit("Enter title, which len more than 3");
    }

    if (strlen($title) >=  15) {
        header('location: index.php?page_layout=create');
        exit("Enter title, which len less more than 15");
    }

    if (strlen($description) <=  5) {
        header('location: index.php?page_layout=create');
        exit("Enter description, which len more than 5");
    }

    if (strlen($description) >=  30) {
        header('location: index.php?page_layout=create');
        exit("Enter description, which len less than 30");
    }

    $products->replaceChild($new_prd,$product->item($get_id - 1));

    $dom->formatOutput=true;
    $dom->save('data/data.xml')or die('Error');
    header('location: index.php?page_layout=list');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Task</title>
</head>
<body>


<div id="myDIV" class="header">
    <h2 style="margin:5px">Список дел</h2>
    <br>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Введите title" required>
        <input type="text" name="description" id="description" placeholder="Введите description" required>
        <button name="sbm" class="addBtn" type="submit">Update</button>
    </form>
</div>

</body>
</html>