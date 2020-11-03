<?php
require 'db.php';
require 'florista.php';

$db= new Database();
$florista = new product($db->connect());

$msg="Record is not deleted";
$status="ERROR";
$florista->id=$_GET['id']??"NA";

if($florista->delete()>0){

	$msg="Record is deleted";
	$status="OK";
}

$url ="Location: showrec.php?status=$status&msg=$msg";
header($url);
?>