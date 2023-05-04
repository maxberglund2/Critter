<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "critter";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT username, firstname, lastname, filepath FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$userpic = $row['filepath'];

function logoutFunc() {
    session_start();
    session_destroy();
    header("Location: login.php");
  }

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Critter</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
    <link rel='stylesheet' href='css/reset.css'>
    <link rel='stylesheet' href='css/style.css'>
    <script src='js/script.js' defer></script>
</head>
<body>
    <header>
        <nav>
            <h1 style='font-size: 50px'>Critter</h1>
            <div class='navOp'>
            <a href='main.php'>Forum</a>
            <a href='post.php'>Post</a>
            <a href='profile.php'>Profile</a>
            </div>
            <div class='hide'>
                <form method='post' action='logout.php'>
                    <button type='submit' class='logoutButton'>Log out</button>
                </form>
                <img src='$userpic' alt='Profile picture'>
            </div>
        </nav>
    </header>";
?>