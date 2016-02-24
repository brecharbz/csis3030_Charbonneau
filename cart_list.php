<?php

include ("global.php");
include ("header.php");


$result = mysqli_query($connection, "select * from cart join products on (cart.product_id = products.id) where session_id = '".session_id()."'");

?>

<form action="cart_process.php" method="POST" enctype="multipart/form-data">

<?
while ($row = mysqli_fetch_assoc($result)) {
		//echo $row["product_name"] . "<br/>";
		//echo $row["description"] . "<br/>";
		echo'Product Name: '. $row['product_name'] .'</br>';  
		echo'Description: '. $row['description'] .'</br>';  
		echo'Quantity: <input type="text" size="2" maxlength="2" name="quantity['.$product_id.']" value="'. $row['quantity'] .'" /></br>';   
		echo "<img src='images/" . $row["image"] . "' width=250px>" . "<br/><br/></br>"; 
        echo "</br></br>";     
}

?>

<input type="submit" value="Update Cart" name="updatecart"></br>
<input type="submit" value="Checkout" name="checkout">

</form>

<?


include("footer.php");

?>



