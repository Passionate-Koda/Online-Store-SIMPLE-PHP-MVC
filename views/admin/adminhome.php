<?php
session_start();
$_SESSION['active'] = true;

$page_title = "Admin Home";
$selectedLnk= "admin_home"; $selected_name="Home";
$firstLnk = "product_category" ; $first_name = "Category";
$secondLnk = "products"; $second_name = "Products";
$thirdLnk = ""; $third_name="";
$forthLnk = ""; $forth_name = "";

#$deci = $_SESSION['id'];
if(isset($_SESSION['name'])){
  $deb = $_SESSION['name'];
}

#$def = $_SESSION['id'];

include 'include/header2.php';



?>
<div class="wrapper">
  <h1 id="register-label"></h1>
  <hr>

  <div id="stream">
    <?php $made = ucwords($deb); echo "<p>Welcome, <strong>$made</strong></p>"?>
  </div>
</div>

<?php include 'include/footer.php'; ?>
