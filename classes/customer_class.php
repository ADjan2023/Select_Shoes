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

class customer_class extends db_connection
{
	//--INSERT--//
	public function add_customer($fname,$lname,$email,$password,$country,$city,$contact,$role)
	{
		$sql="INSERT INTO `customer`(`customer_name`,`customer_lname`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `user_role`) VALUES ('$fname', '$lname','$email','$password','$country','$city','$contact','$role')";
		return $this->db_query($sql);
	}

	//--SELECT--//
	public function select_one_customer($id)
	{
		$sql="SELECT * FROM `customer` WHERE `customer_id`='$id'";
		return $this->db_fetch_all($sql);
	}

	public function verify_customer($email)
	{
		$sql="SELECT * FROM `customer` WHERE `customer_email`='$email' ";
		return $this->db_fetch_one($sql);
	}

	public function select_all_customer()
	{
		$sql="SELECT * FROM `customer`";
		return $this->db_fetch_all($sql);
	}


	//--UPDATE--//
	public function update_customer($id,$name,$email,$country,$city,$contact)
	{
		$sql="UPDATE `customer` SET `customer_name`='$name',`customer_country`='$country',`customer_city`='$city',`customer_contact`='$contact' WHERE `customer_id`='$id'";
		return $this->db_query($sql);
	}



	//--DELETE--//
	public function delete_customer($id)
	{
		$sql="DELETE FROM `customer` WHERE `pid`='$id'";
		return $this->db_query($sql);
	}


}

?>