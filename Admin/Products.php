<?php
session_start();
if(!isset($_SESSION['user'])){
  header('location: index.php');
}

include('databases/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steve Flavour Restaurant</title>
    <link rel="stylesheet" href="Assets/Css/user.css">
    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    
</head>
<body>
    <div class="container">       
              <!-- Start of Top -->
                <div class="top top-main">                      
                            <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                            </button>

                            <div class="top-hero">
                              <!-- <div class="logo">
                              </div> -->
                              <h1>Steve Flavour Restaurant</h1>
                          </div>

                       <!-- Top right -->
                       <div class="top-right">
                            <!-- Theme toggler -->
                            <div class="theme-toggler">
                                  <span class="material-icons-sharp active">light_mode</span>
                                  <span class="material-icons-sharp">dark_mode</span>                    
                            </div>

                            <!-- Profile -->
                            <div class="profile">
                                <div class="info">
                                  <p>Hello, <b>Stephine</b></p>
                                  <small class="text-muted">Admin</small>
                                </div>
                                <div class="profile-photo">
                                  <img src="Assets/images/steve.jpg" alt="">
                               </div>
                           </div> 

                       </div>
              </div>
              <!-- End of Top -->

        <!-- Start of Aside -->
        <aside>

              <div class="top">
                <div class="close" id="close-btn">
                    <!-- <span class="material-icons-sharp">close</span> -->
                </div>   
              </div>

              <div class="sidebar">

                  <a href="users.php" class="active">
                    <span class="material-icons-sharp">people_alt</span>
                    <h3>Users</h3>
                  </a>

                  <a href="products.php">
                    <span class="material-icons-sharp">storefront</span>
                    <h3>Products</h3>
                  </a>

                  <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                  </a>

                  <a href="#">
                    <span class="material-icons-sharp">analytics</span>
                    <h3>analytics</h3>
                  </a>

                  <a href="votes.php">
                    <span class="material-icons-sharp">shopping_cart_checkout</span>
                    <h3>Orders</h3>
                  </a>

                  <a href="sales.php">
                    <span class="material-icons-sharp">local_shipping</span>
                    <h3>Sales</h3>
                  </a>

                  <!-- <a href="#">
                    <span class="material-icons-sharp">edit_calendar</span>
                    <h3>Documents</h3>
                  </a> -->


                  <a href="#">
                    <span class="material-icons-sharp">person_search</span>
                    <h3>Search Users</h3>
                  </a>

                  <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                  </a> 
                  
                  <a href="users_operation/add.php">
                    <span class="material-icons-sharp">add</span>
                    <h3>Add User</h3>
                  </a>
                
                  <a class="last" href="settings/logout.php" target="_self">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                  </a>
              </div>
        </aside>
   <!-- End of Aside -->

    <main>

    <div class="title-sec">
      <h1>Your Stock</h1>
      <a href="dashboard.php" class ="home-btn"><button>Home</button></a>  
    </div>

    <div class="add-btn">
      <a href="product_operation/add.php"><button>Add Product</button></a>
    </div>



        <div class="table-cont">
               <table class="users-t">
                          <thead>
                              <th>SN</th>
                              <th>Product_Name</th>
                              <th>Category</th>
                              <th>Price</th>                           
                              <th>Product Image</th>
                              <th>Operation</th>    
                          </thead>
                          <tbody>

                          <?php
                             $sql = "SELECT * from products";
                               $result =mysqli_query($conn, $sql);
                               while($row = mysqli_fetch_assoc($result)){
                                    $SN = $row['SN'];
                                    $P_name = $row['P_Name'];
                                    $Category = $row['Category'];
                                    $Price = $row['Price'];
                                    $P_Image = $row['P_Image'];
                                  echo '
                                        <tr>
                                            <td>'.$SN.'</td>
                                            <td>'.$P_name.'</td>
                                            <td>'.$Category.'</td>
                                            <td>$ '.$Price.'</td>
                                            <td><img class="display-img" src="'.$P_Image.'"></td>
                                            <td class="operations">
                                                <a href="product_operation/update.php? updateid='.$SN.'"><button class="update">Update</button></a>
                                                <a href="product_operation/delete.php? deleteid='.$SN.'"><button class="delete">Delete</button></a>
                                            </td>                                      
                                        </tr>
                                    
                                    ';
                               }  
                             
                           ?>


                         </tbody>
                      </table>
              </div>     
      </main>                                     
  </div>


   <style>
     .display-img{
      width: 100px;
       height:auto;
     }
  </style>
      <script src="Assets/Js/dashboard.js"></script> 
  </body>
</html>

<!-- 1:23:28 -->