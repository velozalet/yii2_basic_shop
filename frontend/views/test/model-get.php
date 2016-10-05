<?php 
echo '<pre>'.print_r($post, true).'</pre>';  //просмотреть что в POST (благодаря этой строке из Контролеера 'post'=>Yii::$app->request->post())

echo $model->firstname.'<br>';
echo $model->lastname.'<br>';
echo $model->email.'<br>';


