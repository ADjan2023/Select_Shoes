<?php
//connect to database class
require("../settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

class product_class extends db_connection
{
	//--INSERT--//
	public function add_brand($name)
	{
		$sql="INSERT INTO `brands`(`brand_name`) VALUES ('$name')";
		/*$db1=new db_connection
		return $db1.db_query($sql);*/
		return $this->db_query($sql);
	}

	public function add_category($name)
	{
		$sql="INSERT INTO `categories`(`cat_name`) VALUES ('$name')";
		/*$db1=new db_connection
		return $db1.db_query($sql);*/
		return $this->db_query($sql);
	}

	public function select_all_brands()
	{
		$sql="SELECT * FROM `brands`";
		return $this->db_fetch_all($sql);
	}

	public function select_one_brand($id)
	{
		$sql="SELECT * FROM `brands` where `brand_id`='$id'";
		return $this->db_fetch_one($sql);
	}

	public function select_one_category($id)
	{
		$sql="SELECT * FROM `categories` where `cat_id`='$id'";
		return $this->db_fetch_one($sql);
	}

	public function select_all_categories()
	{
		$sql="SELECT * FROM `categories`";
		return $this->db_fetch_all($sql);
	}

	public function update_brand($name,$id)
	{
		$sql="UPDATE `brands` SET `brand_name`='$name' WHERE `brand_id`=$id";
		/*$db1=new db_connection
		return $db1.db_query($sql);*/
		return $this->db_query($sql);
	}

	public function update_category($name,$id)
	{
		$sql="UPDATE `categories` SET `cat_name`='$name' WHERE `cat_id`=$id";
		/*$db1=new db_connection
		return $db1.db_query($sql);*/
		return $this->db_query($sql);
	}

	public function update_product($cid,$bid,$title,$price,$keywords,$description,$sizes,$id)
	{
		$sql="UPDATE `products` SET `product_cat`='$cid',`product_brand`='$bid',`product_title`='$title',`product_price`='$price',`product_desc`='$description',`product_keywords`='$keywords',`product_sizes`='$sizes' WHERE `product_id`='$id'";
		
		return $this->db_query($sql);
	}

	public function update_image($image,$id)
	{
		$sql="UPDATE `products` SET `product_image`='$image' WHERE `product_id`='$id'";
		
		return $this->db_query($sql);
	}
	
	public function delete_brand($id)
	{
		$sql="DELETE FROM `brands` WHERE `brand_id`=$id";
		return $this->db_query($sql);
	}

	public function delete_category($id)
	{
		$sql="DELETE FROM `categories` WHERE `cat_id`=$id";
		return $this->db_query($sql);
	}	

	public function select_brand($id)
	{
		$sql="SELECT * FROM `brands` WHERE `brand_id`=$id";
		return $this->db_fetch_one($sql);
	}	
	
	public function add_product($cid,$bid,$title,$price,$image,$keywords,$description,$sizes)
	{
		$sql="INSERT INTO `products`( `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`,`product_sizes`) VALUES ('$cid','$bid','$title','$price','$description','$image','$keywords','$sizes')";
		return $this->db_query($sql);
	}

	public function select_all_products()
	{
		$sql="SELECT * FROM `products`";
		return $this->db_fetch_all($sql);
	}

	public function select_one_product($id)
	{
		$sql="SELECT * FROM `products` WHERE `product_id`='$id'";
		return $this->db_fetch_one($sql);
	}

	public function delete_product($id)
	{
		$sql="DELETE FROM `products` WHERE `product_id`=$id";
		return $this->db_query($sql);
	}

	public function search_products($input)
	{
		$sql="SELECT * FROM `products` WHERE `product_title` LIKE '%$input%'";
		return $this->db_fetch_all($sql);
	}
	public function cart_count($cid,$ip)
	{
		$sql="SELECT SUM(`qty`) as `cart_num` FROM `cart` WHERE `c_id`='$cid' ";
		return $this->db_fetch_one($sql);
	}

	public function view_orders()
	{
		$sql="SELECT customer.customer_name, customer.customer_email,orders.invoice_no, orders.order_id, orders.order_date,orders.deliv_status, orders.order_status FROM orders,customer WHERE orders.customer_id=customer.customer_id  and orders.order_complete='No'  ORDER BY orders.order_date DESC ";
		return $this->db_fetch_all($sql);
	}
	public function view_one_order($oid)
	{
		$sql="SELECT orderdetails.qty, orderdetails.shoe_size ,products.product_title, payment.amt, orders.order_id FROM orders,orderdetails,payment,products WHERE orders.order_id=orderdetails.order_id and orders.order_id=payment.order_id and orderdetails.product_id=products.product_id and orders.order_id='$oid'; ";
		return $this->db_fetch_all($sql);
	}

	public function update_deliv($status,$oid)
	{
		$sql="UPDATE `orders` set `deliv_status`='$status' where `order_id`='$oid'";
		return $this->db_query($sql);
	}

	public function complete_order($oid)
	{
		$sql="UPDATE `orders` SET `order_complete`='Yes' WHERE `order_id`='$oid'";
		return $this->db_query($sql);
	}

	public function select_customer($cid)
	{
		$sql="SELECT * FROM `customer` WHERE `customer_id`='$cid'";
		return $this->db_fetch_one($sql);
	}

	public function select_newsletter()
	{
		$sql="SELECT * FROM `customer` WHERE `newsletter`='Yes'";
		return $this->db_fetch_all($sql);
	}

	public function update_newsletter($id,$status)
	{
		$sql="UPDATE `customer` set `newsletter`='$status' where `customer_id`='$id'";
		return $this->db_query($sql);
	}

	public function select_cat_products($id)
	{
		$sql="SELECT * FROM `products` where `product_cat`=$id";
		return $this->db_fetch_all($sql);
	}

	public function select_brands_products($id)
	{
		$sql="SELECT * FROM `products` where `product_brand`=$id";
		return $this->db_fetch_all($sql);
	}


public function show_all_adverts()
	{
		$sql="SELECT * FROM `advertisement` where `Approved`='Yes' LIMIT 4";
		return $this->db_fetch_all($sql);
	}

}
?>