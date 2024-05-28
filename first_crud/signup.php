<?php
require "Classes/Database.php";
require "Classes/Register.php";

$database = new Database;

$conn = $database->get_conn();

$Message =  '';

if($_SERVER['REQUEST_METHOD'] ==  'POST'){
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $password = password_hash($password , PASSWORD_DEFAULT);

    $dataRegister = Register::createOne($conn, $name, $fname, $email, $phone, $password);

    if('submit'){
        $Message = "You are Registered! you can,";
    }
}


?>







<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <!-- <h1 class="h3 mb-0 text-gray-800">Welcome,$employeeData['name']?></h1> -->
    <!-- <h2 class="h3 mb-0 text-800 list-group-item active">Your data Successfuly,<$employeeData['name']?></h2>              -->
</div>

<!-- Content Row -->
<div class="row my-5">
    <!-- Pending Requests Card Example -->
    <div class="col-md-6" style="margin: auto;">
    <h1 class="text-center text-primary">Sign_Up Form</h1>

    <?php if($Message != '' ) : ?>
        <p class="text-center text-success"><?=$Message?><a href="signin.php">Sign_In Now!</a></p>
        <?php endif; ?>
    <form action="" method="POST">
    
        <div class="mb-3" > <label for="">Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name *"  required>
        </div>
        <div class="mb-3" > <label for="">Father Name:</label>
        <input type="text" class="form-control" name="fname" placeholder="Father Name *" required>
        </div>
        <div class="mb-3" > <label for="">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email *" required>
        </div>
        <div class="mb-3" > <label for="">Phone:</label>
        <input type="number" class="form-control" name="phone" placeholder="Phone Number *" required>
        </div>
        <div class="mb-3" > <label for="">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Secrate Pass *" required>
        </div>
        <div class="my-2">
        <button type="submit" class="btn btn-primary">Sign_Up</button>
      </div>
      You've already an account: <a href="signin.php">Sign_In Now!</a>
    </div>
    