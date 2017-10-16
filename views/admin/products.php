<?php

$page_title = "Add Products";
$selectedLnk= "products"; $selected_name="Products";
$firstLnk = "admin_home" ; $first_name = "Home";
$secondLnk = "product_category"; $second_name = "Category";
$thirdLnk = "add_products"; $third_name = "Add Products";
$forthLnk = ""; $forth_name = "";


$page_title = "Products";

include 'include/header2.php';
 ?>
 <table id="tab">
   <thead>
     <tr>
       <th>Book id</th>
       <th>Title</th>
       <th>Author</th>
       <th>Category</th>
       <th>Price</th>
       <th>Year</th>
       <th>ISBN</th>
       <th>File Path</th>
       <th>Flag</th>
     </tr>
   </thead>
   <tbody>
     <?php

     viewProducts($conn);
     ?>

         </tbody>
 </table>
         </tbody>
 </table>


 <?php include 'include/footer.php'; ?>
