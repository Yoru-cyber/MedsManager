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
      <form method="get" action="index.php">
        <ul style="list-style: none">
          <li>
            <label for="name">First name: </label>
            <input class="textInput" type="text" name="firstName" inputmode="latin-name" placeholder="Han"
              style="margin: 20px" required />
          </li>
          <li>
          <label for="lastName">Last name: </label>
            <input name="lastName" class="textInput" type="text" inputmode="latin-name" placeholder="Solo" style="margin: 20px" required />
             
          </li>
          <li style="text-align: center">
            <label for="email">Enter your email: </label>
            <input name="email" class="textInput" type="email" placeholder="RustLover1973@gmail.com" inputmode="email"
              style="margin: 20px" required />
          </li>
          <li style="justify-content: center; text-align: center">
            <p>I solemnly swear that I give myself upon the crab</p>
            <input type="submit" class="buttonSub" value="🦀" onsubmit="<?php if (isset($_GET["firstName"]) && isset($_GET["lastName"]) && isset($_GET["email"])) {
              $userName = $_GET["firstName"];
              $userLastname = $_GET["lastName"];
              $userEmail = $_GET["email"];
              $conn->insertQuery($userName, $userLastname, $userEmail);
            }
            ?>" style="justify-content: center" />
          </li>
        </ul>
      </form>
    </div>
    <div class="card" style="margin-top: 20px; margin-bottom: 10px; padding: 5px">
      <h2>Already registered 📋</h2>
      <ul style="list-style: none; display:flex; flex-direction: column; justify-content: center; margin: 10px; padding: 0px;">

        <?php
        //de todos los métodos, array_column fue el más efectivo puesto que retriveQuery retorna un array
        //no un JSON ni un string, además los array son fácilmente manipulables
        $data = $conn->retriveQuery();
        foreach ($data as list($v1, $v2, $v3)) {
          print('<li style="Margin: 5px;">' . $v1 . ' ' . $v2 . ' ' . $v3 . '</li>');
        }
        ?>

      </ul>
    </div>
    <a class="deleteInfo" href="deleteInfo.php">Delete my info</a>
  </div>
</body>

</html>