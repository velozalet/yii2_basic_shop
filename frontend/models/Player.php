<?php 
namespace frontend\models;
use yii\db\ActiveRecord;

/**
 * Класс связан с табл. `players`
*/
class Player extends ActiveRecord {

    public static function tableName()  
    { //необходимо прописывать когда имя Класса Модели не совпадает с именем табл.БД с кот.работаем тут
        return 'player';
    }


    public function rules() //правила,кот.будут использоваться при заполнении Формы
    {
        return [
            [ ['name', 'active'], 'required', 'message'=> 'not right somethin !!' ],
            ['age', 'integer'],
             [ 'active', 'in', 'range'=>[0,1] ],
        ];
        /* 'message'=> 'not right E--mail!!' - задаем свои сообщения об ошибке пустых полей*/
    }


} //__/class Player

?>
