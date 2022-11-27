<form method="POST" action="showselect.php">
<select name="brands">
<?php 
include("../controllers/product_controller.php");

$result=select_all_brands_ctr();

$i=0;
while($i<count($result)){
	?>
	<option value="<?php echo $result[$i]['brand_id']; ?>"><?php echo $result[$i]['brand_name']; ?></option>

	<?php

	$i++;
}



?>
</select>
<input type="submit" name="send">
</form>