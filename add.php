<?php
require 'db.php';
require 'florista.php';

$db=new Database();
$product1=new product($db->connect());

$product1->id=$_POST['id'];
$product1->name=$_POST['name'];
$product1->price=$_POST['price'];

$msg="Record is not saved";
$status="ERROR";
if($product1->add()>0)
{
	$msg="Record saved successfully";
	$status="OK";
}
$url="Location: addon.php?status=$status&msg=$msg";
header($url);
?>