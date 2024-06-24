<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> THE BLENDED HOUSE</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    

     <!-- css class -->
     <link rel="stylesheet" href="style.css">
     <style>
.check a{
  text-decoration: none;
  color: white;
}
</style> 
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg  sticky-top">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="project.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="beverages.php">BEVERAGES</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-dark" href="./users_area/contactus.php">CONTACT</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-dark" href="./aboutus.php">About_us</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-dark" href="cart.php"><i class="fas fa-shopping-cart "></i><sup><?php  cart_item();?></sup></a>
        </li>
      </ul>
      <ul class="navbar-nav ">
      <?php
        if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <h5><a class='nav-link text-light btn btn-success border border-dark mt-2' href='#'>Guest</a></h5>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <h5><a class='nav-link   text-light btn btn-success border border-dark mx-2 mt-2' href='./users_area/profile.php'>".$_SESSION['username']." </a></h5>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <h5><a class='nav-link   text-light btn btn-success mx-3 border border-dark mt-2' href='./users_area/user_login.php'>LOGIN</a></h5>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <h5><a class='nav-link   text-light btn btn-success border border-dark mx-2 mt-2' href='./users_area/logout.php'>LOGOUT</a><h5>
        </li>";
        }

      ?> 
  </ul>
    </div>
  </div>
</nav>
<!-- calling cart function -->
 <?php
 cart();
 ?>

<!-- third child -->
<div class="bg-light">
  <h3 class="text-center text-dark">All Products</h3>
  <p class="text-center text-dark">Our goal is to provide best taste and service to you </p>
</div>

<!-- fourth child-table -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
                <!--php code to display dynamic data -->
                <?php
                global $con;
                $get_ip_add = getIPAddress();
                $total_price=0;
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows( $result);
                if($result_count>0){
                    echo " <thead class='text-dark'>
                    <tr>
                        <th>Product title</th>
                        <th>Product image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>";
  
                while($row=mysqli_fetch_array($result)){
                  $product_id=$row['product_id'];
                  $select_products="Select * from `product` where product_id='$product_id'";
                  $result_products=mysqli_query($con,$select_products);
                  while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['product_image1'];
                    $product_values=array_sum($product_price);
                    $total_price+=$product_values;
                 
                ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50 "></td>
                    <?php
                     $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                     $quantities=$_POST['qty'];
                     $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                     $result_product_quantity=mysqli_query($con,$update_cart);
                     $total_price=$total_price*$quantities;
                    }
                    ?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                       <!--<button>update</button>-->
                       <input type="submit" value="Update cart" class="btn btn-dark px-3 py-2 border-2 mx-3" 
                       name="update_cart">
                       <!--<button>remove</button>-->
                       <input type="submit" value="Remove cart" class=" btn btn-dark px-3 py-2 border-2 mx-3" 
                       name="remove_cart">
                    </td>
                </tr>
                <?php
                  }
                }
                }
                else{
                  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
                <?php
                $get_ip_add = getIPAddress();
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows( $result);
                if($result_count>0){
                  echo " <h4 class='px-3'>Sub total:<strong class='text-dark'> <span>&#8377;</span>$total_price</strong></h4> 
                  <input type='submit' value='Continue shopping' class='btn btn-dark  px-3 py-2 border-0 mx-3' 
                       name='Continue_shopping'>";
                    echo"<button class='check btn btn-dark  px-3 py-2 border-0 mx-3'><a href='./users_area/checkout.php'>Checkout</a></button>";
                     
                    
                }else{
                  echo "<input type='submit' value=Continue shopping class='px-2 py-2 border-0 mx-3' 
                  name='Continue_shopping'>";
                }
                if(isset($_POST['Continue_shopping'])){
                  echo "<script>window.open('project.php','_self')</script>";
                }
              
                ?>
        </div>
    </div>
</div>
</form>

<!-- function to remove item -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
} 

// Call the function
remove_cart_item();
?>

<!-- last child -->
<!-- include footer-->
<?php
include("./includes/footer.php");

?>
    </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
 crossorigin="anonymous"></script>
</body>
</html>