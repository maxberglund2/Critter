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
            border-color: white;
            border-style: solid;
        }
        input[type="file"] {
            display: none;
        }
        .custom-file-upload, input {
            border: 1px solid #ccc;
            padding: 6px 12px;
            
            background-color:white;
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
            <legend style="color:white;text-align:center;">Sign Up / Form</legend>
            <form enctype="multipart/form-data" style="text-align:center; display:flex; flex-direction:column;align-items:center;" action="#" method="post" onsubmit="return reg()">
                <input type="text" placeholder="Username" name="username" id="username">
                <input type="text" placeholder="First Name" name="fname" id="fname">
                <input type="text" placeholder="Last Name" name="lname" id="lname">
                <input type="password" placeholder="Password" name="password" id="password">
                <label style="cursor: pointer;" for="file" class="custom-file-upload"><i class="fa-solid fa-image fa-beat" style="color: #000000;"></i> Upload an Image</label>
                <input type="file" name="img" id="file"/>
                <input type="submit" class="btn" value="Submit" name="Submit">
            </form>
        </fieldset>
       <a  href="login.php" style="text-decoration: none;">Already have an account</a>
    </section>
    <script src="https://kit.fontawesome.com/32dcd0ccfb.js" crossorigin="anonymous"></script>
    <?php
        if(isset($_POST['Submit']))
        { 
  
            $nickname = $_POST["username"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $pword = $_POST["password"];
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "critter";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $encryptedP = password_hash($pword, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (username, firstname, lastname, userPassword, filepath)
            VALUES ('$nickname', '$fname', '$lname', '$encryptedP', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['filepath'] = $target_file;
                header("Location: main.php");
                exit();
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
        }
    include "footer.php";
?>