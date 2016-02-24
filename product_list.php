<?php
 
	include("global.php");
	include("header.php"); 

//i have a variable available to me, sent via GET called "category_id"
	//product_list.php?category_id=7

$category_id = intval($_GET["category_id"]); 
//put in part 1 of part 2

$result = mysqli_query($connection, "select * from categories where id = $category_id");
//will retrieve one row only

$row = mysqli_fetch_assoc($result);
echo $row["category_name"];

echo "</br></br>";


$result = mysqli_query($connection, "select * from products where category_id = $category_id");
while ($row = mysqli_fetch_assoc($result)) {
		echo $row["product_name"] . "<br/>";
		echo $row["description"] . "<br/>";
		echo "<img src='images/" . $row["image"] . "' width=250px>" . "<br/><br/></br>";
		echo "<a href='product_detail.php?product_id=" . $row["id"] . "'>View Product</a> </br></br>";
		
} 


	include("footer.php");
?>






