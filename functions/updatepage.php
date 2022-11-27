<?php
include("../controllers/product_controller.php");
$id=$_POST['bid'];
$result=select_brand_ctr($id);
/*print_r($result);*/
?>

<form action="../actions/update_brand.php" method="POST">
	<input type="text" name="bname" placeholder="<?php echo $result['brand_name']; ?>">
	<input type="hidden" name="bid" value="<?php echo $id;  ?>">
	<input type="submit" name="edit" value="update">
</form>