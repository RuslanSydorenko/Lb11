<?php
	include '../connect.php';

	$category = $_POST['category'];		// Передаем значение через POST

	// Формируем SQL запрос
	$sql = 'SELECT name, price, quantity, quality FROM items inner JOIN category ON FID_Category = ID_Category WHERE c_name = :category';

	$sth = $dbh->prepare($sql);	// Инициализация подготовленого запроса
	$sth->bindValue(':category', $category); // Подставляем значение в переменную :category	
	$sth->execute(); // Выполняем подготовленный запрос
	$res = $sth->fetchAll(PDO::FETCH_ASSOC); // ЗАписываем результат в виде ключ-значение

	// Выводим таблицу
	echo '<table border = "1">';
	echo '<captoin><b>Category '.$category.'</b></caption>';
	echo '<tr>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Quality</th>
	</tr>';

	// Цикл с выводом строк таблицы со значениями
	foreach($res as $row) {
		echo '<tr>
			<td>'.$row['name'].'</td>
			<td>'.$row['price'].'</td>
			<td>'.$row['quantity'].'</td>
			<td>'.$row['quality'].'</td>
		</tr>';
	}
	echo '</table>';