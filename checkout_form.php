<?php

include ("global.php");
include ("header.php");

?>


<form method="post" action="checkout_process.php"> 
   Name: <input type="text" name="name">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Address: <input type="text" name="address">
   <span class="error">* <?php echo $addressErr;?></span>
   <br><br>
   City: <input type="text" name="city">
   <span class="error">* <?php echo $cityErr;?></span>
   <br><br>
   State: <input type="text" name="state">
   <span class="error">* <?php echo $stateErr;?></span>
   <br><br>
	Zip: <input type="text" name="address">
   <span class="error">* <?php echo $zipErr;?></span>
   <br><br>
  
   
   <input type="submit" name="submit" value="Submit"> 
</form>



<?php

include ("footer.php");

?>