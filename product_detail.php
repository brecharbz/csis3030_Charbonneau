<?php
 
	include("global.php");
	include("header.php"); 

//i have a variable available to me, sent via GET called "category_id"
	//product_list.php?category_id=7

$product_id = intval($_GET["product_id"]); 
//put in part 1 of part 2


$result = mysqli_query($connection, "select * from products where id = $product_id");
while ($row = mysqli_fetch_assoc($result)) {
		echo $row["product_name"] . "<br/>";
		echo $row["description"] . "<br/>";
		echo "<img src='images/" . $row["image"] . "' width=250px>" . "<br/><br/></br>";

}

	?>

<form action="cart_process.php" method="POST" enctype="multipart/form-data">

<?php 
echo 'Quantity: <input type="text" name="product_' . $product_id . '" size="3"><br/><br/>' 
?>


<input type="submit" value="Add To Cart">


</form>


<?

	include("footer.php");
?>
