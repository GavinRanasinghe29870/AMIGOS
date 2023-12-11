<?php 
 include 'connect.php';
 if(isset($_POST['add_products'])){
  $product_name=$_POST['p_name'];
  $product_price=$_POST['price'];
  $product_description=$_POST['prod_descri'];
  $product_image=$_FILES['image']['name'];
  $product_image_temp_name=$_FILES['image']['tmp_name'];
  $product_image_folder='Product_images/'.$product_image;

  $insert_query=mysqli_query($conn,"insert into `product` (pname,price,description,image) values('$product_name','$product_price','$product_description','$product_image')") or die("Insert query failed");
  if($insert_query){
    move_uploaded_file($product_image_temp_name,$product_image_folder);
    $display_message= "Product Added Successfully";
  }
  else{
    $display_message= "There are some errors in adding product";
  }
 }

?> 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin product page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/Admin product page.css">
</head>
<body>
<div class="bg-color">
  <div class="container1">
    <h3>Products</h3>
<!-- Displaying alert message -->
<?php
if(isset($display_message)){
  ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Dear Admin!</strong> <?php echo $display_message; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

  <?php
  unset($display_message);
}
?>  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ADD PRODUCT
</button>
</div>


<!-- Modal -->
<form action="" class="add_product" method="post" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="formGroupExampleInput">Product name</label>
            <input type="text" name="p_name" class="form-control" placeholder="Product Name" required>
          </div>
          <hr>
          <div class="form-group">
            <label for="formGroupExampleInput2">Price(LKR)</label>
            <input type="number" name="price" min="0" class="form-control" placeholder="Price" required>
          </div>
          <hr>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Product description</label>
        <input type="text" name="prod_descri" class="form-control" required>
      </div>
    </form>
    <hr>
          <div class="form-group">
            <label>Select image</label>
            <br>
            <input type="file" name="image" class="form-control-file" required accept="image/png,image/jpeg">
          </div>
        </form>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add_products" value="ADD PRODUCT" >
      </div>
    </div>
  </div>
</div>
</form>
</div>
</body>

</html>
