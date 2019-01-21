<?php 

function getALlProduct(){
	include("Connect.php");
	$product = array();
	$i=0;
	$req = mysqli_query($conn,"SELECT * FROM `Product`");
	while ($row = mysqli_fetch_array($req)) {
		$i++;
		$product[$i] = $row;
	}
	return $product;

}

 ?>