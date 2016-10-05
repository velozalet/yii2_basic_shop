<?php 
//echo '<pre>'.print_r($post, true).'</pre>';

// echo $model->firstname; -было для примера чтобы посмотреть что передали из контроллера сюда
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
	echo $form->field($model, 'name');
	echo $form->field($model, 'age');
	echo $form->field($model, 'active')->checkbox();

	echo Html::submitButton('Send', ['class'=>'btn btn-primary']);
ActiveForm::end();