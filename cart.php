<!DOCTYPE html>
<!--PHP imports-->
<?php
  session_start();
  include("functions/Functions.php");
  include("includes/ConnectDB.php");
  //Call Function ToConnect To The DB
  connectDB();
  ?>
<!--PHP imports End -->
<html>
  <head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="description" content="E-Wagon">
    <meta name="keywords" content="ecommerce,ewagon">
    <meta name="author" content="Clinton Dsouza">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Other Imports  -->
    <link rel="stylesheet" href="css/roboto.css" type="text/css">
    <link rel="stylesheet" href="css/icon.css" type="text/css">
    <link rel="stylesheet" href="css/Material.min.css" type="text/css">
    <script type="text/javascript" src="js/Material.min.js" async></script>
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/materialCustom.css" type="text/css">
    <script src="js/CustomJS.js"></script>
    <script langauage="javascript">
      function showMessage(value){
      document.getElementById("message").innerHTML = value;
      }
    </script>
    <!--Other Imports End -->
  </head>
  <body>
    <!--Left Alligned Drawer Starts Here -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Categories</span>
      <nav class="mdl-navigation">
        <?php
          getCats();?>
      </nav>
    </div>
    <!--Left Alligned Drawer Ends Here -->
    <!--Main Content Container Starts Here -->
    <main class="mdl-layout__content">
      <div class="page-content">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
          <header class="mdl-layout__header">
            <!--Headder Container Starts Here -->
            <div class="mdl-layout__header-row">
              <a class="Chref" href="index.php">E - Wagon</a>
              <div class="mdl-layout-spacer"></div>
              <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="customer/account.php"> Welcome Guest !
                <i class="material-icons">person_outline</i></a> </a>
                <a class="mdl-navigation__link" href="register.php">Signup
                <i class="material-icons">person_add</i></a>
                <a class="mdl-navigation__link" href="login.php">Login
                <i class="material-icons">lock_open</i></a>
                <a class="mdl-navigation__link" href="cart.php">
                  Cart &nbsp
                  <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="<?php total_items();?>" >local_grocery_store</div>
                </a>
                <form action="result.php" enctype="multipart/form-data">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="txtsearch" class="mdl-textfield__input" style="border-bottom: 1px solid rgba(245,245,245, 0.9);" type="text" id="sample3">
                    <label class="mdl-textfield__labelWhite" for="sample3">Search</label>
                  </div>
                  <button name="search" class="mdl-button mdl-js-button mdl-button--icon">
                  <i class="material-icons">search</i>
                  </button>
                </form>
              </nav>
            </div>
            <!--Header Container Ends Here -->
          </header>
          <main class="mdl-layout__content">
            <?php addcart();?>
            <div class="page-content">
              <!-- Conent Goes Here -->
              <center>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="tabalign">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:80%;">
                      <thead>
                        <th colspan="5">
                          <h4>My Cart</h4>
                        </th>
                      </thead>
                      <thead>
                        <tr>
                          <th>Remove</th>
                          <th>Image</th>
                          <th class="mdl-data-table__cell--non-numeric">Product</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <?php
                        $total = 0;
                        global $con;
                        $ip = getIp();
                        $sel_price = "select * from cart where ip_addr='$ip'";
                        $run_price = mysqli_query($con, $sel_price);
                        while ($p_price=mysqli_fetch_array($run_price)) {
                        $pro_id = $p_price['product_id'];
                        $pro_price = "select * from product where product_id='$pro_id'";
                        $run_pro_price = mysqli_query($con, $pro_price);
                        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                        $product_price = array($pp_price['product_price']);
                        $product_title = $pp_price['product_title'];
                        $product_image = $pp_price['product_image'];
                        $product_price_single = $pp_price['product_price'];
                        $values = array_sum($product_price);
                        $total +=$values; ?>
                      <tbody>
                        <tr>
                          <td>
                            <label class="mdl-checkbox mdl-js-checkbox" >
                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>" class="mdl-checkbox__input"/>
                            </label>
                          </td>
                          <td><img src="images/product/<?php echo $product_image?>" style="max-width:500%;max-height:500%;"/></td>
                          <td class="mdl-data-table__cell--non-numeric"><?php echo $product_title ?></td>
                          <td>
                            <!--Slider Number Fix-->
                            <input name="qty" onclick="snackbardisp()" id="slider2" class="mdl-slider mdl-js-slider" type="range" min="1" max="10" default="0" value="<?php echo $_SESSION['qty']; ?>" tabindex="1"
                              oninput="showMessage(this.value)" onchange="showMessage(this.value)">
                          </td>
                          <td>&#8377; &nbsp<?php echo $product_price_single ?> </td>
                          <div id="snackbar">
                            Quantity
                            <div id="message" ></div>
                          </div>
                          <?php if (isset($_POST['qty'])) {
                            $qty = $_POST['qty'];
                            $update_qty = "update cart set product_qty='$qty'";
                            $run_qty = mysqli_query($con, $update_qty);
                            $_SESSION['qty']=$qty;
                            $total=$total*$qty;
                            } ?>
                        </tr>
                        <?php //allow while loop to run to display products
                          }
                          }
                          ?>
                  </div>
                  <tr>
                  <td colspan="5" style="text-align: right !important;">Total Amount : <strong><?php echo $total  ?></strong></td>
                  </tr>
                  <tr>
                  <td colspan="5">
                  <button class="mdl-button mdl-js-button mdl-button--raised  mdl-button--colored" type="submit" name="update">
                  Update
                  </button>
                  <button class="mdl-button mdl-js-button mdl-button--raised  mdl-button--colored" type="submit" name="continue">
                  Continue Shopping
                  </button>
                  <a href="checkout.php" style="text-decoration:none;color:white;">
                  <button class="mdl-button mdl-js-button mdl-button--raised  mdl-button--colored" type="submit" name="checkout">
                  Checkout</a>
                  </button>
                  </td>
                  </tr>
                  </tbody>
                  </table>
              </center>
            </div>
            </form>
            <!-- Conent Ends Here -->
            <?php
              error_reporting(0);
              $ip = getIp();
              //Code For Update And Continue Button
              if (isset($_POST['update'])) {
              foreach ($_POST['remove'] as $removeID) {
              $delete_product="delete from cart where product_id='$removeID' AND ip_addr='$ip'";
              $run_delete = mysqli_query($con, $delete_product);
              if ($run_delete) {
              echo "<script>window.open('cart.php','_self')</script>";
              }
              }
              }
              if (isset($_POST['continue'])) {
              echo "<script>window.open('index.php','_self')</script>";
              }
              ?>
          </main>
        </div>
    </main>
    </div>
    <!--Main Content Container Ends Here -->
  </body>
</html>