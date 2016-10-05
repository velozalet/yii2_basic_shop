<?php 
//echo '<pre>'.print_r($model,true).'</pre>';
use yii\widgets\DetailView;

$this->title = $model->name;
echo "<h2>".$this->title."</h2>";

echo DetailView::widget([
    'model'=>$model,
    'attributes'=>[
        'name',
        'description',
        'parent_id',
        'meta_keywords',
        'meta_description',
    ]
]);







?>