<h2>Спасибки за покупки!!</h2>

<table class="table"> 
	<thead>
		<tr>
			<td>Изображение</td>
			<td>Назвпние</td>
			<td>Кол-во</td>
			<td>ЦЕНА</td>
		</tr>
	</thead>

	<tbody>
		<?php 
		foreach ($_SESSION['cart'] as $product) {
			echo '<tr>';
			$path = ($product['img']) ? Yii::$app->backendUrlManager->createUrl($product['img']) :
		'http://placehold.it/350x150';
			echo '<td><img src="'.$path.'" alt="'.$product['name'].'" class="img-responsive"></td>';
			echo '<td>'.$product['name'].'</td>';
			echo '<td>'.$product['qty'].'</td>';
			echo '<td>'.$product['price']*$product['qty'].'</td>';
			echo '</tr>';
		}
		?>
	</tbody>
</table>

<!-- выводим общую сумму заказа в корзине -->
ALL SUMM: <?= $_SESSION['sum']; ?>

