<?php

$con = mysqli_connect("localhost", "root", "", "job");
if(!$con){
    die("connection failed". mysqli_connect_error());
}
// else{
//     echo "connected";
// }

?>