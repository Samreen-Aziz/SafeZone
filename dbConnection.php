<?php

function dbConnection(){
    $con = mysqli_connect("localhost","root","","safezone");
    if($con){
        echo "success";
    }
    else{
        echo "failed";
    return $con;
    }

}


?>