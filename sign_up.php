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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="height: 100%;display: flex;justify-content: center;align-items: center;">
        <div class="input-group flex-nowrap" style="width: 20vw;">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap" style="width: 20vw;">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input name="email" type="text" class="form-control" placeholder="email" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap" style="width: 20vw;">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input name="pass" type="text" class="form-control" placeholder="password" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <button>Submit</button>
        <a href="login.php">Login Up</a>
    </form>
</body>

</html>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $user = $_REQUEST['username'];
    if (empty($email)) {
        echo '<script>alert("Please Enter Email")</script>';
    } else {
        $servername = "localhost:3306:/var/lib/mysql/mysql.sock";
        $username = "root";
        $password = "";
        $dbname = "testing";
        
        echo '<script>alert("New Record Created!")</script>';
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "insert into loginTable values('$email','$pass','$user');";
        // $result = $conn->query($sql);
        
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("New Record Created!")</script>';
            $_SESSION["username"] = $user;
            header("Location: /testing/dashboard.php");
        } else {
            echo '<script>alert("Error: " . $sql . "<br>" . $conn->error")</script>';
        }
        $conn->close();
    }
}
?>
