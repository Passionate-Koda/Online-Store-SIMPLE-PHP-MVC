<?php
session_start();
$_SESSION['active'] = true;
$page_title = "Category";
$selectedLnk= "editCategory.php"; $selected_name="Edit Category";
$firstLnk = "adminhome.php" ; $first_name = "Home";
$secondLnk = "category.php"; $second_name = "Category";
$thirdLnk = ""; $third_name = "";
$forthLnk = ""; $forth_name = "";
include 'include/header2.php';
$view = getCategoryByID($conn, $_GET);
$error = [];

if(array_key_exists('category', $_POST)){

  if(empty($_POST['category'])){
    $error['category'] = "Please enter category";
  }
  if(empty($error)){
    editCategory($conn, $_POST, $_GET);
  }else{
    foreach($error as $err){
      echo $err;
    }
  }
}
?>
<div class="wrapper">
  <div id="stream">





    <form id ="register" method="POST">
      <p>Edit Category</p>

      <input type="text" name="category" placeholder ="enter category name"
      value="<?php echo $view;?>"
      >


      <input type="submit" name="edit" value="edit">


    </form>
    <table id= "tab">
      <td><a href="product_category" id="register ">Back</a></td>
    </table>



  </div>

  <?php include 'include/footer.php'; ?>
