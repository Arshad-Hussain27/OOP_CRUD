<?php



require "Classes/Database.php";
require "Classes/Register.php";

$database = new Database;

$conn = $database->get_conn();


$id = $_GET['id'];

Register::Delete($conn, $id);