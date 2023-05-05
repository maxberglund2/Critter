<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critter</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <style>
        section, body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: auto;
        }
        fieldset{
            margin: 50px;
            padding: 30px;
            color:white;
            border-color: white;
            border-style: solid;
        }
        input[type="file"] {
            display: none;
        }
        .custom-file-upload, input {
            border: 1px solid #ccc;
            padding: 6px 12px;
            background-color: white;
        }
        .btn {
            background-color: #2d3436;
            border: none;
            color: white;
            padding: 12px 32px;
            margin: 4px 2px;
            cursor: pointer;
        }
        input, label{
            margin: 10px;
        }
        section {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="color:white;text-align:center;">Critter</h1>
    <section>
        <fieldset>
            <legend style="text-align:center;">Log In / Form</legend>
            <form enctype="multipart/form-data" style="text-align:center; display:flex; flex-direction:column;align-items:center;" action="#" onsubmit="return log()" method="post">
                <input type="text" placeholder="Username" name="username" id="username">
                <input type="password" placeholder="Password" name="password" id="password">
                <input type="submit" class="btn" value="Submit" name="Submit">
            </form>
        </fieldset>
        <a  href="signup.php" style="text-decoration: none;">Create an account instead</a>
    </section>
    <script src="https://kit.fontawesome.com/32dcd0ccfb.js" crossorigin="anonymous"></script>
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "critter";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['Submit'])) {
            $username = $_POST['username'];
            $userPassword = $_POST['password'];

            $sql = "SELECT userPassword FROM users WHERE username  = '$username'";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $checkPassword = password_verify($userPassword, $row["userPassword"]);

                if ($checkPassword == true){
                    $sql2 = "SELECT id FROM users WHERE username  = '$username'";
                    $result2 = mysqli_query($conn, $sql2);
        
                    if ($result2 && mysqli_num_rows($result2) > 0) {
                        $row2 = mysqli_fetch_assoc($result2);
                        $_SESSION['user_id'] = $row2['id'];
        
                        header('Location: main.php');
                        exit;
                    } else {
                        echo '<div class="error"><p>Invalid Username or Password.</p></div>';
                    }
                }
            } else {
                echo '<div class="error"><p>Invalid Username or Passord.</p></div>';
            }
        }

    include "footer.php";
    ?>