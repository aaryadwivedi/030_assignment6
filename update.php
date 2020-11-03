<?php
require 'db.php';
require 'florista.php';

$db=new Database();
$product1=new product($db->connect());

$product1->id=$_POST['id'];
$product1->name=$_POST['name'];
$product1->price=$_POST['price'];

$msg="Record is not updated";
$status="ERROR";
if($product1->update()>0)
{
	$msg="Record updated successfully";
	$status="OK";
}
$url="Location: updateon.php?status=$status&msg=$msg&id={$product1->id}";
header($url);
?>