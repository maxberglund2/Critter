<?php
require 'header.php';
?>

<section>
    <h1 style="color:white;">Create your post!</h1>
    <br>
    <form enctype="multipart/form-data" class="blogPost" action="#" method="post" onsubmit="return blog()">
        <input type="text" placeholder="Title" name="title" id="title">
        <br>
        <textarea id="desc" name="description"></textarea>
        <br>
        <div>
            <label style="cursor: pointer;" for="file" class="custom-file-upload"><i class="fa-sharp fa-solid fa-plus fa-beat" style="color: white;"></i></label>
            <input type="file" name="file" id="file">
            <label style="cursor: pointer;" for="Submit" class="custom-file-upload"><i class="fa-sharp fa-solid fa-paper-plane fa-beat" style="color: white;"></i></label>
            <input type="submit" value="Submit" name="Submit" id="Submit">
        </div>
    </form>
</section>

<script src="https://kit.fontawesome.com/32dcd0ccfb.js" crossorigin="anonymous"></script>

<?php
include 'footer.php';

if (isset($_POST['Submit'])) {
    $title = $_POST["title"];
    $textDescription = $_POST["description"];
    $file = $_FILES["file"]["name"];
    $target_dir = "img/";
    $target_file = $target_dir . basename($file);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    $sql = "INSERT INTO blog (title, textDescription, filepath, idUser) 
    VALUES ('$title', '$textDescription', '$target_file', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        header("Location: main.php");;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
