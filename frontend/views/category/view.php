<?php 
//echo '<pre>'.print_r($product, true).'</pre>';

foreach ($product as $prod) {

	if($i%3==0) {
		echo '<div class="row single-product">';
	}
	echo '<div class="col-sm-4">';
		echo '<div class="title">'.$prod->name.'</div>';

		$path = ($prod->img_path) ? Yii::$app->backendUrlManager->createUrl($prod->img_path) :
		'http://placehold.it/350x150';

		echo '<img src="'.$path.'" alt="'.$prod->name.'" class="img-responsive">';
		echo '<div class="price">'.$prod->price.'</div>';

		echo '<a href="/product/view?id='.$prod->id.'" class="btn btn-primary"> Learn More </a>';
		echo '<a href="" class="btn btn-success add-cart" data-id="'.$prod->id.'"> Bye </a>';
	echo '</div>';

	$i++;
	if( ($i+3)%3==0 ) { echo '</div>'; }
}

if( ($i+3)%3!=0 ) { echo '</div>'; }