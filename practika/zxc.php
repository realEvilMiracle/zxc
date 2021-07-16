<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "zxc");
mysqli_query($connect, "SET NAMES utf8");
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Товар уже добавлен в корзину!")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Товар удалён из корзины!")</script>';
				echo '<script>window.location="zxc.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Andromeda</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
	<header class="header">
        <div class="container">
            <div class="header_body">
                <a href="#" class="header_logo">
                    <img src="img/logo/logo.PNG">
                </a>
                <div class="header_burger">
                    <span></span>
                </div>
                <nav class="header_menu">
                    <ul class="header_list">
                        <li><a href="index.html" class="header_link">Главная</a></li>
                        <li><a href="about_us.html" class="header_link">О нас</a></li>
                        <li><a href="zxc.php" class="header_link">Каталог запчастей</a></li>
						<li><a href="productionSearch.php" class="header_link">Поиск товара</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
	
	
		

		<br />
		<div class="content">
		<!-- <div class="col-md">
			<a href="productionSearch.php">Поиск нужного товара</a>
		</div> -->
			<?php
				$query = "SELECT * FROM spares ORDER BY id_zapchasti ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="zxc.php?action=add&id=<?php echo $row["id_zapchasti"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="img/<?php echo $row["zapchast_img"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["zapchast_name"]; ?></h4>

						<h4 class="text-danger"><?php echo $row["Price"]; ?> Рублей</h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["zapchast_name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Добавить в корзину" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Корзина</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Название</th>
						<th width="10%">Кол-во</th>
						<th width="20%">Цена</th>
						<th width="15%">Общая цена</th>
						<th width="5%">Действие</th>
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
						<td><?php echo $values["item_price"]; ?> Рублей</td>
						<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> Рублей</td>
						<td><a href="zxc.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Удалить</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Итоговая цена: </td>
						<td align="right"><?php echo number_format($total, 2); ?> Рублей</td>
						<td> <p><input type="submit" value="Заказать"></p></td>
						<?php
						
						require 'includes/connection.php';
						

						?>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>
