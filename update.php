<?php

session_start();
$users = json_decode( file_get_contents('users.json'), true);

echo $_SESSION['email'];

if( !$users[$_SESSION['email']] ){
    echo "Email not found";
}

if ( isset( $_POST['update_role'] ) ){
   $user_email = $_SESSION ['email'];
   $new_role    = $_POST['role'];

   if( isset($users[$user_email] ) ){
    $users[$user_email]['role'] = $new_role;
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
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
               <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <h3>Update Role</h3>
                </div>
                <div class="card-body">
                    <form action="" class="form" method="POST">
                        <input type="text" class="form-control" name="role" placeholder="Role" value="<?php echo $users[$_SESSION['email']]['role']?>">

                        <input class="btn btn-primary" type="submit" name="update_role" value="Update">

                    </form>
                </div>

               </div>
            </div>
        </div>
    </div>
</body>
</html>