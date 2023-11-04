<?php
$connection = new mysqli('localhost','root','','listofproducts'); //new connection
//Condition if the Database is successfully connected. 
if(!$connection){
    die(mysqli_error($connection));
}
?>