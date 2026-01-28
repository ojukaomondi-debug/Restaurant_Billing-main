<?php

session_start();
if(!isset($_SESSION['user'])){
    header('location: index.php');
}

include('database/db.php');

$user = $_GET['uid'];


// Select from sales
$sql = "SELECT * FROM users where SN = '$user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$reg = $row['Reg_No'];



// Get sales Data
$sales = "SELECT * FROM sales where Reg_No = '$reg'";
$feed = mysqli_query($conn, $sales);
$rows = mysqli_num_rows($feed);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing & Debt Tracking System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background-color: #007bff;
            color: #fff;
            padding: 60px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .section {
            padding: 40px 0;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h3>Welcome To</h3>
        <h1>LOCAL STUDENT RESTAURANT</h1>
        <p>Track meals, payments, and outstanding bills efficiently.</p>
    </div>
</section>

<?php




//   $get_debt = "SELECT DATEDIFF('2024-11-06 09:34:21', Sales_Date) as Due from Sales Where Reg_No = '$reg'";
//   $get_debt = "SELECT DATEDIFF(now(), Sales_Date) as Due from Sales Where Reg_No = '$reg'";
//   $feed_back = mysqli_query($conn,$get_debt);
//   $row_1 = mysqli_fetch_assoc($feed_back);
// //   $bal = $row_1['Due'];
  
//   $get_status = "SELECT * FROM sales where Reg_No = '$reg'";
//   $q_result = mysqli_query($conn,$get_status);
//   $row_2 = mysqli_fetch_assoc($q_result);

//   $p_state = $row_2['P_Status'];

//   if($p_state = 'unpaid' && $bal >3){
    
//     echo'
//     <div class="alert alert-danger"   role="alert">
//        <p>Some of your Meals are Due kindly repay them</p>
//   </div>
//   ';


//   }

?>




<div class="alert alert-success d-flex flex-column"   role="alert">  
    
   <h1 class="text-center my-4">Available Meals</h1>
   <div class="container  d-flex gap-0.5">
           
       <?php


      $getp = "SELECT * FROM products";
      $result = mysqli_query($conn,$getp);

      while($row = mysqli_fetch_assoc($result)){


       $image = $row['P_Image'];
       $p_name = $row['P_Name'];


      echo'
     
          <div class="col">
                    <img src="'.$image.'" class="img">
                    <div class="title">
                       '.$p_name.'
                    </div>   
            </div>
     
        ';

      }



//  SN
//  P_Name
//  Category
//  Price
//  P_Image
//  Date_In

  

        ?>


    </div>



    <style>

      .img{
        width: 7rem;
        background:#111;
        border-radius:50%;
        height:7rem;
        border:2px solid green;
      }


    </style>





</div>



<div class="alert alert-light">

  <div class="container">
    <h1 class="text-center">LIPA NA MPESA</h1>
    <p class="text-center"> <span class="fw-bold">PayBill:</span>  521533</p>
    <p class="text-center"> <span class="fw-bold">Account No:</span>  Registration Number</p>
  </div>

</div>





<style>
    .hero{
        position: relative;
        background:url('https://i.postimg.cc/GpFNmcn5/gettyimages-1457889029-612x612.jpg');
        padding-bottom:10rem;
     }

     .hero .container{
        position: absolute;
        z-index: 3;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
     }


    .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Change the color and opacity as needed */
        }
  



</style>

<!-- Meal and Billing Section -->
<section class="section" id="meals">
    <div class="container">
        <h2 class="text-center mb-4">My Transactions</h2>
        <table class="table table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Meal Name</th>
                    <th>Date Taken</th>
                    <th>Status</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!--  Meals Taken -->
                <?php
     
                 while($data = mysqli_fetch_assoc($feed)){

                    $meal_name = $data['P_Name'];
                    $date_taken = $data['Sales_Date'];
                    $Status = $data['P_Status'];
                    $amount = $data['Price'];


                    if($Status == 'unpaid'){
                               
                     echo'
                            <tr>
                                <td>'.$meal_name.'</td>
                                <td>'.$date_taken.'</td>
                                <td><span class="badge bg-danger">'.$Status.'</span></td>
                                <td>Ksh '.$amount.'</td>
                           </tr>
 
                             ';
                    }elseif($Status == 'paid'){


                        echo'
                        <tr>
                            <td>'.$meal_name.'</td>
                            <td>'.$date_taken.'</td>
                            <td><span class="badge bg-success">'.$Status.'</span></td>
                            <td>Ksh '.$amount.'</td>
                          </tr>

                         ';

                    }

                     }
                 ?>
            </tbody>
        </table>
    </div>
