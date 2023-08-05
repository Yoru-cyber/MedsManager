<?php
include 'conn.php';
//Dios si me oyes, perdona este código
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
</head>

<body>
  <div class="container">
    <div class="card">
      <h2>Join the rustacean army !</h2>
      <p>Because the 🦀 will rule them all 👑</p>
      <form method="get" action="conn.php">
        <ul style="list-style: none">
          <li>
            <label for="name">First name: </label>
            <input class="textInput" type="text" name="firstName" inputmode="latin-name" placeholder="Han"
              style="margin: 20px" />
            <label for="lastName">Last name: </label>
            <input name="lastName" class="textInput" type="text" inputmode="latin-name" placeholder="Solo"
              style="margin: 20px" />
          </li>
          <li style="text-align: center">
            <label for="email">Enter your email: </label>
            <input name="email" class="textInput" type="email" placeholder="RustLover1973@gmail.com" inputmode="email"
              style="margin: 20px" />
          </li>
          <li style="justify-content: center; text-align: center">
            <p>I solemnly swear that I give myself upon the crab</p>
            <input type="submit" class="buttonSub" value="🦀" style="justify-content: center" />
          </li>
        </ul>
      </form>
    </div>
    <div class="card" style="margin: 10px">
      <h2>Already registered 📋</h2>
      <ul style="list-style: none">
        <li>
          <?php
          //de todos los métodos, array_column fue el más efectivo puesto que retriveQuery retorna un array
          //no un JSON ni un string, además los array son fácilmente manipulables
          $data = $conn->retriveQuery();
          foreach ($data as list($v1, $v2, $v3)){
            print($v1 . ' ' . $v2 . ' ' . $v3 . '<br>');
          }
          ?>
        </li>
      </ul>
    </div>
  </div>
</body>

</html>