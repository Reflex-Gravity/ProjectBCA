<!DOCTYPE html>
<!--PHP imports -->
<?php
include("../includes/ConnectDB.php");
//Call Function To Connect To The DB
connectDB();
?>
<!--PHP imports End -->
<html>
   <head>
      <title>Add Products</title>
      <!--Other Imports  -->
  <link rel="stylesheet" href="/css/roboto.css" type="text/css">
        <link rel="stylesheet" href="/css/icon.css" type="text/css">
        <link rel="stylesheet" href="/css/Material.min.css" type="text/css">
        <script type="text/javascript" src="/js/Material.min.js" async></script>
        <link rel="shortcut icon" href="/images/favicon/favicon.ico" type="image/x-icon">
      
      <link rel="stylesheet" href="/css/MaterialCustom.css" >
	  <script src="http://cdn.tinymce.com/4/tinymce.min.js"> </script>
	  <script>
        tinymce.init({selector:'textarea'});
</script>
      <script src="/js/CustomJS.js" async></script>
      <!--Other Imports End -->
   </head>
   <body bgcolor="#3f51b5">
      <form name="productForm" action="insert.php" method="post" enctype="multipart/form-data" >
         <table class="mdl-data-table mdl-js-data-table" align="center" >
            <h3 align="center" style="color:#ffffff">Add A Product</h3>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric"><b>Product Title</b></td>
                  <td class="mdl-data-table__cell">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="product_title" class="mdl-textfield__input" type="text" id="productTitle" pattern="[a-zA-Z0-9]+[a-zA-Z0-9 ]+">
                        <label class="mdl-textfield__label" for="productTitle">Enter Product Title</label>
                     </div>
                  
				  </td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric"><b>Product Category</b></td>
                  <td class="mdl-data-table__cell--non-numeric">
                     <div class="mdl-select mdl-js-select mdl-select--floating-label">
                        <select class="mdl-select__input" id="Category" name="product_category">
                           <option value=""></option>
                           <?php
$get_cats = "select * from categories";
$run_cats = mysqli_query($con, $get_cats);
while ($row_cats = mysqli_fetch_array($run_cats)) {
    $cat_id    = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    echo "<option value='$cat_id'>$cat_title</option>";
}

?>
                        </select>
                        <label class="mdl-select__label" for="Category">Category</label>
                     </div>
                  </td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric"><b>Product Brand</b></td>
                  <td class="mdl-data-table__cell--non-numeric">
                     <div class="mdl-select mdl-js-select mdl-select--floating-label">
                        <select class="mdl-select__input" id="Brand" name="product_brand">
                           <option value=""></option>
                           <?php
$get_brands = "select * from brands";
$run_brands = mysqli_query($con, $get_brands);
while ($row_brands = mysqli_fetch_array($run_brands)) {
    $brand_id    = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];
    echo "<option value='$brand_id'>$brand_title</option>";
}

?>
                        </select>
                        <label class="mdl-select__label" for="Brand">Brand</label>
                     </div>
                  </td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric"><b>Product Image</b></td>
                  <td class="mdl-data-table__cell--non-numeric">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                        <input class="mdl-textfield__input" placeholder="No file chosen" type="text" id="TEXT_ID" readonly />
                        <div class="mdl-button mdl-button--icon mdl-button--file">
                           <i class="material-icons">attach_file</i>
                           <input type="file" name="product_img" accept="image/x-png" id="ID" onchange="document.getElementById('TEXT_ID').value=this.files[0].name;" />
                        </div>
                     </div>
                  </td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric"><b>Product Price</b></td>
                  <td class="mdl-data-table__cell--non-numeric">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="product_price" class="mdl-textfield__input" type="number" min="0" id="Price">
                        <label class="mdl-textfield__label" for="Price">Enter Product Price</label>
                     </div>
                  </td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric"><b>Product Description</b></td>
                  <td class="mdl-data-table__cell--non-numeric">
                     <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="product_dsc" class="mdl-textfield__input" type="text" rows= "3" id="Description"></textarea>
                        <label class="mdl-textfield__label" for="Description">
                        </label>
                     </div>
                  </td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric"><b>Product Keywords</b></td>
                  <td class="mdl-data-table__cell--non-numeric">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="product_keyword" class="mdl-textfield__input" type="text" id="Keywords">
                        <label class="mdl-textfield__label" for="Keywords">Enter Product Keywords</label>
                     </div>
                  </td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td colspan="2" class="mdl-data-table__cell--non-numeric">
                     <center>  <button name="add" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick=validateForm()>
                        Add Product
                        </button> 
                     </center>
                  </td>
               </tr>
            </tbody>
         </table>
      </form>
   </body>
</html>
<?php
if (isset($_POST['add'])) {
    //get text
    $product_title    = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $product_brand    = $_POST['product_brand'];
    $product_price    = $_POST['product_price'];
    $product_dsc      = $_POST['product_dsc'];
    $product_keyword  = $_POST['product_keyword'];
    //image
    $product_img      = $_FILES['product_img']['name'];
    $product_img_tmp  = $_FILES['product_img']['tmp_name'];
    echo "$product_category";
    move_uploaded_file($product_img_tmp, "../images/product/$product_img");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO product (product_cat, product_brand, product_title, product_price, product_description, product_image, product_keywords)
VALUES ('$product_category', '$product_brand', '$product_title', '$product_price', '$product_dsc', '$product_img', '$product_keyword')";
    
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    if ($sql) {
        
        echo "<script>alert('Product Has been inserted!')</script>";
        echo "<script>window.open('insert.php','_self')</script>";
        
    }
}
?>