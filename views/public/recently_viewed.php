<?php
// Recently viewed Aspect of the Index page_title
if(!isset($_SESSION['id'])){
  $stmt = $recent->selectFromRecentlyViewed($conn, $sid);


  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $data = $recent->selectFromBook($conn, $row['book_id']);

    $rowb = $data->fetch(PDO::FETCH_ASSOC); ?>

    <li class="book"><a href="<?php echo "/book_preview?book_id=".$rowb['book_id']?>"><div class="book-cover" style="background:url('<?php echo $rowb['file_path'] ?>'); background-size:cover; background-position: center; background-repeat: no-repeat"></div></a>
      <div class="book-price"><p><?php echo $rowb['price']; ?></p>
      </div></li>

      <?php
    }
  }else{
    $stmt = $recent->selectFromRecentlyViewed($conn, $uid);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data = $recent->selectFromBook($conn, $row['book_id']);

      $rowb = $data->fetch(PDO::FETCH_ASSOC); ?>

      <li class="book"><a href="<?php echo "/book_preview?book_id=".$rowb['book_id']?>"><div class="book-cover" style="background:url('<?php echo $rowb['file_path'] ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div></a>
        <div class="book-price"><p>"$"<?php  echo  $rowb['price']; ?></p>
        </div></li>

      <?php }

    }?>
