<?php
	include '../connect.php';

	// Если значение POST пустое присваиваем 0
	if ($_POST['minPrice'] == '') $minPrice = 0;
	else $minPrice = $_POST['minPrice'];

	if ($_POST['maxPrice'] == '') $maxPrice = 0;
	else $maxPrice = $_POST['maxPrice'];

	$sql = 'SELECT name, price, quantity, quality FROM items WHERE price >= :minPrice AND price <= :maxPrice';

	$sth = $dbh->prepare($sql);
	$sth->bindValue(':minPrice', $minPrice);
	$sth->bindValue(':maxPrice', $maxPrice);
	$sth->execute();
	$res = $sth->fetchAll(PDO::FETCH_ASSOC);

	// Сообщение, если res пустой
	if (!$res) echo '<h3>Товар не найден!</h3>';
	else {
		echo '<table border = "1">';
		echo '<captoin><b>Min price: '.$minPrice.'; Max price: '.$maxPrice.'</b></caption>';
		echo '<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Quality</th>
		</tr>';

		foreach($res as $row) {
			echo '<tr>
				<td>'.$row['name'].'</td>
				<td>'.$row['price'].'</td>
				<td>'.$row['quantity'].'</td>
				<td>'.$row['quality'].'</td>
			</tr>';
		}
		echo '</table>';
	}
