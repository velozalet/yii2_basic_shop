<?php 
use yii\bootstrap\ActiveForm;

//print_r($session['cart']);

//echo Yii::$app->session->getFlash('message'); - сообщение о покупке

if( count($session) != 0 ) : ?>

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
		foreach ($session as $product) {
			echo '<tr>';
			$path = ($product['img']) ? Yii::$app->backendUrlManager->createUrl($product['img']) :
		'http://placehold.it/350x150';
			echo '<td><img src="'.$path.'" alt="'.$product['name'].'" class="img-responsive"></td>';
			echo '<td>'.$product['name'].'</td>';
			echo '<td>'.$product['qty'].'</td>';
			echo '<td>'.$product['price']*$product['qty'].'</td>';
			echo '<td><span class="glyphicon glyphicon-remove text-danger del-product" data-id="'.$product['id'].'"></span></td>';
			echo '</tr>';
		}
		?>
	</tbody>
</table>

<!-- выводим общую сумму заказа в корзине -->
ALL SUMM: <?= $_SESSION['sum']; ?>

<?php
$form = ActiveForm::begin();

echo $form->field($order, 'name');
echo $form->field($order, 'email');

echo '<button class="btn btn-primary">ЗАКАЗАТЬ</button>';
ActiveForm::end();
?>

<?php else: ?>
	BASKET is EMPTY!!
<?php endif; ?>
