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
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="project.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beverages.php">BEVERAGES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/contactus.php">CONTACT</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="./aboutus.php">About_Us</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php  cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">TOTAL:<?php total_cart_price(); ?></a>
        </li>
      </ul>
      <ul class="navbar-nav">
      <?php
        if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <h5><a class='nav-link text-light btn btn-success border border-dark ' href='#'>Guest</a></h5>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <h5><a class='nav-link   text-light btn btn-success border border-dark mx-2' href='./users_area/profile.php'>".$_SESSION['username']." </a></h5>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <h5><a class='nav-link   text-light btn btn-success mx-3 border border-dark' href='./users_area/user_login.php'>LOGIN</a></h5>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <h5><a class='nav-link   text-light btn btn-success border border-dark mx-2' href='./users_area/logout.php'>LOGOUT</a><h5>
        </li>";
        }

      ?>
  </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- second child -->

<!-- third child -->
<div class="bg-light">
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
    get_all_products();
  get_unique_categories();
    ?>
<!-- row end -->
</div>
<!-- column end -->
</div>
  <div class="col-md-2">
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