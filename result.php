<!DOCTYPE html>
<!--PHP imports-->
<?php
   include("functions/Functions.php");
   include("includes/ConnectDB.php");
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
      <meta name="author" content="Clinton Dsouza">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--Other Imports  -->
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
      <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
      <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="css/MaterialCustom.css">
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
                           <a class="mdl-navigation__link" href="">Signup
                           <i class="material-icons">person_add</i></a>
                           <a class="mdl-navigation__link" href="">Login
                           <i class="material-icons">lock_open</i></a>
                           <a class="mdl-navigation__link" href="cart.php">
                              Cart &nbsp
                              <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="1">local_grocery_store</div>
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
                     <div class="page-content">
                        <!-- Conent Goes Here -->
                        <?php
                           if(isset($_GET['search'])){
                             //error_reporting(E_ERROR | E_PARSE); //Needs To Be Fixed 
                           $searchP = $_GET['txtsearch'];
                           $get_pro = ("select * from product where product_keywords like '%$searchP%'");
                           $run_pro = mysqli_query($con, $get_pro);
                           $count=mysqli_num_rows($run_pro);
                           if($count==0)
                           {
                           echo "<h4 class=\"mdl-typography--display-3\" align=\"center\">No Products Found</h4>\n";//needs more styling
                           echo "<center> <a href=index.php <a class=\"mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect\">\n"; 
                           echo "Back To Home</center>\n"; 
                           }
                           while ($row_pro = mysqli_fetch_array($run_pro)) {
                           
                           $product_id    = $row_pro['product_id'];
                           $product_cat   = $row_pro['product_cat'];
                           $product_brand = $row_pro['product_brand'];
                           $product_title = $row_pro['product_title'];
                           $product_price = $row_pro['product_price'];
                           $product_image = $row_pro['product_image'];
                           
                           echo "  <!-- Square card -->\n"; 
                           echo "  <div class=\"mdl-card mdl-shadow--2dp cust-card-square\">\n"; 
                           echo "    <div class=\"mdl-card__title mdl-card--expand\">\n"; 
                           echo " <image class=\"imgRESIZE\" src=\"../images/product/$product_image\">\n"; 
                           echo "\n";
                           echo "    </div>\n"; 
                           echo "    <div class=\"mdl-card__supporting-text\">\n"; 
                           echo "     $product_title <br> &#8377; $product_price\n"; 
                           echo "    </div>\n"; 
                           echo "    <div class=\"mdl-card__actions mdl-card--border\">\n"; 
                           echo "     <a href=details.php?product_id=$product_id <a class=\"mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect\">\n"; 
                           echo "          View Details\n"; 
                           echo "        </a></a>\n"; 
                           echo "<a href=index.php?product_id=$product_id>\n"; 
                           echo "<button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored\" title=\"Add To Cart\" style=\"float:right;width:30px;height:30px;min-width:30px\">\n"; 
                           echo "  <i class=\"material-icons\">add</i>\n"; 
                           echo "</button>\n"; 
                           echo "</a>\n";
                           echo "    </div>\n"; 
                           echo "  </div>\n";
                           
                           }
                           
                           
                           }
                           
                              ?>
                        <!-- Conent Ends Here -->
                     </div>
                  </main>
               </div>
            </div>
         </main>
      </div>
      <!--Main Content Container Ends Here -->
   </body>
</html>