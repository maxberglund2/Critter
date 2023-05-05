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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
body{
    padding: 0;
    background-color: #2d3436;
    display: flex;
    min-height: 100vh;
    justify-content: center;
    align-items: center;
}
h1, p, a {
    margin: 10px;
}
.welcome{
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #eb6778;
    color: white;
    width: 400px;
    height: auto;
    text-align:justify;
    padding: 40px;
    border-radius: 10px;
}
.welcome>h1 {
    font-size: xx-large;
}
.welcome>div {
    display: flex;
    justify-content: center;
}
a{
    background-color: #2d3436;
    padding: 12px;
    border: none;
    color: white;
    text-align: center;
    border-radius: 5px;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
}

</style>
<body>
    <article>
        <div class="welcome">
            <h1>Welcome!</h1>
            <p>Welcome to Critter, the online community for bloggers of all types! Our platform is designed to help you share your voice with others and connect with a like-minded community of creators. To get started, please log in or sign up to create your account. By signing up, you'll be able to start publishing your own blog posts and engage with other members of the community.</p>
            <br>
            <div>
                <a href="login.php">Log in</a>
                <a href="signup.php">Sign in</a>
            </div>
        </div>
    </article>
</body>
</html>