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

       <?php

         include '/var/www/config.php';

         $conn = new mysqli($server, $username, $password, $dbname);

         if ($conn->connect_error)
         {
         die("Connection failed: " . $conn->connect_error);
         }

         $sql = "SELECT * FROM images";
         $result = $conn->query($sql);

         if($result->num_rows > 0)
         {
                 while($row = $result->fetch_assoc())
                 {
                         echo "<p><img src=\"" . $row["url"]. "\"></p>";
                 }
         }
         else
         {
                 echo "<p>Looks like we don't have any pictures yet.</p>";

         }
         $conn->close();
       ?>
     </div>

   </body>
 </html>

