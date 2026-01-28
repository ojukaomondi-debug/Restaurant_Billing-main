


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>


<!-- PHP START -->
<?php

include ('../database/db.php');

if(isset($_POST['submit'])){

                    

                        $email = $_POST['email'];
                        $pass = $_POST['pass'];

// Code with HOPE DEVELOPERS


                        $sql = "SELECT * FROM admins where Email = '$email'";
                        $result =  mysqli_query($conn, $sql);


                        $row = mysqli_num_rows($result);

                        if($row>0){

                            $user = mysqli_fetch_assoc($result);
                            $password = $user['Pass'];
                            $user_id = $user['SN'];

                            if($pass != $password){
                                echo"
                                <div class='alert alert-danger' role='alert'>
                                    We could not verify your Password! kindly check and try again!
                                </div>
                                ";
                            }else{
                                header('location: dashboard.php?uid='.$user_id.'');
                                session_start();
                                $_SESSION['user'] = $email;
                            }

                        }else{
                            echo"
                               <div class='alert alert-danger' role='alert'>
                                   Incorrect Email Address! try again
                               </div></br>
                            ";

                        }


}
 
?>

<!-- PHP END -->

<div class="login-container">
    <h2 class="text-center">Admin</h2>
  <p>Login as <a href="../index.php">User</a></p>  
    <form action='index.php' method='POST'>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name='email' id="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name='pass' id="password" placeholder="Enter your password" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <button type="submit" name='submit' class="btn btn-primary">Login</button>
    </form>

    <p>Don't have account yet? <a href="register.php">Register</a></p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
