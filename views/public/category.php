<div class="side-bar">
  <div class="categories">
    <h3 class="header">Categories</h3>
    <ul class="category-list">
      <?php
      $stmt = $conn->prepare("SELECT * FROM category");

      $stmt->execute();

      while($record = $stmt->fetch(PDO::FETCH_BOTH)){

        extract ($record);
        $cat_id = str_replace(' ', '_', $category_id);
        $cat_name = str_replace(' ', '_', $category_name);

        ?>


        <a href="/catalogue?id=<?php echo $cat_id; ?>&name=<?php echo $cat_name; ?>"><li class="category"><?php echo $category_name; ?></li></a>

      <?php } ?>
    </ul>
  </div>
</div>
