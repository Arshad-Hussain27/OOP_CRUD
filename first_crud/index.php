<?php

session_start();

if($_SESSION['logged_in'] != true){
  header("location: logout.php");
  exit();
}


require "Classes/Database.php";
require "Classes/Register.php";

$database = new Database;

$conn = $database->get_conn();


$registertable = Register::getAll($conn);

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- <h1 class="text-primary text-center">Welcome,<?= $_SESSION['name'] ?></h1> -->


<div class="container my-5">


<div class="col-md-12" style="margin:auto;" >


<table class="table border 1px solid">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>


    </tr>
  </thead>   
  <tbody>
  <?php foreach($registertable as $register) : ?>
         <tr>
            <td><?= $register['name'] ?></td>
            <td><?= $register['fname'] ?></td>
            <td><?= $register['email'] ?></td>
            <td><?= $register['phone'] ?></td>
            <td><?= $register['password'] ?></td>
    
        <td><a href="single.php?id=<?= $register['id'] ?>" class="btn btn-primary">Read More</a></td>
        </tr>
         <?php endforeach; ?>
  <tbody>
    <tr>
    
      </div>
    
        </table>
       
<a href="logout.php" class="btn btn-primary">Logout</a> 
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

































