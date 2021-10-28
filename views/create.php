<?php

include('../model/User.php');
$name = isset($_POST['name']) ? $_POST['name'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$user = new User($name, $age);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <form action="<?php $user->insertUser($user)?>" method="post">
        <input type="text" name="name" id="<?php $name?>">
        <input type="number" name="age" id="<?php $age?>">
        <button type="submit">Submit</button>
    </form>
</body>
</html>