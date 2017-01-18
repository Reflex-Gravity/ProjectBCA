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
        echo "<a class=\"mdl-navigation__link\" href=''>$cat_title</a>";
    }
}

//Get Products From DB And Display On Content Page
function getPro()
{
    global $con;
    $get_pro = ("select * from product");
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
echo "     <a href='details.php' <a class=\"mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect\">\n"; 
echo "          View Details\n"; 
echo "        </a></a>\n"; 
echo "<a href=index.php>\n"; 
echo " <div class=\"mdl-tooltip\" for=\"addcart\">Add To Cart</div>\n"; 
echo "<button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored\" id=\"addcart\" style=\"float:right;\">\n"; 
echo "  <i class=\"material-icons\">add</i>\n"; 
echo "</button>\n"; 
echo "</a>\n";
echo "    </div>\n"; 
echo "  </div>\n";
   
    }
}

?>