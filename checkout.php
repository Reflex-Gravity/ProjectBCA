<!DOCTYPE html>
<!--PHP imports-->
<?php
  include("functions/Functions.php");
  include("includes/ConnectDB.php");
  session_start();
  //Call Function ToConnect To The DB
  connectDB();
  ?>
<!--PHP imports End -->
<html>
  <head>
    <title>E-Wagon</title>
    <meta charset="UTF-8">
    <meta name="description" content="E-Wagon">
    <meta name="keywords" content="ecommerce,ewagon">
    <meta name="author" content="Clinton Dsouza,Christon Dsouza,Herald Soans">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Other Imports  -->
    <link rel="stylesheet" href="css/roboto.css" type="text/css">
    <link rel="stylesheet" href="css/icon.css" type="text/css">
    <link rel="stylesheet" href="css/material.min.css" type="text/css">
    <script type="text/javascript" src="js/Material.min.js" async></script>
    <script src="js/CustomJS.js" async></script>
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/MaterialCustom.css" type="text/css">
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
                <form action="result.php" enctype="multipart/form-data" >
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
              <?php
                if(!isset($_SESSION['customer_email']))
                {
                include("login.php");
                }
                else
                {
                include("payment.php");
                }
                ?>
              <!-- Conent Ends Here -->
            </div>
          </main>
        </div>
      </div>
    </div>
    <!--Main Content Container Ends Here -->
  </body>
</html>