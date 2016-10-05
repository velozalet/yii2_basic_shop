<?php 
// echo $model->firstname; -было для примера чтобы посмотреть что передали из контроллера сюда
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
	echo $form->field($model, 'firstname');
	echo $form->field($model, 'lastname');
	echo $form->field($model, 'email');

/*
	echo $form->field($model, 'firstname')->textarea( [   //поле как textarea +задаем размеры для textarea и стили CSS
		'cols'=>20, 'rows'=>7, 'style'=>'border:1px solid red'
	] ); 

	echo $form->field($model, 'firstname')->textInput( [   //вариант вставить в <input> placeholder
		'placeholder'=>$model->attributeLabels()['firstname'] ]);

	echo $form->field($model, 'firstname')->dropDownList( [ //создать dropdown
		'1'=>'red',
		'2'=>'green',
		'3'=>'grey',
		'4'=>'yellow',
		] );

		echo $form->field($model, 'firstname')->radio();
		echo $form->field($model, 'firstname')->checkBox();
*/
	echo Html::submitButton('Send', ['class'=>'btn btn-primary']);
ActiveForm::end();