</section>


<!-- Bills Section -->
<section class="section" id="bills">
    <div class="container">
        <h2 class="text-center mb-4">Outstanding Bills</h2>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Meal Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
        <tbody id="outstandingBills">
            <?php
                $bill = "SELECT * FROM sales where Reg_No = '$reg'";
                $back = mysqli_query($conn, $bill);
            
        
        while($info = mysqli_fetch_assoc($back)){  
                $name = $info['P_Name'];
                $p_price = $info['Price'];
                $p_status = $info['P_Status'];
                $date = $info['Sales_Date'];


                if($p_status == 'unpaid'){
                      echo'
                        <tr>
                            <td>'.$name.'</td>
                            <td>'.$date.'</td>
                            <td>Ksh '.$p_price.'</td>
                            <td><span class="badge bg-danger">'.$p_status.'</span></td>
                        </tr>
                       ';
                   }

                 }

                $total_debt = "SELECT  SUM(Price) AS totalUnpaid FROM Sales Where Reg_No = '$reg' and P_Status = 'unpaid'";
                $unpaid = mysqli_query($conn, $total_debt);
                $debt_data = mysqli_fetch_assoc($unpaid);
                
    


                    $total_bill = $debt_data['totalUnpaid'];
                
                    echo' 
                    <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total Debt:</b></td>
                    <td>'.$total_bill.'</td>
                    </tr>
                ';

                
            ?>
          </tbody>
        </table>
    </div>
</section>


<!-- Payment Section -->
<section class="section bg-light" id="payment">
    <div class="container">
        <h2 class="text-center mb-4">Make a Payment</h2>

        <?php
          echo'
            <form id="paymentForm" action="dash.php?uid='.$user.'" method="POST">
          ';
        ?>
            <div class="mb-3">
                <label for="mealName" class="form-label">Select Meal Name</label>
                 <select name="meal" id="" class="form-control">
                 <option selected>Select Meal</option>
                  <?php
                    $pay = "SELECT * FROM sales where Reg_No = '$reg'";
                    $f_back = mysqli_query($conn, $pay);

                    while($row = mysqli_fetch_assoc($f_back)){

                      $meal =  $row['P_Name'];
                      $status = $row['P_Status'];

                      if($status = 'unpaid'){
                            echo'
                              <option value="'.$meal.'">'.$meal.'<option>
                            ';

                         }

                    }



                  ?>
                 </select>


            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter the amount" required>
            </div>
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Payment Method</label>
                <select class="form-select" id="paymentMethod" name="payment" required>
                    <option selected>Select a method</option>
                    <option value="mpesa">Mpesa</option>
                    <!-- <option value="credit">Credit Card</option> -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="pay">Submit Payment</button>
        </form>
    </div>
</section>

<!-- Footer -->
<section class="footer">
    <div class="container">
        <p>&copy; 2024 Billing & Debt Tracking System. All rights reserved.</p>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for Form Handling (Basic) -->
<!-- <script>
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Payment submitted successfully!');
    });
</script> -->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=+254710142366&text=Hello What do you Serve today?." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<style>
    .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
</body>
</html>
<?php

if(isset($_POST['pay'])){

    $meal_name = $_POST['meal'];
    $amount = $_POST['amount'];
    $p_method = $_POST['payment'];


    // UPDATE table_name     
    // SET column_name1 = new-value1,   
    //         column_name2=new-value2, ...    
    // [WHERE Clause]  

    $Update = "UPDATE sales SET P_Status = 'paid' WHERE P_Name = '$meal_name'";
    $feed = mysqli_query($conn, $Update);


}










?>

