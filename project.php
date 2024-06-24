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
      body{
        overflow-x: hidden;
        overflow-y:scroll;
      }
      
      </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
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
        <?php
      //  if(isset($_SESSION['username'])){
      //   echo "<li class='nav-item'>
      //   <a class='nav-link  text-dark' href='./users_area/profile.php'>My Account</a>
      // </li>";
      //  }else{
      //   echo "<li class='nav-item'>
      //   <a class='nav-link  text-dark' href='./users_area/user_registration.php'>REGISTER</a>
      // </li>";
      //  }

      ?>
         <li class="nav-item">
          <a class="nav-link  text-dark" href="./users_area/contactus.php">CONTACT</a>
        </li>
        <li class="nav-item">
        <a class="nav-link  text-dark" href="./aboutus.php">About_Us</a>
        </li>
        <li class="nav-item text-dark">
        <a class="nav-link  text-dark" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php  cart_item();?></sup></a>
        </li>
        <li class="nav-item text-dark">
          <a class="nav-link  text-dark" href="#">TOTAL:<?php total_cart_price(); ?></a>
        </li>
      </ul>
      <ul class="navbar-nav">
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
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- calling cart function -->
 <?php
 cart();
 ?>
<!-- third child -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/p2.jpg " height="500px" class="d-block w-100" alt="...">
      <div class="carousel-caption  d-none d-md-block">
        <h5>Pizza's</h5>
        <p>Get exciting offer on the each and every pizza</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/b5.jpg" height="500px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Burger and Fries</h5>
        <p>Grab the amazing combos at the starting of only Rs 99/-</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/cocktail.jpg" height="500px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Cocktails & Mocktails </h5>
        <p>Every mocktails at just Rs 99/- (T&C applied)</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- <div class="bg-light text-dark">
  <h3 class="text-center">All Products</h3>
  <p class="text-center">Our goal is to provide best taste and service to you </p>
</div>

<!-- fourth child -->
<div class="row px-1">
  <div class="col-md-10">
    <!-- products -->
    <div class="row">
      
<!-- fetching products -->
    <?php
    //calling function
  getproducts();
  get_unique_categories();
  //$ip = getIPAddress();  
  //echo 'User Real IP Address - '.$ip;  
    ?>
<!-- row end -->
</div>
<!-- column end -->
</div>
  <div class="col-md-2 shadow-lg">
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item">
        <a href="#" class="nav-link text-dark "><h2>List of Products</h2></a>
      </li>
      <?php
      getcategories();
      ?>
     
    </ul>
   </div>
</div>
  
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