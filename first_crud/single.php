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


$single = Register::getbyId($conn, $id);


?>




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">




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
         <tr>
            <td><?= $single['name'] ?></td>
            <td><?= $single['fname'] ?></td>
            <td><?= $single['email'] ?></td>
            <td><?= $single['phone'] ?></td>
            <td><?= $single['password'] ?></td>

        <td><a href="edit.php?id=<?= $single['id'] ?>" class="btn btn-primary">Edit</a></td>
         </tr>
  <tbody>
    <tr>
    
      </div>
    
        </table>
        <form action="delete.php?id=<?= $single['id'] ?>" method="POST">

        <button class="btn btn-primary">Delete</button>
        
        </form>
       
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
