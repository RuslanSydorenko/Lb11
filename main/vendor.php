<?php
	include '../connect.php';

	$vendor = $_POST['vendor'];

	$sql = 'SELECT name, price, quantity, quality FROM items inner JOIN vendors ON FID_Vendor = ID_Vendors WHERE v_name = :vendor';

	$sth = $dbh->prepare($sql);
	$sth->bindValue(':vendor', $vendor);
	$sth->execute();
	$res = $sth->fetchAll(PDO::FETCH_ASSOC);

	echo '<table border = "1">';
	echo '<captoin><b>Vendor '.$vendor.'</b></caption>';
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