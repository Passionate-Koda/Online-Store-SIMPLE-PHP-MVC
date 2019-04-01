<?php


# title
$page_title = "Checkout";

# body id for css
$body_id = "checkout";
# include header
include 'includes/header2.php';

include_once 'includes/class.Checkout.php';

# user ID
if(isset($_SESSION['id'])){
	$uid = $_SESSION['id'];
}

# instantiating new Object Checkout if user is logged in
if(isset($_SESSION['id'])) {
	
	$checkout = new Checkout();

	$totalPurchase = '$'.$checkout->getTotal($conn, $uid);

} else # if user is not logged in, instantiating object to get total

{
	$checkout = new Checkout();

	$totalPurchase = '$'.$checkout->getTotal($conn, $sid);

	$Tologin = '<a href="/users_login">'."<em>Please Login To Checkout</em>".'</a>';

}


# populating errors array
$errors = [];

# Validating Form for Inserting into Checkout Table
if(array_key_exists('chkt', $_POST)) {

	if(empty($_POST['phoneNumber'])) {
		$errors['phoneNumber'] = "Please Enter Your Phone Number";
	}
	if(empty($_POST['addy'])) {
		$errors['addy'] = "Please Enter the address to be shipped to";
	}
	if(empty($_POST['code'])) {
		$errors['code'] = "Please Enter Post Code";
	}

	if(empty($errors)) {

		$clean = array_map('trim', $_POST);

		$checkout->insertIntoCheckout($conn, $uid, $clean, $totalPurchase);
	}
}


?>

<!-- main content starts here -->
<div class="main">
	<div class="checkout-form">

		<!-- Form For Checkout -->
		<form class="def-modal-form" action="" method="POST">
			<div class="total-cost">
				<!-- if user is not logged in, tell user to login before checkout -->
				<h3>	<?php echo $totalPurchase; ?> Total Purchase <?php if(!isset($_SESSION['id'])) echo '<hr>'.$Tologin ?></h3>


			</div>

			<div class="cancel-icon close-form"></div>
			<label for="login-form" class="header"><h3>Checkout</h3></label>
			<input type="number" maxlength="11" name="phoneNumber" class="text-field phone" placeholder="Phone Number">
			<?php $display =  displayErrorsUser($errors, 'phoneNumber'); echo $display; ?>

			<input type="text" name="addy" class="text-field address" placeholder="Address">
			<?php $display =  displayErrorsUser($errors, 'addy'); echo $display; ?>

			<input type="text" name="code" class="text-field post-code" placeholder="Post Code">
			<?php $display =  displayErrorsUser($errors, 'code'); echo $display; ?>

			<input type="submit" name="chkt" class="def-button checkout" value="Checkout">
		</form>
	</div>
</div>
<?php include 'includes/footer.php'; ?>
