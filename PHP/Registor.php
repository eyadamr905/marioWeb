<?php
$connection = mysqli_connect('localhost', 'root', '1255', 'Pizza');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST["Username"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Insert data into the table
    $sqlInsert = "INSERT INTO Users (Username, Email, Password) VALUES ('$Username', '$Email', '$Password')";
    mysqli_query($connection, $sqlInsert);

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
<script>alert("Registration successful!")</script>
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
