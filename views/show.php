<?php
include('../model/User.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <table>
        <thead>
            <th>Name</th>
            <th>Age</th>
        </thead>
        <tbody>
            <?php
                $id = $_GET['id'];
                $user = new User();
                $user->searchUserById($id);
            ?>
        </tbody>
    </table>
</body>
</html>