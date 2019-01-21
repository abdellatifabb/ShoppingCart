
<link rel="stylesheet" type="text/css" href="Assets/Css/bootstrap.min.css">
<?php
include 'cart.php';
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="panier.php"</script>';
			}
		}
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "empty")
	{
		unset($_SESSION["shopping_cart"]);
	}
}
	 ?>
	 
<div style="clear:both"></div>
<div class="container">
	<br />
			<h3>Votre panier</h3>
			<br>
			<a style = "margin-left:40px;" href="panier.php?action=empty"><span class="text-danger">Effacer<i class='fas fa-trash-alt'></i>Panier</span></a>
	<div class="table-responsive">
					<table class="table">
						<tr>
							<th width="40%">Nom de l'article</th>
							<th width="10%">Quantité</th>
							<th width="20%">Prix</th>
							<th width="15%">Total</th>
							<th width="5%">action</th>
						</tr>
						<?php
						if(!empty($_SESSION["shopping_cart"]))
						{
							$total = 0;
							foreach($_SESSION["shopping_cart"] as $keys => $values)
							{
						?>
						<tr>
							<td><?php echo $values["item_name"]; ?></td>
							<td><?php echo $values["item_quantity"]; ?></td>
							<td><?php echo $values["item_price"]; ?> MAD </td>
							<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> MAD </td>
							<td><a href="panier.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
						</tr>
						<?php
								$total = $total + ($values["item_quantity"] * $values["item_price"]);
							}
							$_SESSION['mtt'] = $total;

						?>
						
						
						<tr>
							<td colspan="3" align="right">Total</td>
							<td align="right"><?php echo number_format($total, 2); ?> MAD </td>
						</tr>
						<?php
						}
						?>
							
					</table>
				
	</div>

</div>
			