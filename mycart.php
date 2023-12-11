<?php
include 'connect.php';
//update query
$update_value=$_POST['update_quantity'];
$update_id=$_POST['update_quantity_id'];
//query
$update_quantity_query=mysqli_query($conn,"update 'cart' set quantity=$update_value where id=$update_id");
if($update_quantity_query){
  header('location:mycart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amigos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/mycart.css">

</head>
<body>
    <!--Bg-image-->
    <div class="bgimg-1">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/images/NavLogo.png" alt="" width="200" class="img-fluid"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <ul class="navbar-nav ml-5">
                    <li class="nav-item"><a class="nav-link active coustom-items" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link active coustom-items" aria-current="page" href="#">Products</a></li>
                    <li class="nav-item"><a class="nav-link active coustom-items" aria-current="page" href="#">Events</a></li>
                    <li class="nav-item"><a class="nav-link active coustom-items" aria-current="page" href="#">About us</a></li>
                    <li class="nav-item"><a class="nav-link active coustom-items" aria-current="page" href="#">Contact</a></li>

                    
                </ul>
                <div class="btn ml-auto btn-coustom">
                    <img src="/images/Sign-icon.png" alt="" width="30px">
                    Sign in
                </div>
            </div>
        </div>
    </nav>
    <!-- Page title -->
    <h1>MY CART</h1>
    <br><br><br><br>
    <!-- First Grid -->
    <div class="container">
        <div class="row">
          <div class="col">
            <fieldset>
              <div class="Select">
                <label class="pl-2 ">
                    <input type="checkbox" checked="checked" class="ch-cs">
                  </label>
                  
                  <p>SELECT ALL</p>
                  <div class="ml-auto pt-2 pr-2">
                  <button type="button" class="btn-sm btn-outline-danger">DeleteAll <img src="/images/DeleteIcon.png" alt="deletebtn" width="25px"></button>
                </div>
                </div>

                <div class="col">
                  <div class="field-2">
                    <div class="responsive-table">
                      
                  <table>
                     <?php
                     while($fetch_cart_products=mysqli_fetch_assoc($select_cart_products)){
                      ?>
                      <tr>
                        <td style="padding: 5px;"> <colspan="2"></td>
                        <td><?php echo $fetch_cart_products['id']?></td>
                        <td>
                         <img src="path/to/your/image2.png" alt="Image of product">
                       </td>
                       
                        <td  style="padding: 30px;">Description</td>
                        <form action="" method="post">
                          <input type="hidden" value="<?php echo $fetch_cart_products['id']?>" name="update_quantity_id">  
                        <td><input type="number"class="form-control form-control-sm"  value="<?php echo $fetch_cart_products['quantity'] ?>" name="update_quantity"></p></td>
                      </form>
                        <td>LKR <td>2000</td></td>
                        <td  style="padding: 30px;" ><button class="remove-item-btn">Remove</button></td>
                        </tr>

                       <?php
                       $grand_total+=($fetch_cart_products['price']*$fetch_cart_products['quantity'])+$fetch_cart_products['shippingfee'];
                     }
                     ?>
                     
                    
                  </table>
                    
                    
                     
                    
                    
                
            </fieldset>
          </div>
          <!-- Second Grid -->
          <div class="col">
            <div class="field-2">
                <table class="table">
                      <tr>
                        
                        <td colspan="2">Sub Total</td>
                        <td>LKR<?php echo $subtotal= ($fetch_cart_products['price']*$fetch_cart_products['quantity'])?>/-</td>
                        <?php
                         $subtotal = 0;

                         // htto mata ba
                       foreach ($_SESSION['cart'] as $item) {
                       $subtotal += $item['price'] * $item['quantity'];
                      }
                      echo "Subtotal: $".$subtotal;
                      ?>

                      </tr>
                      <tr>
                       
                        <td colspan="2">Shipping Fee</td>
                        <td>LKR<?php $fetch_cart_products['shippingfee']?>/-</span></td>
                      </tr>
                      <tr>
                            <td colspan="2"><b>Grand Total</b> </td>
                            <td><span>LKR<?php echo $grand_total?>/-</span></td>
                            <?php
                             $grand_total = $subtotal + $shipping_fee;
                             echo "Grand Total: $".$grand_total;
                             ?>
                      </tr>
                  </table>
                  <center>

                    <div class="btn btnc-2">
                      <img src="/images/carticon-2.png" alt="" width="25px">
                      Checkout
                    </div>
                  </center>
                 
            </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
      <div class="Footer_Background">
      <div class="container">
        <div class="row">
          
          <div class="col link-cs">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Product</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Events</a></li>
            </ul>
          </div>
          <div class="col">
            <h3>Office</h3>
            <p>Akura Institute,</p>
            <p>Thalalla South,</p>
            <p>Matara,</p>
            <p>Sri lanka</p>
    
            <h4>+94 70 251 9087</h4>
          </div>
          <div class="col">
            <h3>Newsletter<span></span></h3>
            <form>
              <div class="sub">
                <input type="email" placeholder="Enter Your email id" required>
            <div class="img-icon-envelop">
                <button type="submit" class="sub2"><img src="images/Icons/sign_in_003.png" alt="submit" width="30px" height="20px"></button>
            </div>
          </div>
            <br>
            </form>
            <div class="social-icons">
                <img src="images/Icons/Socail_01.png" alt="Facebook">
            </div>
    
            <div class="social-icons">
                <img src="images/Icons/Socail_04.png" alt="Youtube">
            </div>
            <div class="social-icons">
                <img src="images/Icons/Socail_05.png" alt="Instagram">
            </div>
            <div class="social-icons">
                <img src="images/Icons/Socail_06.png" alt="Tiktok">
            </div>
            <p class="email-id">sliotamigos@gmail.com</p>
    
          </div>
          <div class="col">
            <img src="images/Footer1.png" width=250px ="LOGO">
          </div>
          </div>
        
      
      <p class="copyright">Amigos © 2023 - All Right Reserved </p>
    </div>
    </div>
    </footer>

    
</body>
</html>
