<?php
include "Connectdb.php";
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $DeleteCommand = "DELETE FROM productdetails where id=$id";
    $result=mysqli_query($connection, $DeleteCommand);
    if($result){
        echo '<script>alert("Successfully Deleted");</script>';
        header("location:Display.php");
    }else{
        die(mysqli_error($connection));
    }
}
?>