<?php 
	include 'connect.php';	// Подключаем файл connect.php для работы с БД
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lb_1</title>
</head>
<body>
	<div class="forms">
		<form action="main/vendor.php" method="post">
			<p>Vendor:</p>
			<select name="vendor">
				<?php
					// Запрос на имена производителей и вывод их в выпадающем списке
					$sql = "SELECT v_name FROM vendors";
					foreach($dbh->query($sql) as $row) {
						echo '<option value="'.$row["v_name"].'">'.$row["v_name"].'</option>';
					}
				?>
			</select>
			<input type="submit" name="btn" value="Submit">
		</form>
		<form action="main/category.php" method="post">
			<p>Category:</p>
			<select name="category">
				<?php
					// Запрос на доступные категории
					$sql = "SELECT c_name FROM category";
					foreach($dbh->query($sql) as $row) {
						echo '<option value="'.$row["c_name"].'">'.$row["c_name"].'</option>';
					}
				?>
			</select>
			<input type="submit" name="btn" value="Submit">
		</form>
		<form action="main/price.php" method="post">
			<p>Min price:</p>
			<input type="number" min = "0" name="minPrice">
			<p>Max price:</p>
			<input type="number" min = "0" name="maxPrice">
			<input type="submit" name="btn" value="Submit">
		</form>
	</div>
</body>
</html>