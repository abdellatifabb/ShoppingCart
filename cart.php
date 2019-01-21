<?php 
session_start();

if (isset($_POST['add'])){
		if(isset($_SESSION["shopping_cart"])){
		$item_array_id = array_column($_SESSION["shopping_cart"], 'item_id');
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["qte"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
		}
	}else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["qte"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
	header('location: index.php');
	
}


 ?>