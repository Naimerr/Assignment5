<?php
session_start();
$usersFile='users.json';

$users= file_exists($usersFile)?json_decode(file_get_contents($usersFile),true):[];

function saveUsers($users,$file){
    file_put_contents($file, json_encode($users,JSON_PRETTY_PRINT));
}

// Registration form handling

if (isset($_POST['register'])){
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
}

// Validation

if(empty($username) || empty($email) || empty($password)){
    $errorMessage= "Please fill the all fields";
}
else{
    if(isset($users[$email])){
        $errorMessage = "Email Already Exists";
    }
    else{
        $users[$email] =[
           ' username'=> $username,
           'password' =>$password,
           'role'     => '',
            
        ];

        saveUsers($users,$usersFile);
        $_SESSION['email'] = $email;
        header('Location: update.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration and Login</title>
    <!-- Essentials Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ruda:wght@400;600;700&display=swap');
        * {
          font-family: 'Ruda', sans-serif;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
    "></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
             <div class="col-md-8 mx-auto">
                <h2 class="text-center mb-5">
                    Role Management App
                </h2>
                <div class="card shadow-sm">
                   <div class="card-header d-flex justify-content-between">
                    <h3>User Registration</h3>
                    <a href="login.php" class="btn btn-primary text-white">Already have an account</a>
                   </div>
                  <div class="card-body">
             
                    <form action="" method="post">
                        <input type="text" class="form-control" name="username" placeholder="Username"><br>
                        <input type="email" class="form-control" name="email" placeholder="Email"><br>
                        <input type="password" class="form-control" name="password" placeholder="Password"><br>
                        <input type="hidden"  name="role" value=""><br>
                        <?php
                        if(isset($errorMessage)){
                            echo "<p>$errorMessage</p>";
                        }
                        ?>
                        <input type="submit" class="btn btn-primary" name="register" placeholder="Register">
                       
                    </form>
                  </div>

                </div>
             </div>
        </div>
    </div>
</body>
</html>