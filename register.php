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
    <title>E-Wagon Register</title>
    <meta charset="UTF-8">
    <meta name="description" content="E-Wagon">
    <meta name="keywords" content="ecommerce,ewagon">
    <meta name="author" content="Clinton Dsouza,Christon Dsouza,Herald Soans">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Other Imports  -->
    <link rel="stylesheet" href="css/roboto.css" type="text/css">
    <link rel="stylesheet" href="css/icon.css" type="text/css">
    <link rel="stylesheet" href="css/Material.min.css" type="text/css">
    <script type="text/javascript" src="js/Material.min.js" async></script>
    <script src="js/CustomJS.js" async></script>
    <script src="js/jquery.js" async></script>
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/materialCustom.css" type="text/css">
    <!--Other Imports End -->
  </head>
  <body>
    <div class="register-layout-transparent mdl-layout mdl-js-layout">
      <main class="mdl-layout__content">
        <center>
          <form class="registration" action="register.php" method="post" enctype="multipart/form-data">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--3dp" bgcolor="#FFFFFF">
              <tr align="center">
                <td colspan="6">
                  <h3>
                    <center>Create An Account</center>
                  </h3>
                  <a href="index.php" style="text-decoration:none;">Go Home</a>
                </td>
              </tr>
              <tr>
                <td class="mdl-data-table__cell--non-numeric">Name</td>
                <td class="mdl-data-table__cell">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input  name="customer_name" class="mdl-textfield__input" type="text" id="customerName"  pattern="^[a-zA-Z0-9_.-]*$">
                    <label class="mdl-textfield__label" for="CustomerName">Enter Your Name</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="mdl-data-table__cell--non-numeric">Email</td>
                <td class="mdl-data-table__cell">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="customer_email" class="mdl-textfield__input" type="email" id="customerEmail"  pattern="[^ @]*@[^ @]*">
                    <label class="mdl-textfield__label" for="customerEmail">Enter Your Email</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="mdl-data-table__cell--non-numeric">Password</td>
                <td class="mdl-data-table__cell">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="customer_pass" class="mdl-textfield__input" type="password" id="customerPass"  pattern="[a-zA-Z0-9]+[a-zA-Z0-9 ]+">
                    <label class="mdl-textfield__label" for="customerPassword">Enter Your Password</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="mdl-data-table__cell--non-numeric">Confirm Password</td>
                <td class="mdl-data-table__cell">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="customer_pass" class="mdl-textfield__input" type="password" id="customerPass"  pattern="[a-zA-Z0-9]+[a-zA-Z0-9 ]+">
                    <label class="mdl-textfield__label" for="customerPassword">Re-Enter Your Password</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="mdl-data-table__cell--non-numeric">Image</td>
                <td class="mdl-data-table__cell--non-numeric">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input" placeholder="No file chosen" type="text" id="TEXT_ID" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="customer_image" accept="image/x-png" id="ID" onchange="document.getElementById('TEXT_ID').value=this.files[0].name;" />
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="mdl-data-table__cell--non-numeric">Contact</td>
                <td class="mdl-data-table__cell">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="customer_contact" class="mdl-textfield__input" type="text" id="customerContact"  pattern="^(\+[0-9]{1,5})?([1-9][0-9]{9})$">
                    <label class="mdl-textfield__label" for="customerContact">Enter Your Contact Number</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="mdl-data-table__cell--non-numeric">Address</td>
                <td class="mdl-data-table__cell--non-numeric">
                  <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="customer_address" class="mdl-textfield__input" type="text" rows= "3" id="customerAddress"></textarea>
                    <label class="mdl-textfield__label" for="customerAddress">
                    Enter Your Address
                    </label>
                  </div>
                </td>
              </tr>
              <tr align="center">
                <td colspan="2" class="mdl-data-table__cell--non-numeric">
                  <center>
                    <button name="register" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" onclick="validateForm()">
                    Create Account
                    </button> 
                  </center>
                </td>
              </tr>
            </table>
          </form>
        </center>
      </main>
    </div>
  </body>
</html>
<?php 
  if(isset($_POST['register']))
  {
  global $con;
  $ip = getIp();
  $customer_name = $_POST['customer_name'];
  $customer_email = $_POST['customer_email'];
  $customer_pass = md5 ($_POST['customer_pass']);
  $customer_image = $_FILES['customer_image']['name'];
  $customer_image_tmp = $_FILES['customer_image']['tmp_name'];
  $customer_phone = $_POST['customer_contact'];
  $customer_address = $_POST['customer_address'];
  move_uploaded_file($customer_image_tmp,"customer/customer_images/$customer_image");
  $insert_c = "INSERT INTO customer (customer_ip,customer_name,customer_email,customer_pass,customer_addr,customer_phone,customer_image) 
  VALUES ('$ip','$customer_name','$customer_email','$customer_pass','$customer_address','$customer_phone','$customer_image')";
  $run_c = mysqli_query($con, $insert_c); 
  $sel_cart = "select * from cart where ip_addr='$ip'";
  $run_cart = mysqli_query($con, $sel_cart); 
  $check_cart = mysqli_num_rows($run_cart); 
  if($check_cart==0)
  {
  $_SESSION['customer_email']=$customer_email; 
  echo "<script>alert('Account has been created successfully, Thanks!')</script>";
  echo "<script>window.open('customer/my_account.php','_self')</script>";
  }
  else
  {
  $_SESSION['customer_email']=$customer_email; 
  echo "<script>alert('Account has been created successfully, Thanks!')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
  }
  }
  ?>