<?php
    if(isset($_POST['btn'])){
        if(isset($_POST['text'])){
            echo $_POST['text'];
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name='text' value="abcdxyz">
        <input type="submit" name='btn'>
    </form>
</body>
</html>