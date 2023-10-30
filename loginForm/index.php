<?php
session_start();
if(!isset($_SESSION ['username'])){
   header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>LOGIN FORM</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container mx-auto">
      <?php
         echo 'welcome' . $_SESSION['username'];
         echo "<br>";
         echo "Logout <a href='logout.php'>here</a>"
      ?>
  </div>
</body>
</html>
