<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\models\Category;
use yii\helpers\ArrayHelper;

$this->title = 'New Category';
echo '<h2>'.$this->title.'</h2>';

$form = ActiveForm::begin();
	echo $form->field($model, 'name');

	$allCategory = Category::find()->asArray()->all(); //получаем из бащы все категории
	$list = ArrayHelper::map($allCategory, 'id', 'name');

	// echo $form->field($model, 'parent_id')->dropDownList(
	// 	[
	// 		'1'=>'text1',
	// 		'2'=>'text2',
	// 	]
	// );
	
	echo $form->field($model, 'parent_id')->dropDownList($list);

	echo $form->field($model, 'description')->textarea();
	echo $form->field($model, 'meta_keywords');
	echo $form->field($model, 'meta_description')->textarea();

	echo Html::submitButton($btn, ['class'=>'btn btn-primary']);  //$btn переменная из контроллнра

$form = ActiveForm::end();



?>