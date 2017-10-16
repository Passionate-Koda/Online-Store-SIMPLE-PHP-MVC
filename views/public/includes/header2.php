<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title><?php echo $page_title ?></title>
</head>

<body id="<?php $body_id ?>">
  <!-- DO NOT TAMPER WITH CLASS NAMES! -->

  <!-- top bar starts here -->
  <div class="top-bar">
    <div class="top-nav">
      <a href="index.html"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
      <ul class="top-nav-list">
        <li class="top-nav-listItem Home"><a href="home">Home</a></li>
        <li class="top-nav-listItem catalogue"><a href="/catalogue">Catalogue</a></li>

        <?php
        $sid = md5(session_id());

        if(isset($_SESSION['username'])){
          $username = ucwords($_SESSION['username']);
          ?>
          <li class="top-nav-listItem login"><?php echo $username ?></li>
          <li class="top-nav-listItem register"><a href="/logout">Logout</a></li>
        <?php }else { ?>
          <li class="top-nav-listItem login"><a href="/users_login">Login</a></li>
          <li class="top-nav-listItem register"><a href="/users_registration">Register</a></li>
        <?php } ?>


        <li class="top-nav-listItem cart">
          <div class="cart-item-indicator">

            <?php
            include_once 'class.Checkout.php';
            if(isset($_SESSION['id'])) {
              $quantity = new Checkout();

              # assigning object->method to variable
              // getting the total number of items in the cart
              $quan = $quantity->quantity($conn, $_SESSION['id']);
              ?>


              <!-- echoing the total number of items in the cart -->

              <p><?php echo $quan; ?></p>
            <?php  }elseif(!isset($_SESSION['id'])) {

              $quantity = new Checkout();
              $quant = $quantity->quantity($conn, $sid);
              ?>

              <p><?php echo $quant; ?></p>
            <?php }?>
          </div>
          <a href="/cart">Cart</a>
        </li>
      </ul>
      <form class="search-brainfood">
        <input type="text" class="text-field" placeholder="Search all books">
      </form>
    </div>

  </div>
