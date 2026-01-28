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
        $cart = $_POST['p-cart'];
        $price = $_POST['amount'];
        $status = $_POST['status'];



        try{

            $check_u = "SELECT * FROM users where Reg_No = '$reg'";
            $feed = mysqli_query($conn, $check_u);

            $row = mysqli_num_rows($feed);

            if($row>0){
                $sql ="INSERT INTO sales(Reg_No, P_Name, Category, Price,P_Status)
                VALUES('$reg', '$p_name', '$cart', $price, '$status')";
                $result = mysqli_query($conn, $sql); 

                echo'
                <div class="alert alert-success" role="alert">
                    Sales recorded successfully!
                 </div>
                ';

            }else{

                echo'
                <div class="alert alert-warning" role="alert">
                    The user with the Registration <b> '.$reg.' </b> Does not exist in your Database!
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
        <h2 class="text-center mb-4">Sales Form</h2>
        <form class="w-50" action="sales.php" method="POST">
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
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" placeholder="Enter product category" name="p-cart" required>
            </div>
            <!-- Amount -->
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" placeholder="Enter amount" name="amount" required>
            </div>
            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="" selected disabled>Select status</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" name="submit" class="btn btn-primary w-100">Make sale</button>
        </form>
    </div>
 <style>
    
 </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
