<?php
//connect to the user account class
require("../classes/product_class.php");

//sanitize data


//--Insert Brand--//
function add_brand_ctr($name){
	$addbrand=new product_class();
	return $addbrand->add_brand($name);
}

//--Select All Brands--//
function select_all_brands_ctr(){
	$seebrands=new product_class();
	return $seebrands->select_all_brands();
}

//--Insert Category--//
function add_category_ctr($name){
	$addcategory=new product_class();
	return $addcategory->add_category($name);
}

//--Select All Categories--//
function select_all_categories_ctr(){
	$seecategories=new product_class();
	return $seecategories->select_all_categories();
}
//--UPDATE--//
function update_brand_ctr($name,$id){
	$updatebrand=new product_class();
	return $updatebrand->update_brand($name,$id);
}

function update_category_ctr($name,$id){
	$updatecategory=new product_class();
	return $updatecategory->update_category($name,$id);
}

function update_product_ctr($cid,$bid,$title,$price,$image,$keywords,$description,$id){
	$updateproduct=new product_class();
	return $updateproduct->update_product($cid,$bid,$title,$price,$image,$keywords,$description,$id);
}
//--DELETE--//
function delete_brand_ctr($id){
	$deletebrand=new product_class();
	return $deletebrand->delete_brand($id);
}

function delete_category_ctr($id){
	$deletecategory=new product_class();
	return $deletecategory->delete_category($id);
}

function delete_product_ctr($id){
	$deleteproduct=new product_class();
	return $deleteproduct->delete_product($id);
}

function select_brand_ctr($id){
	$select=new product_class();
	return $select->select_brand($id);
}

//--Insert Product--//
function add_product_ctr($cid,$bid,$title,$price,$image,$keywords,$description){
	$addproduct=new product_class();
	return $addproduct->add_product($cid,$bid,$title,$price,$image,$keywords,$description);
}

//--Select Products--//
function select_all_products_ctr(){
	$seeproducts=new product_class();
	return $seeproducts->select_all_products();
}

function select_one_product_ctr($id){
	$oneproduct=new product_class();
	return $oneproduct->select_one_product($id);
}

function select_one_brand_ctr($id){
	$onebrand=new product_class();
	return $onebrand->select_one_brand($id);
}

function select_one_category_ctr($id){
	$onecategory=new product_class();
	return $onecategory->select_one_category($id);
}

function search_products_ctr($input){
	$searchproducts=new product_class();
	return $searchproducts->search_products($input);
}
function count_cart_ctr($cid,$ip){
	$countcart=new product_class();
	return $countcart->cart_count($cid,$ip);
}

?>