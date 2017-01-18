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
                  getCats();
                  ?> 
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
                        <span class="mdl-layout-title">E-Wagon</span>
                        <div class="mdl-layout-spacer"></div>
                        <nav class="mdl-navigation mdl-layout--large-screen-only">
                           <a class="mdl-navigation__link" href=""> Sign-Up</a>
                           <a class="mdl-navigation__link" href="">Login</a>
                           <a class="mdl-navigation__link" href="">Cart</a>
                           <a class="mdl-navigation__link" href="">Wishlist</a>
                           <form action="php/result.php" enctype="multipart/form-data" >
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                 <input class="mdl-textfield__input" style="border-bottom: 1px solid rgba(245,245,245, 0.9);" type="text" id="sample3">
                                 <label class="mdl-textfield__labelWhite" for="sample3">Search</label>
                              </div>
                              <button class="mdl-button mdl-js-button mdl-button--icon">
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
                           getPro();
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