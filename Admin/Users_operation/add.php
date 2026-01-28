
<?php

session_start();
if(!isset($_SESSION['user'])){
  header('location: index.php');
}

include('../databases/connect.php');

if(isset($_POST['add'])){

  $First_name = $_POST['f-name'];
  $Last_name = $_POST['l-name']; 
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $reg_no = $_POST['reg-no'];
  $course = $_POST['course'];
  $User_pass = $_POST['pass'];
  

  $sql = "INSERT INTO users (First_Name,Last_Name,  Reg_No,  Course, Email, Phone, Pass)
  values ('$First_name','$Last_name','$reg_no','$course', '$email','$phone', '$User_pass')";


try{
   mysqli_query($conn, $sql);
   echo'
   <div class="alert alert-success container w-50" role="alert">
      User Added Successfully
    </div>
   
   ';
}catch(mysqli_sql_exception){
      echo'
      <div class="alert alert-danger container w-50" role="alert">
      User already exist!
    </div>
    ';

}
  
}









?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enhanced Capture Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 600px;
      margin: 50px auto;
    }
    .form-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #007bff;
      margin-bottom: 20px;
      text-align: center;
    }
    .btn-custom {
      background-color: #007bff;
      border: none;
      color: white;
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="form-container">
    <h2 class="form-title">Adding User</h2>
    <form action="add.php" method="POST">
      <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="f-name" placeholder="Enter First Name">
      </div>

      <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="l-name" placeholder="Enter Last Name">
      </div>

      <div class="mb-3">
        <label for="regNo" class="form-label">Registration Number</label>
        <input type="text" class="form-control" id="regNo" name="reg-no" placeholder="Enter Registration Number">
      </div>

      <div class="mb-3">
        <label for="course" class="form-label">Course</label>
        <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="password" placeholder="Enter Password">
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-custom w-100" name="add">Submit</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
