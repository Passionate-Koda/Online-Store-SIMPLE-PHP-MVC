<?php
$errors = [];
if(array_key_exists('update', $_POST)){

	$clean = array_map('trim', $_POST);
	editTempCart($conn, $clean);
}

?>
<form class="update" action ="<?php echo "cart.php?cart_id=".$row['tempCart_id']; ?>" method ="POST">

	<input type="number" class="text-field qty" name="qty" value="<?php echo $row['quantity'] ?>">
	<input type="hidden" name="cartid" value="<?php echo $row['tempCart_id']; ?>">
	<input type="submit" class="def-button change-qty" name="update" value="Change Qty">

</form>
