<?php 
include('APIrest.php');
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Liste</title>
	<link rel="stylesheet" type="text/css" href="Assets/Css/bootstrap.min.css">
</head>
<body>
	<?php 
		$total = 0;
		if(isset($_SESSION['shopping_cart'])){
	foreach ($_SESSION['shopping_cart'] as $key => $value) {
				$total +=$value['item_price'] * $value['item_quantity'];
			}
		}
			
		 ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="panier.php">Total en votre panier :  <?php echo $total . ' MAD'; ?></a>
  </div>
</nav>
	<div class="container">
		
		<?php if (isset($_COOKIE['msg'])) { ?>
	<span class="alert alert-danger"><?php echo $_COOKIE['msg']; ?></span>
	<h1>La liste des produits : </h1>
<?php } ?>

<div class="row mt-5">
	<?php $Product = getALlProduct();
			foreach ($Product as $key => $Product) {
	 ?>
<div class="col-sm-8 col-md-4">
	<div class="card">
		  <img class="card-img-top" src="<?php echo $Product['Image']; ?>" alt="Card image cap">
		 	<div class="card-body">
		    <h5 class="card-title"><?php echo $Product['libelle']; ?></h5>
		    <p class="card-text"><?php echo $Product['description'] .' <br>'.$Product['price'].' MAD'; ?>
		    <form action="cart.php?id=<?php echo $Product['id']; ?>" method="post">
		    <input style="width: 50px;" type="number" name="qte" min="1" value="1" max="<?php echo $Product['QteEnStock']; ?>">
		    <input type="hidden" name="hidden_name" value="<?php echo $Product['libelle']; ?>" />
		    <input type="hidden" name="hidden_price" value="<?php echo $Product['price']; ?>" />
		    <button name="add" class="btn btn-primary float-right">add</button>
		    </form>
		    </p>
			</div>

	</div>


</div>
<?php } ?>

</div>
</div>
</body>
</html>
