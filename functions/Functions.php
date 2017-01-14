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
        
        echo "<!-- Square card -->\n";
        echo "<style>\n";
        echo ".content-card-square.mdl-card {\n";
        echo "  width: 320px;\n";
        echo "  height: 480px;\n";
        echo "}\n";
        echo ".content-card-square > .mdl-card__title {\n";
        echo "  color: #fff;\n";
        echo "  background:\n";
        echo "    url('../images/product/$product_image') center 30% no-repeat #ffffff;\n";
        echo "}\n";
        echo "</style>\n";
        echo "\n";
        echo "<div class=\"content-card-square mdl-card mdl-shadow--2dp\">\n";
        echo "  <div class=\"mdl-card__title mdl-card--expand\">\n";
        echo "    <h2 class=\"mdl-card__title-text\">$product_title</h2>\n";
        echo "  </div>\n";
        echo "<center>\n";
        echo "  <div class=\"mdl-card__supporting-text\">\n";
        echo "  <b>$product_price ₹<b>\n";
        echo "  </div>\n";
        echo "</center>\n";
        echo "  <div class=\"mdl-card__actions mdl-card--border\">\n";
        echo "<center>\n";
        echo "    <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">\n";
        echo "Details\n";
        echo "    </a>\n";
        echo "  </div>\n";
        echo "</center>\n";
        echo "</div>\n";
        
        
        
    }
}

?>