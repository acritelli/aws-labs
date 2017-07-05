<?php

  include '/var/www/config.php';

  $conn = new mysqli($server, $username, $password, $dbname);

  if ($conn->connect_error)
  {
      die("Connection failed: " . $conn->connect_error);
  }

  if(isset($_POST["imageurl"]))
  {
          $sql = "INSERT INTO images VALUES('" . $_POST["imageurl"] . "')";

          if($conn->query($sql) !== TRUE)
          {
                  echo $conn->error;
          }
          else
          {
                  echo "<p>New image updated</p>";
          $conn->close();
          }
  }
  else
  {
          echo "POST not set";
  }
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css">
     <title></title>
   </head>
   <body>

     <div class="header">

       <h1>The Photography Website</h1>

     </div>

     <div id="navBar">
       <div class="navButton">
         <a href="index.php">Home</a>
       </div>
       <div class="navButton">
         <a href="admin.php">Admin</a>
       </div>
     </div>

     <div id="centerPage">
       <form action="admin.php" method="post">
         URL: <input type="text" name="imageurl">
         <input type="submit" value="Submit Image">
       </form>
     </div>

   </body>
 </html>

