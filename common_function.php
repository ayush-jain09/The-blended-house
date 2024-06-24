<?php



//getting products
function getproducts(){
    global $con;
    if(!isset($_GET['categories'])){
    $select_query="Select * from `product` order by rand() limit 0,6";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $categories_id=$row['categories_id'];
      echo"<div class='col-md-4 mb-2'>
      <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h3 class='card-title  text-dark'>$product_title</h3>
              <p class='card-text  text-dark'>$product_description</p>
              <p class='card-text  text-dark'>Price: <span>&#8377;</span> $product_price/-</p>
              <a href='project.php?add_to_cart=$product_id' class='btn'>Add to cart</a>
            </div>
        </div>
      </div>";
    }
}
}
//getting all products
function get_all_products(){
    global $con;
    if(!isset($_GET['categories'])){
    $select_query="Select * from `product` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $categories_id=$row['categories_id'];
      echo"<div class='col-md-4 mb-2'>
      <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='project.php?add_to_cart=$product_id' class='btn'>Add to cart</a>
            </div>
        </div>
      </div>";
    }
}
}

//getting unique categories
function get_unique_categories(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['categories'])){
    $categories_id=$_GET['categories'];
    $select_query="Select * from `product` where categories_id=$categories_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>Sorry! Currently Not Available</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $categories_id=$row['categories_id'];
      echo"<div class='col-md-4 mb-2'>
      <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='project.php?add_to_cart=$product_id' class='btn'>Add to cart</a>
            </div>
        </div>
      </div>";
    }
}
}

// displaying list of products
    function getcategories(){
        global $con;
      $select_categories="Select * from `categories`";
      $result_categories=mysqli_query($con,$select_categories);
      while($row_data=mysqli_fetch_assoc($result_categories)){
      $categories_title=$row_data['categories_title'];
      $categories_id=$row_data['categories_id'];
        echo "<li class='nav-item'>
        <h5><a href='beverages.php?categories=$categories_id' class='nav-link  text-dark'>$categories_title</a></h5>
        </li>";
      }
    }
//seacrhing products
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
       $search_data_value=$_GET['search_data']; 
    }
    $search_query="Select * from `product` where product_keyword like 
    '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No result match. No products 
        found</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $categories_id=$row['categories_id'];
      echo"<div class='col-md-4 mb-2'>
      <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='project.php?add_to_cart=$product_id' class='btn'>Add to cart</a>
            </div>
        </div>
      </div>";
    }
}

//get ip address function
function getIPAddress(){  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select *from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('this item is already present inside the cart')</script>";
        echo "<script>window.open('project.php','_self')</script>";
    }else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('item is added to cart')</script>";
      echo "<script>window.open('project.php','_self')</script>";
    }
  }
}

//function to get cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select *from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }else{
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select *from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
  }

  //total price function
  function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="Select * from `product` where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
      }
    }
    echo $total_price;
  }
  function get_user_order_details() {
    global $con;
    $username = $_SESSION['username'];
    $get_details="SELECT * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['delete_account'])){
                $get_orders = "SELECT * FROM `user_orders` WHERE user_id = $user_id AND order_status = 'pending'";
                $result_orders_query = mysqli_query($con, $get_orders);
                $row_count = mysqli_num_rows($result_orders_query);
                if($row_count > 0){
              echo"<h3 class='text-center text-success mt-5'>You have <span class='text-danger'>$row_count</span>
               Pending orders</h3>
               <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p> ";
            }else{
              echo"<h3 class='text-center text-success mt-5'>You have zero pending orders</h3>
               <p class='text-center'><a href='../project.php' class='text-danger'>Explore More</a></p> ";
            }
          }
        }
      }
    }
  }
?>