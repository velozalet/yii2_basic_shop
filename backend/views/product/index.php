<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=> 'Изображение',
                'format'=>'raw',
                'value'=>function($data) {
                    if($data->img_path) {
                        return Html::img('/'.$data->img_path, ['style'=>'width:100px']);
                    }
                    else {
                        return Html::img('http://placehold.it/100x80', ['style'=>'width:100px']); //рыба заглушка в случае отсутствия картинки
                    }
                    
                }
            ],
            //'id',
            'name',
            'category_id',
            'price',
            'description:ntext',
            // 'stock',
            // 'new',
            // 'sale',
            // 'meta_description',
            // 'meta_keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
