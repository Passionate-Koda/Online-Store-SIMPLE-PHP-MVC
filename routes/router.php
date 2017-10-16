<?php
$uri = explode("/", $_SERVER['REQUEST_URI']);
//var_dump($uri);

if(count($uri) > 2){
  header("Location:/admin_home");
}

//Creating A Null variable to be populated for the query String Route;
$category_id = NULL;
$category_name= NULL;

//Creating a $_GET condition to populate the Null Variables;
if(isset($_GET['id'])){
  $category_id = $_GET['id'];
}

$msg = NULL;
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}
if(isset($_GET['name'])){
  $category_name = $_GET['name'];
}
$success = NULL;
if(isset($_GET['success'])){
  $success = $_GET['success'];
}

$book_id = NULL;
if(isset($_GET['book_id'])){
  $book_id = $_GET['book_id'];
}

$cart_id = NULL;
if(isset($_GET['cart_id'])){
  $cart_id = $_GET['cart_id'];
}




switch ($uri[1]) {

  case "":
  include APP_PATH."/views/public/home.php";
  break;

  case "home":
  include APP_PATH."/views/public/home.php";
  break;

  default:
  include APP_PATH."/views/public/home.php";
  break;

  case "admin":
  include APP_PATH."/views/admin/adminlogin.php";
  break;

  case "admin_register":
  include APP_PATH."/views/admin/register.php";
  break;

  case "style":
  include APP_PATH."/views/admin/style/styles.css";
  break;

  case "style2":
  include APP_PATH."/views/public/styles/styles.css";
  break;

  case "admin_home":
  include APP_PATH."/views/admin/adminhome.php";
  break;

  case "add_products":
  include APP_PATH."/views/admin/addProducts.php";
  break;

  case "del":
  include APP_PATH."/views/admin/deleteCategory.php";
  break;

  case "product_category":
  include APP_PATH."/views/admin/category.php";
  break;

  case "edit_products":
  include APP_PATH."/views/admin/editProducts.php";
  break;

  case "delete_products":
  include APP_PATH."/views/admin/deleteProducts.php";
  break;

  case "edit_category":
  include APP_PATH."/views/admin/editCategory.php";
  break;

  case "products":
  include APP_PATH."/views/admin/products.php";
  break;


  case "users_login":
  include APP_PATH."/views/public/login.php";
  break;

  case "users_registration":
  include APP_PATH."/views/public/registration.php";
  break;

  case "catalogue":
  include APP_PATH."/views/public/catalogue.php";
  break;

  case "cart":
  include APP_PATH."/views/public/cart.php";
  break;

  case "logout":
  include APP_PATH."/views/public/logout.php";
  break;

  case "checkout":
  include APP_PATH."/views/public/checkout.php";
  break;







  #Routes With Query Strings are Below;
  case "editCategory?id=$category_id&name=$category_name":
  include APP_PATH."/views/admin/editCategory.php";
  break;

  case "delete?cart_id=$cart_id":
  include APP_PATH."/views/public/delete.php";
  break;


  case "edit_products?book_id=$book_id":
  include APP_PATH."/views/admin/editProducts.php";
  break;


  case "deleteProducts?book_id=$book_id": //$book_id has been created
  include APP_PATH."/views/admin/deleteProducts.php";
  break;

  case "product_category?success=$success":
  include APP_PATH."/views/admin/category.php";
  break;

  case "deleteCategory?id=$category_id&name=$category_name":
  include APP_PATH."/views/admin/deleteCategory.php";
  break;

  case "add_products?success=$success":
  include APP_PATH."/views/admin/addProducts.php";
  break;

  case "user_login?msg=$msg":
  include APP_PATH."/views/public/login.php";
  break;

  case "users_registration?success=$success":
  include APP_PATH."/views/public/login.php";
  break;

  case "book_preview?book_id=$book_id":
  include APP_PATH."/views/public/bookpreview.php";
  break;

  case "book_preview?book_id=$book_id&msg=$msg":
  include APP_PATH."/views/public/bookpreview.php";
  break;

  case "catalogue?id=$category_id&name=$category_name":
  include APP_PATH."/views/public/catalogue.php";
  break;

  case "cart?cart_id=$cart_id":
  include APP_PATH."/views/public/cart.php";
  break;

}





?>
