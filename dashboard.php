<?php
    session_start();
    if(!$_SESSION["username"]){
        header("Location: /testing/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="testing.js"></script> 
</head>
<body style="height: 100%;">
    <div>
        <h4>
            Hello -> <?php echo $_SESSION["username"];?>
        </h4>
    </div>
</body>
</html>
