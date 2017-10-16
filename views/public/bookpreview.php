<?php
$page_title = "Book Preview";
$body_id = "bookpreview";
include 'includes/header2.php';
include 'includes/class.RecentlyViewed.php';
$book = getProductByID($conn, $_GET);
extract($book);
// this is to populate the recently viewd table;
$recent = new RecentlyViewed();

//if a user is signed in
if(isset($_SESSION['id'])){
  // session id
  $uid = $_SESSION['id'];
}
//to get the id of the curent book for the pupose of checking if it has been viewed and to get viewed books
if(isset($_GET['book_id'])){
  $item = getProductByID($conn, $_GET);
  extract($item);
  // $book = $book_id;
}
//if the user is yet to sign in...$sid is used in place of the session id
if(!isset($_SESSION['id'])){
  $recent->insertIntoRecentlyViewed($conn, $sid, $book_id);
}else{
  //if user is signed in $uid is the login session id
  $recent-> insertIntoRecentlyViewed($conn, $uid, $book_id);
}

//Validation the review Comment form
if(array_key_exists('submitComment', $_POST)){

  if(!isset($_SESSION['id'])){
    $message = 'please Login Before you add Comment';
    $msg = str_replace(' ', '_', $message);
    header("Location:/book_preview?book_id=$book_id&msg=$msg");
  }else{
    $clean = array_map('trim', $_POST);
    insertIntoReview($conn, $uid, $book_id, $clean);
    header("Location:/book_preview?book_id=".$book_id);
  }
}


#Validating Add To Cart Form
if(array_key_exists('submit', $_POST)){
  $errors = [];
  if(empty($_POST['quantity'])){
    $errors['quantity'] = "You have not chosen any amount!";
  }

  if(empty($errors)){
    $clean = array_map('trim', $_POST);
    if(!isset($_SESSION['id'])){
      # add to temporary cart if user is not logged in
      addToCart($conn, $sid, $book_id, $clean);
      header("Location:/book_preview?book_id=".$book_id);
    }else{
      # add to cart if user is logged in
      addToCart($conn, $uid, $book_id, $clean);
    }
    header("Location:/book_preview?book_id=".$book_id);

  }



}

?>












<form class="search-brainfood">
  <input type="text" class="text-field" placeholder="Search all books">
</form>
</div>
</div>
<div class="main">

  <p class="global-error">You have not chosen any amount!</p>
  <div class="book-display">

    <div class="display-book" style="background: url('/<?php echo $file_path; ?>');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;"></div>

      <div class="info">
        <h2 class="book-title"><?php echo $title ?> </h2>

        <h3 class="book-author"><?php echo "$author" ?></h3>
        <h3 class="book-price">$<?php echo $price ?></h3>
        <form action="" method="POST">
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field" name="quantity">
          <input class="def-button add-to-cart" type="submit" name="submit" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="book-reviews">
      <h3 class="header">Reviews</h3>
      <ul class="review-list">
        <!-- <li class="review">
        <div class="avatar-def user-image">
        <h4 class="user-init">jm</h4>
      </div>
      <div class="info">
      <h4 class="username">Jon Williams</h4>
      <p class="comment">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </p>
  </div>
</li> -->
<?php
#assigning function to view review to the selected Book
$view = ViewReview($conn, $book_id) ;
echo $view;
?>


</ul>
<div class="add-comment">
  <h3 class="header">Add your comment</h3>
  <form action="" method="POST" class="comment">
    <textarea name="review" class="text-field" placeholder="write something"></textarea>
    <input class="def-button post-comment" type="submit" name="submitComment" value="Comment">

  </form>
</div>
</div>
</div>
<?php  include 'includes/footer.php';  ?>
