<?php

Class Database{

    public function get_conn()
    {
        $conn = mysqli_connect ("localhost", "root", "", "employdb");

        // if( $conn ){
        //     echo "successful";
        // }else{
        //     echo "Wrong";
        // }
        return $conn;
    }
  

    }

    


    
?>