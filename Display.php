<?php
include 'Connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Display Data</title>
</head>
<body class="p-3 mb-2 bg-success-subtle text-dark">

<nav class="navbar bg-body-tertiary ">
  <div class="container-fluid">
  <h4><i class="fa-solid fa-list"></i>                 Product Ledger</h4>
    
  <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" name="searchproduct" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <?php
    $SearchProduct = "AS SELECT * FROM productdetails WHERE userid LIKE '%'+@key+'%' or firstname like '%'+@key+'%' or middlename like
    '%'+@key+'%' or lastname like '%'+@key+'%' or username like '%'+@key or cur_address like '%'+@key+'%' or age
    like '%'+@key+'%' or birthdate like '%'+@key+'%'";
    $result = mysqli_query($connection, $SearchProduct);
   
    ?>
  
  </div>
</nav>
    <div class = "table-responsive">
      <div>
        
      </div>
    <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Contact Person</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Cost Price</th>
      <th scope="col">Unit</th>
      <th scope="col">Brand</th>
      <th scope="col">Created At</th>
      <th scope="col">Stock</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $FetchData = "SELECT * FROM productdetails";
    $result = mysqli_query($connection, $FetchData);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['Id'];
            $Product=$row['Product'];
            $Supplier=$row['Supplier'];
            $ContactPerson=$row['ContactPerson'];
            $ContactNumber=$row['ContactNumber'];
            $Price=$row['Price'];
            $Unit=$row['Unit'];
            $Brand=$row['Brand'];
            $CreatedAt = $row['CreatedAt'];

            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$Product.'</td>
            <td>'.$Supplier.'</td>
            <td>'.$ContactPerson.'</td>
            <td>'.$ContactNumber.'</td>
            <td>'.$Price.'</td>
            <td>'.$Unit.'</td>
            <td>'.$Brand.'</td>
            <td>'.$CreatedAt.'</td>
            <td></td>
            <td>
                <button class="btn btn-success btn-sm"><a href = "Update.php? updateid='.$id.'" class="text-light"><i class="fa-solid fa-pen"></i>  Update</button>
                <button class="btn btn-danger btn-sm"><a href = "DeleteData.php? deleteid='.$id.'"  class="text-light"> <i class="fa-solid fa-trash"></i>  Delete</button>
            </td>
          </tr>';
        }
    }
    ?>
  </tbody>
</table>
        <button type = "submit" name ="AddProduct" class="btn btn-success btn-sm">
        <a href = "ProductDetails.php" class="text-light">
        <i class="fa-solid fa-plus"></i> Add Product</a></button>
    </div>
</body>
</html>