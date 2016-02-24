<?php

include ("global.php");
include ("header.php");




$nameErr = $addressErr = $cityErr = $stateErr = $zipErr = array();
$name = $address = $city = $state = $zip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = ($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }


  if (empty($_POST["address"])) {
    $address = "";
  } else {
    $address = ($_POST["address"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\d+[ ](?:[A-Za-z0-9.-]+[ ]?)+(?:Avenue|Lane|Road|Boulevard|Drive|Street|Ave|Dr|Rd|Blvd|Ln|St)\.?/",$address)) {
      $addressErr = "Address is Invalid."; 
    }
  }

    if (empty($_POST["city"])) {
    $city = "";
  } else {
    $city = ($_POST["city"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[^0-9\#\$\@\+]*$/",$city)) {
      $cityErr = "City is Invalid."; 
    }
  }

   if (empty($_POST["state"])) {
    $state = "";
  } else {
    $state = ($_POST["state"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/.*, [A-Z][A-Z]/",$state)) {
      $stateErr = "State is Invalid."; 
    }
  }

   if (empty($_POST["zip"])) {
    $zip = "";
  } else {
    $zip = ($_POST["zip"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/[0-9]\{5\}(-[0-9]\{4\})?/",$zip)) {
      $zipErr = "Zip is Invalid."; 
    }
  }





}


echo "<h2>Order Placed For:</h2>";
echo $name;
echo "<br>";
echo $address;
echo "<br>";
echo $city;
echo "<br>";
echo $state;
echo "<br>";
echo $zip;

include("jwu_mail.php");

      jwu_mail("Bcharbonneau01@wildcats.jwu.edu","Information","Name: $name \n\n Address: $address \n\n City: $city \n\n State: $state \n\n Zip: $zip \n\n Product: $product_name \n\n Description: $description \n\n Quantity: $quantity \n\n Image: $image" );

    echo "The email has been sent.</br></br>";



$result = mysqli_query($connection, "select * from cart join products on (cart.product_id = products.id) where session_id = '".session_id()."'");

?>

<form action="checkout_process.php" method="POST" enctype="multipart/form-data">

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
</form>

<?

include ("footer.php");
?>