<?php
$page_title = "Home";
$body_id = "home";


include 'includes/header2.php';

include 'includes/class.RecentlyViewed.php';
$recent = new RecentlyViewed();

if(isset($_SESSION['id'])){
  // session id
  $uid = $_SESSION['id'];
}

$bestseller = bestSellingBook($conn);

extract($bestseller);

?>
<div class="main">
  <div class="book-display">
    <a href="<?php echo "/book_preview?book_id=".$book_id?>">
      <div class="display-book"

      style="background: url('<?php echo "../$file_path"; ?>');
      background-size: cover;
      background-positive: center;
      background-repeat: no-repeat;">
    </div>

    <div class="info">
      <?php echo $title; ?>
      <h2 class="book-title"><?php echo $title; ?></h2>

      <h3 class="book-author"><?php echo $author; ?></h3>

      <h3 class="book-price"><?php echo $price; ?></h3>
      <p></p>
      <form>
        <label for="book-amout">Amount</label>
        <input type="number" class="book-amount text-field">
        <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
      </form>
    </div>
  </div>
  <div class="trending-books horizontal-book-list">
    <h3 class="header">Trending</h3>

    <ul class="book-list">
      <?php echo trending($conn); ?>
    </ul>
  </div>
  <div class="recently-viewed-books horizontal-book-list">
    <h3 class="header">Recently Viewed</h3>
    <ul class="book-list">
      <div class="scroll-back"></div>
      <?php include 'recently_viewed.php'; ?>
    </ul>
    <div class="scroll-front"></div>
  </div>

</div>

<?php include 'includes/footer.php'; ?>
