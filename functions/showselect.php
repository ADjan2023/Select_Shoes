<?php
include("../controllers/product_controller.php");
$brand=$_POST['brands'];
echo $brand;

echo "<table>";
   echo "<tr>";
   $result=select_all_products_ctr();
   $i=0;
   while($i<count($result))
   {
   echo "<td>"; 
   echo $result[$i]['product_title'];
   echo "<tr><td><img src='../images/products/".$result[$i]['product_image']. "'"." height='200'  ></td></tr>";
   echo "<br>";

   echo "</td>";
   $i++;
   } 
   echo "</tr>";
   
   echo "</table>";
  
?>
