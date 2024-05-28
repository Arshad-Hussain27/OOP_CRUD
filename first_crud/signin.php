<?php 
session_start();

require "Classes/Database.php";
require "Classes/Register.php";

$database = new Database;
$conn = $database->get_conn();

$failed = '';

if( $_SERVER['REQUEST_METHOD'] == "POST"  ){
    $name    =  $_POST['name'];
    $password =  $_POST['password'];

    $hash = Register::login( $conn , $name , $password );

    $password = password_verify($password, $hash['password']);

    
    if($_SESSION['logged_in'] = true){
        
            header( "Location: index.php" );
                
        }else {
        $failed = "Name or password does not match!";
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
   <h1 class="text-center text-primary">Sign_In Form</h1>

   <?php if($failed  ) : ?>
	   <h4 class="text-center text-danger"><?=$failed?></h4>
	   <?php endif; ?>
   <form action="" method="POST">
   
	   <div class="mb-3" > <label for="">Name:</label>
	   <input type="text" class="form-control" name="name" placeholder="Enter Name *" required>
	   </div>
	   <div class="mb-3" > <label for="">Password:</label>
	   <input type="password" class="form-control" name="password" placeholder="Secrate Pass *" required>
	   </div>

	   <div class="my-2">
        <button type="submit" class="btn btn-primary">Sign_In</button>
      </div>
      Are  You new user <a href="signup.php">Sin_Up Now!</a>
