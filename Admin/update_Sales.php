<?php


session_start();
if(!isset($_SESSION['user'])){
  header('location: index.php');
}

include('databases/connect.php');


// Insert form data into sales table

    if(isset($_POST['submit'])){

        $reg = $_POST['reg-no'];
        $p_name = $_POST['p-name'];
        $price = $_POST['amount'];
     
        try{

            $check_u = "SELECT * FROM sales where Reg_No = '$reg'";
            $feed = mysqli_query($conn, $check_u);

            $row = mysqli_num_rows($feed);

            if($row>0){

              $rows = mysqli_fetch_assoc($feed);
              $status = $rows['P_Status'];

              if($status == 'unpaid'){

                $sql = "UPDATE sales SET P_Status = 'paid' WHERE Reg_No = '$reg'";
                mysqli_query($conn,$sql);

              echo'
                <div class="alert alert-success" role="alert">
                    Payment recorded successfully!
                 </div>
                ';
              }else{
                echo'
                    <div class="alert alert-warning" role="alert">
                        The user with the Registration number Does not have unpaid meals
                    </div>
                ';
              }

            

            }else{

              echo'
              <div class="alert alert-danger" role="alert">
                The Payment your are trying to make doesnt exist in your debt table
              </div>
             ';

            }


          
        }catch(mysqli_sql_exception){

            echo'
                <div class="alert alert-danger" role="alert">
                  There was an error kindly contact the administrator!
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
    <title>Product Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 d-flex align-items-center justify-content-center flex-column">
        <h2 class="text-center mb-4">Payment Form</h2>
        <form class="w-50" action="update_sales.php" method="POST">
            <!-- Registration Number -->
            <div class="mb-3">
                <label for="registrationNumber" class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="registrationNumber" placeholder="Enter registration number" name="reg-no" required>
            </div>
            <!-- Product Name -->
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="p-name" required>
            </div>
            <!-- Category -->
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" placeholder="Enter amount" name="amount" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit" class="btn btn-primary w-100">Make Payment</button>
        </form>
    </div>
 <style>
    
 </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
