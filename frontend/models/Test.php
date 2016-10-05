<?php 
namespace frontend\models;
use yii\base\Model;

/**
 * Model Test НЕ связана с БД
 	public $firstname; public $lastname; public $email; - cвязаны с <input> Фoрмыs
*/
class Test extends Model {

	public $firstname;
	public $lastname;
	public $email;

    public function rules() //правила,кот.будут использоваться при заполнении Формы
    {
    	return [
	    	['email', 'email', 'message'=> 'not right E--mail!!'],
	    	[ ['firstname', 'lastname', 'email'], 'required', 'message'=> 'not right somethin !!' ],
    	];
    	/* 'message'=> 'not right E--mail!!' - задаем свои сообщения об ошибке пустых полей*/
    }


    public function attributelabels() //переoпределяем лейблы для полей input в форме отправки в вью test/model.php
    {
    	return [
	    	'firstname' => 'NAME',
	    	'lastname' => 'LAST NAME',
	    	'email' => 'EMAIL',
    	];
    }


} //__/class TestController

?>
