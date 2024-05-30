<?php
$connection = mysqli_connect('localhost', 'root', '1255', 'Pizza');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $Email = $_GET["Email"];
    $Password = $_GET["Password"];


    $sqlSelect = "SELECT * FROM Users WHERE Email = '$Email'";
    $result = mysqli_query($connection, $sqlSelect);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if ($Password=== $row['Password']) {
                $targetUrl = "../HTML/Home.html";
                header("Location: $targetUrl");
                exit;
            } else {
                echo '
                <!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf=8">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Login.css">

</head>
<body>
<script>alert("Password Incorrect!")</script>
<div class="wrap">
    <h1>Login</h1>
    <form action="../PHP/Login.php" method="GET">
        <div class="inbox">

            <label>
                <input type="Email" name="Email" id="Email1" required placeholder="Email" autofocus>
            </label>
            <i class="bx bx-envelope"></i>
        </div>

        <div class="inbox">

            <label>
                <input type="Password" name="Password" id="Password1" required placeholder="Password" >
            </label>
            <i class="bx bx-lock-alt"></i>
        </div>

        <button type="submit" class="bton">Login</button>
        <br>
        <a href="../HTML/Registor.html">Sign Up</a>
    </form>
</div>


</body>';

            }
        } else {
            echo '';
            echo '
            <!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf=8">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Login.css">

</head>
<body>
<script>alert("Email Incorrect!")</script>
<div class="wrap">
    <h1>Login</h1>
    <form action="../PHP/Login.php" method="GET">
        <div class="inbox">

            <label>
                <input type="Email" name="Email" id="Email1" required placeholder="Email" autofocus>
            </label>
            <i class="bx bx-envelope"></i>
        </div>

        <div class="inbox">

            <label>
                <input type="Password" name="Password" id="Password1" required placeholder="Password" >
            </label>
            <i class="bx bx-lock-alt"></i>
        </div>

        <button type="submit" class="bton">Login</button>
        <br>
        <a href="../HTML/Registor.html">Sign Up</a>
    </form>
</div>


</body>';
        }

        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    exit;
}
