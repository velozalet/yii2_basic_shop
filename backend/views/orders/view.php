<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'summa',
            'name',
            'email:email',
            'data',
        ],
    ]) ?>


    <?php 
        //print_r($products); //

echo '<table class="table">';
    foreach ($products as $product) {
        echo '<tr>';
        $prod = Product::find()
            ->where(['id'=>$product['id_product']])
            ->one();

        echo '<td>ТОВАР: '.$prod->name.' </td>';
        echo '<td>КОЛ-ВО: '.$product['qty']. '</td>';
        echo '<td>ЦЕНА: '.$prod['price']. '</td>';
        echo '<td>ИТОГО: '.$prod['price']*$product['qty']. '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>
