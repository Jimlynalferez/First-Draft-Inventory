<?php
include 'Connectdb.php'; //File where the database connection is located. 


$id = $id = $_GET['updateid'];
$DisplayCommand = "SELECT * FROM productdetails where id=$id";
$Result = mysqli_query($connection, $DisplayCommand);
$row=mysqli_fetch_assoc($Result);
$Product = $row['Product'];
$Suppliername = $row['Supplier'];
$ContactPerson = $row['ContactPerson'];
$ContactNumber = $row['ContactNumber'];
$Price = $row['Price'];
$Unit = $row['Unit'];
$Brand = $row['Brand'];


//Condition to save the inputted data. 
if(isset($_POST['SaveUpdate'])){
    //New initialization to hold temporary data. 
    $Product = $_POST['Product']; //Name of the field.
    $SupplierName = $_POST['Suppliername'];
    $ContactPerson = $_POST['ContactPerson'];
    $ContactNumber = $_POST['ContactNumber'];
    $Price = $_POST['Price'];
    $Unit = $_POST['Unit'];
    $Brand = $_POST['Brand'];

    //Sql command to save data inside in condition based on the Database. 
    $SaveUpdateCommand = "update productdetails set id=$id, Product='$Product', Supplier='$SupplierName', ContactPerson='$ContactPerson', 
    ContactNumber='$ContactNumber', Price='$Price', Unit='$Unit', Brand='$Brand' where id=$id";
    //Values are the new initialization holding the temporary data.

    $Result = mysqli_query($connection, $SaveUpdateCommand); //Result
    if($Result){ //Condition if the result is successfully executed.
        echo "Updated Successfully";
        header("location:Display.php");
    }else{
        die(mysqli_error($connection));
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Add Product</title>
  </head>
  <body class = "p-3 mb-2 bg-body-secondary"> 
    <br>
    <div class = "container">
    <h1>Edit Product</h1><br>
    <form method = "post">
    <div class="form-group">
        <label for="LabelProduct">Product</label>
        <input type="Product" class="form-control" value="<?php echo $Product?>" name="Product" aria-describedby="emailHelp" placeholder="Enter Product">
    </div>

    <div>
        <Label for ="Supplier">Suppliers Name</label>
        <input type = "SupplierName"  class="form-control" value="<?php echo $Suppliername?>" name="Suppliername"  placeholder="Enter Supplier's Name">
        <small id="Suppliername" class="form-text text-muted">Who will supply this order</small><br>
        </div>

        <div class = "form-group">
            <label for = "ContactPerson">Contact Person</label>
            <input type = "ContactPerson" class="form-control" value="<?php echo $ContactPerson ?>" name="ContactPerson" placeholder="Enter Contact Person">
        </div>

        <div class = "form-group">
            <label for = "ContactNumber">Contact Number</label>
            <input type = "ContactNumber" class="form-control" value="<?php echo $ContactNumber?>" name="ContactNumber" placeholder="Enter Contact Number">
        </div>
        <div class = "form-group">
            <label for = "Price">Price</label>
            <input type = "Price" class="form-control" value="<?php echo $Price?>" name="Price" placeholder="Enter Price">
        </div>
        <div class = "form-group">
            <label for = "Unit">Unit</label>
            <input type = "Unit" class="form-control" value="<?php echo $Unit?>" name="Unit" placeholder="Enter Unit">
        </div>
        <div class = "form-group">
            <label for = "Brand">Brand</label>
            <input type = "Brand" class="form-control" value="<?php echo $Brand?>" name="Brand" placeholder="Enter Brand">
        </div>

  <button type="submit" name="SaveUpdate" class="btn btn-outline-secondary"><a class = "text-dark">Save Update</a></button>
  <button type="submit" name="CancelData" class="btn btn-outline-secondary"><a href ="Display.php" class="text-dark">Cancel</a></button>
</form>
    </div>
  </body>
</html>