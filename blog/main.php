<?php    
    require "header.php";

    $sql = "SELECT title, textDescription, filepath, date, idUser FROM blog";
    $result = $conn->query($sql);

    $article = "<section>";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['idUser'];
            $sql2 = "SELECT username, filepath FROM users WHERE id = $id";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();

            $article .= '<article class="card">
                            <div class="card1">
                                <img src="'.$row2['filepath'].'" alt="User Picture" class="cardUserImg">
                            </div>
                            <div class="card2">
                                <h1 style="color:black;">'.$row2['username'].'</h1>
                                <p>'.$row['title'].'</p>
                                <p>'.$row['textDescription'].'</p>
                                <img class="cardImg" src="'.$row['filepath'].'" alt="">
                            </div>
                            <div class="card3">
                                <p>'.$row['date'].'</p>
                            </div>
                        </article>';
        }
    } else {
        echo "0 results";
    }

    $article .= "</section>";

    echo $article;

    include "footer.php";
?>
