<?php
 
	include("global.php");
	include("header.php"); 

?>

<br/><br/>

<?php
	$sql = "select * from categories";
	

	$result = mysqli_query($connection,$sql);
	

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<img src='images/" . $row["filename"] . "' width=250px>" . "<br/>";
		echo "Category: " . $row["category_name"] . "<br />";
		echo "Description: " . $row["description"] . "<br />";
		echo "Product Name: " . $row["product_name"] . "<br />";
		echo "Quantity Remaining: " . $row["quantity_remaining"] . "<br />";
		echo "Price: " . $row["price"] . "<br />";


	}


	include("footer.php");
?>



