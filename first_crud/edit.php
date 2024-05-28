<?php


session_start();
if($_SESSION['logged_in'] != true){
  header("location: logout.php");
  exit();
}

require "Classes/Database.php";
require "Classes/Register.php";

$Database = new Database;
$conn = $Database->get_conn();

$id = $_GET['id'];

$flashM = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if('submit'){
        $flashM = "Your Data is Update!";
    }

 $registerData = Register::UpdateOne($conn , $id, $name, $fname, $email, $phone, $password);

}

$registerData = Register::getbyId($conn , $id);
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
  <h1 class="text-center text-primary">Edit form </h1>

    <form action="" method="POST">
    <?php if($flashM ) : ?>
  <h4 class="text-center text-primary "><?=$flashM ?><a href="index.php">Go to Home Page</a></a></h4>
  <?php endif; ?>  
        <div class="mb-3" > <label for="">Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?= $registerData['name'] ?>">
        </div>
        <div class="mb-3" > <label for="">Father Name:</label>
        <input type="text" class="form-control" name="fname" placeholder="Father Name *" value="<?= $registerData['fname'] ?>">
        </div>
        <div class="mb-3" > <label for="">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $registerData['email'] ?>">
        </div>
        <div class="mb-3" > <label for="">Phone:</label>
        <input type="number" class="form-control" name="phone" placeholder="Phone Numbern*" value="<?= $registerData['phone'] ?>">
        </div>
        <div class="mb-3" > <label for="">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Secrate Pass *" value="<?= $registerData['password'] ?>">
        </div>
        <div class="my-2">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
    