<?php
    if(isset($_POST['name'])){
        print_r($_POST['name']);
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
    <form method ='POST'>
        <input type= text value='abc' name="name[]" onclick="this.form.submit()" readonly/>
        <input type= text value='123' name="name[]" onclick="this.form.submit()" readonly/>

    </form>
</body>
</html>