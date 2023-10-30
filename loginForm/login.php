<?php
session_start();

$email= $_POST['email']??'';
$password= $_POST['password'] ??'';

$errorMessage = '';

if(isset($_SESSION['username'])){
    header('Locaton: index.php');
}

if($email == 'john@doe.com' && $password == '12345') {
    $_SESSION['username'] = 'johndoe';
    header('Location: index.php');
}
else if($email== 'jane@doe.com' && $password == '12345'){
    $_SESSION['username'] = 'janedoe';
    header('Location: index.php');
}
else if($email != '' || $password != ''){
    $errorMessage ='Invalid email or password';
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

    <div class="container" style="margin:0 auto ; max-width:450px; margin-top:150px; box-shadow: 2px     2px 2px   2px rgba(0, 0, 0, 0.2); padding:30px 30px">
         <h2 class=" font-weight-bold" style="font-size:22px;color:#000;font-weight:700">sign in to your account</h2>
        <form action="login.php" method='POST'>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="">
            </div>
            <div style="color:red">
                <?php echo $errorMessage; ?>
            </div>
           

            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">log in</button>
        </form>
    </div>
</body>
</html>