<?php
   //Get Categories From DB
   function getCats()
   {
       global $con;
       $get_cats = "select * from categories";
       $run_cats = mysqli_query($con, $get_cats);
       while ($row_cats = mysqli_fetch_array($run_cats)) {
           $cat_id    = $row_cats['cat_id'];
           $cat_title = $row_cats['cat_title'];
           echo "<a class=\"mdl-navigation__link\" href='index.php?cat=$cat_id'>$cat_title</a>";
       }
   }

   //Get Products From DB And Display On Content Page
   function getPro()
   {
       if (!isset($_GET['cat'])) {
           global $con;
           $get_pro = ("select * from product order by RAND()");
           $run_pro = mysqli_query($con, $get_pro);
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
               echo "<a href=index.php?add_cart=$product_id>\n";
               echo "<button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored\" title=\"Add To Cart\" style=\"float:right;width:30px;height:30px;min-width:30px\">\n";
               echo "  <i class=\"material-icons\">add</i>\n";
               echo "</button>\n";
               echo "</a>\n";
               echo "    </div>\n";
               echo "  </div>\n";
           }
       }
   }




   //Get Selected Products From DB And Display On Content Page
   function getCatPro()
   {
       if (isset($_GET['cat'])) {
           $cat_id=$_GET['cat'];
           global $con;
           $get_cat_pro = ("select * from product where product_cat='$cat_id'");
           $run_cat_pro = mysqli_query($con, $get_cat_pro);
           $count=mysqli_num_rows($run_cat_pro);
           if ($count==0) {
               echo "<h4 class=\"mdl-typography--display-3\" align=\"center\">No Products Found</h4>\n";//needs more styling
   echo "    <center> <a href=index.php <a class=\"mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect\">\n";
               echo "         Back To Home </center>\n";
           }

           while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
               $product_id    = $row_cat_pro['product_id'];
               $product_cat   = $row_cat_pro['product_cat'];
               $product_brand = $row_cat_pro['product_brand'];
               $product_title = $row_cat_pro['product_title'];
               $product_price = $row_cat_pro['product_price'];
               $product_image = $row_cat_pro['product_image'];

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
   }


//Display Product With Info
function dispinfo()
{
    if (isset($_GET['product_id'])) {
        $product_id=$_GET['product_id'];
        global $con;
        $get_pro = "select * from product where product_id='$product_id'";
        $run_pro = mysqli_query($con, $get_pro);
        while ($row_pro = mysqli_fetch_array($run_pro)) {
            $product_id    = $row_pro['product_id'];
            $product_title = $row_pro['product_title'];
            $product_price = $row_pro['product_price'];
            $product_image = $row_pro['product_image'];
            $pro_desc=$row_pro['product_description'];
            echo "  <!-- Square card -->\n";
            echo "  <div class=\"mdl-card mdl-shadow--2dp custDet-card-square\">\n";
            echo "    <div class=\"mdl-card__title mdl-card--expand\">\n";
            echo " <image class=\"imgRESIZEdet\" src=\"../images/product/$product_image\">\n";
            echo "\n";
            echo "    </div>\n";
            echo "    <div class=\"mdl-card__supporting-text\">\n";
            echo "   <big><b>  $product_title <br> &#8377; $product_price </b><big>\n";
            echo "<p>$pro_desc\n";
            echo "</p>\n";
            echo "    </div>\n";
            echo "    <div class=\"mdl-card__actions mdl-card--border\">\n";
            echo "<div class=\"buttonHolder\">\n";
            echo "<a href=index.php?add_cart=$product_id>\n";
            echo "<button name=\"add_cart\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">\n";
            echo "  Add To Cart\n";
            echo "</button>\n";
            echo "</div>\n";
            echo "</a>\n";
            echo "    </div>\n";
            echo "  </div>\n";
        }
    }
}

//Get User IP
  function getIp()
  {
      $ip = $_SERVER['REMOTE_ADDR'];

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }

      return $ip;
  }



// Add Items To Cart
function addcart()
{
    if (isset($_GET['add_cart'])) {
        global $con;
        $ip = getIp();
        $pro_id = $_GET['add_cart'];
        $check_pro = "select * from cart where product_id='$pro_id' AND ip_addr='$ip'";
        $run_check = mysqli_query($con, $check_pro);
        if (mysqli_num_rows($run_check)>0) {
            echo "";
        } else {
            $insert_pro = "INSERT INTO `cart` (`product_id`, `ip_addr`, `product_qty`) VALUES ('$pro_id', '$ip', '')";
            $run_pro = mysqli_query($con, $insert_pro);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


//Count Items In Cart
function total_items()
{
    if (isset($_GET['add_cart'])) {
        global $con;
        $ip = getIp();
        $get_items = "select * from cart where ip_addr='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    } else {
        global $con;
        $ip = getIp();
        $get_items = "select * from cart where ip_addr='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}




//Total Price Of Items In Cart
function total_price()
{
    $total = 0;

    global $con;

    $ip = getIp();

    $sel_price = "select * from cart where ip_addr='$ip'";

    $run_price = mysqli_query($con, $sel_price);

    while ($p_price=mysqli_fetch_array($run_price)) {
        $pro_id = $p_price['product_id'];

        $pro_price = "select * from product where product_id='$product_id'";

        $run_pro_price = mysqli_query($con, $pro_price);

        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
            $product_price = array($pp_price['product_price']);

            $values = array_sum($product_price);

            $total +=$values;
        }
    }

    echo $total;
}
