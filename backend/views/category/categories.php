<?php 
//echo '<pre>'.print_r($model,true).'</pre>';

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$dataProvider = new ActiveDataProvider([
    'query'=>$model,
    'pagination'=>[
        'pageSize'=>5 //сколько на странице записей выводить - т.е.
    ]
    ]);

//ссылка - создать новуб категорию 
//echo Html::a('Create New Category', '/category/create', ["class"=>'btn btn-primary']);
    //или полдключив доп класс BaseUrl
    echo Html::a('Create New Category', BaseUrl::to('/category/create'), ["class"=>'btn btn-primary']);

echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        //'id',
        ['class'=>'yii\grid\SerialColumn'],  //перенумерует записи(строки результата вывода) начиная с 1 если они были не по поряку
        ['attribute'=>'name', 'label'=>'Category Name',],
        //'parent_id',
        [
            'attribute'=>'parent_id',
            'value'=>function($data) {
                return ($data->category->name=='') ? '' : $data->category->name;
            }
        ],
        'description',
        //'meta_keywords',
        [
            'attribute'=>'meta_keywords',
            'value'=>function($data) { //$data - то,что должно выводиться
                return ($data->meta_keywords=='') ? '' : $data->meta_keywords; //если в базе в поле meta_keywords нет ничего, то выводим пустоту иначе , то что есть
            }, 
            'label'=>'Ключевые слова',
        ],

        'meta_description',
        ['class'=>'yii\grid\ActionColumn'],
    ]
]);






?>