<?php

Class Register{

        public $name;
        public $fname;
        public $email;
        public $phone;
        public $password;
        

     public static function getAll($conn){
        $query = "SELECT * FROM register";
        $result = $conn->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }

    public static function getbyId( $conn , $id){
        $query = "SELECT * FROM register WHERE id = ?";
        $stmt = $conn->prepare($query);
        mysqli_stmt_bind_param($stmt , 'i' , $id);
        if(mysqli_stmt_execute($stmt)){
           $result = mysqli_stmt_get_result($stmt);
           return mysqli_fetch_assoc($result);
        }

    }
    
   public static function Delete($conn , $id){
      $query =  "DELETE FROM register WHERE id = ?";
      $stmt = $conn->prepare($query);
      mysqli_stmt_bind_param($stmt , 'i', $id);
      if(mysqli_stmt_execute($stmt)){
         header("location: index.php");
      }

   }

    public static function UpdateOne( $conn , $id , $name, $fname, $email, $phone, $password) {
    $query = "UPDATE register SET name = ?, fname = ?, email = ?, phone = ?,
    password = ? WHERE id = ? ";
    $stmt = $conn->prepare($query);
    mysqli_stmt_bind_param($stmt, 'sssssi', $name, $fname, $email, $phone, $password , $id);
    mysqli_stmt_execute($stmt);
    }



   public static function createOne( $conn , $name, $fname, $email, $phone, $password){
      $query = "INSERT INTO register (name,fname,email,phone,password)
      VALUES(?,?,?,?,?)";
      $stmt = $conn->prepare($query);
      mysqli_stmt_bind_param($stmt, 'sssss', $name, $fname, $email, $phone, $password);
      mysqli_stmt_execute($stmt);
   }
   
   
public static function Login( $conn, $name, $password) {
   $query = "SELECT * FROM register WHERE name = ? AND password = ?";
   $stmt = $conn->prepare($query);
   mysqli_stmt_bind_param($stmt, 'ss', $name, $password);
   if (mysqli_stmt_execute($stmt)) {
       $result = mysqli_stmt_get_result($stmt);
       if(!empty(mysqli_fetch_assoc($result))){
          return true;
      }
      return false;
}

}
}