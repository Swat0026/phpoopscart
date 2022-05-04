<?php

session_start();
// session_unset();
// session_destroy();
require ("cart-class.php");


?>






<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="hi.css" type="text/css" rel="stylesheet">
	<link href="hi2.css" type="text/css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<?php include 'header.php'  ?>
	<div id="main">
		<?php

		if(isset($_SESSION['cart'])&& count($_SESSION['cart'])!=0){
			$css="cart active";

		}else {
			$css="cart";
		}

		?>



		<div class="<?php echo $css; ?>">
			



			<table>
				<tr>
					<th>
						Product Id
					</th>
					<th>
						Name
					</th>
					<th>
						Quantity
					</th>
					<th>
						Price
					</th>
					<th>
						Sub-total
					</th>
					<th>
						Remove
					</th>
				</tr>
				<tr>
					<td class="cart-items" colspan="6">Cart Items
						<span><?php echo Cart::getNumberOfCartItems(); ?></span>




					</td>
				</tr>
				<?php

				foreach ($_SESSION['cart'] as $value) {
					?>
					
					<tr> <!-- The product html template -->
				<td><img src="images/<?=$value["image"]?>"/></td>
				<td><?php echo $value['name'] ?></td>
				<td>
					<form action="script.php" method="get" autocomplete="off">
						<span>Quantity</span>
						<div class="prod-data">
						<button class="dec-btn">-</button><input class="quant" type="text" name="quant" value="<?php echo $value['quantity'] ?>"><button class="inc-btn">+</button>
						<input type="hidden" name="product-id" value="<?php echo $value['id'] ?>">


						<input type="submit" name="update-quant" value="update Quantity">



					</form>





				</td>
				<td><?php echo number_format($value['price'],2)  ?></td>
				<td>
					<?php echo Cart:: getSubTotal($value['id']); ?>




				</td>
				<td><a href="script.php?remove-product-id=<?php echo $value['id']?>">Remove</a></td>
			</tr>
			</div>
					<?php

				}

				?>






				
			<tr> <!-- The total sum -->
				<td class="total-price" colspan="6">Total Price

				<?php echo Cart:: getTotalPrice();  ?>




				</td>
			</tr>

			<tr> <!-- The clear cart button -->
				<td class="clear-cart" colspan="6"> <a href="script.php?clear-cart">Clear Cart</a> </td>
			</tr>






			</table>
		</div>


          <div id="products">
			  <?php

$data = json_decode(file_get_contents("product.json"));
foreach ($data as $value) {
	?>
	 <div id="product-101" class="product">
				<img src="images/<?=$value->image?>" alt=""/>
				<h3 class="title"><a href="#"><?php echo $value->name ?></a></h3>
				<span><?php echo number_format($value->price, 2) ?></span>
				<a class="add-to-cart" href="script.php?store-product-id=<?php echo $value->id;?>">Add To Cart</a>
			</div>





<?php
}
?>








			<!-- <div id="product-101" class="product">
				<img src="./images/basketball.png">
				<h3 class="title"><a href="#">Product 101</a></h3>
				<span>Price: $150.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/tennis.png">
				<h3 class="title"><a href="#">Product 102</a></h3>
				<span>Price: $120.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/basketball.png">
				<h3 class="title"><a href="#">Product 103</a></h3>
				<span>Price: $90.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/table-tennis.png">
				<h3 class="title"><a href="#">Product 104</a></h3>
				<span>Price: $110.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/soccer.png">
				<h3 class="title"><a href="#">Product 105</a></h3>
				<span>Price: $80.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div> -->
		</div>
	</div>
	<?php include 'footer.php'   ?>
	<script src="cart1.js"></script>
</body>
</html>