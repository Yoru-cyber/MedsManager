<?php
include 'conn.php';
$conn = new dbConn('localhost', 'root', '', 'myfavBooks');
$conn->connect();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab&display=swap" rel="stylesheet" />
    <title>Rust Army Register</title>
    <title>Rust Register</title>
</head>

<body>
    <div class="container" style=" justify-content: center; flex-direction: column; align-items: center; justify-content: center;">
        <h1 id="delH1">So, you wanna leave</h1>
        <img id="Ferris" src="styles\img\rustaceanAgressive.png" style="width = 100%; height: 20vh;">
        <h2 id="delH2">It's alright, we'll miss you tho...</h2>
        <div class="card" id="cardDelete">
            <form action="deleteInfo.php" method="POST">
            <label for="email">Your email: </label>
            <input class="textInput" type="text" name="userEmail" inputmode="email" required style="margin: 10px"/>
            <button type="submit" onsubmit="<?php if(isset($_POST['userEmail'])){
            $userEmail = $_POST['userEmail'];
            $conn->deleteInfo($userEmail);
            } ?>">Delete</button>

            </form>
        </div>
    </div>
</body>

</html>