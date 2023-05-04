<?php
require "header.php";

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $file_uploaded = false;
    
    //check if file selected
    if(!empty($_FILES["file"]["tmp_name"])) {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $file_uploaded = true;
        } else {
            echo "Error uploading file";
        }
    }
    
    if(!empty($username) && $file_uploaded) {
        $sql = "UPDATE users SET username = '$username', filepath = '$target_file' WHERE id = $user_id";
    } else if(empty($username) && $file_uploaded) {
        $sql = "UPDATE users SET filepath = '$target_file' WHERE id = $user_id";
    } else if(!empty($username) && !$file_uploaded) {
        $sql = "UPDATE users SET username = '$username' WHERE id = $user_id";
    }
    
    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;  
    }
    $conn->close();
}


?>
<section style="text-align:center;">
<p style="margin-bottom:40px;color:white;">Hello <b style="color:black;"><?= $firstname ." ". $lastname?></b>, here you can edit your profile.</p>
    <article class="profile">
    <img src='<?= $userpic ?>' alt='Profile picture'>
    <div>
        <form enctype="multipart/form-data" class="editProfile" action="#" method="post" onsubmit="return edit()">
            <label for="username"><?= $username ?></label>
            <input type="text" id="username" name="username" placeholder="Change your username">
            <label style="cursor: pointer;" for="file" class="custom-file-upload"><i class="fa-solid fa-image fa-beat" style="color:#2d3436;"></i> Change your Profile Picture</label>
            <input type="file" id="file" name="file" id="file"/>
            <input type="submit" name="submit" value="Edit" style="background-color: #2d3436; color:white;">
        </form>
    </div>
    </article>
    <script src="https://kit.fontawesome.com/32dcd0ccfb.js" crossorigin="anonymous"></script>
</section>

<?php
include "footer.php";
?>