<?php 
echo '<pre>'.print_r($product, true).'</pre>';

$this->title = $product->name;
$this->registerMetaTag(['name'=>'keywords', 'content'=>$product->meta_keywords]);
$this->registerMetaTag(['name'=>'description', 'content'=>$product->meta_description]);

$path = ($product->img_path) ? Yii::$app->backendUrlManager->createUrl($product->img_path) :
	'http://placehold.it/350x150';

echo '<p> ID: '.$product->id.'</p>';
echo '<p> NAME: '.$product->name.'</p>';
echo '<img src="'.$path.'">'.$product->name.'</p>';
