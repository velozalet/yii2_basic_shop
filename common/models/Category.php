<?php
namespace common\models;
use Yii;
use yii\db\ActiveRecord; //если Модель связана с БД подключ. use yii\db\ActiveRecord если нет, то подкл. use yii\base\Model


class Category extends ActiveRecord {
    /** 

    */
    public static function tableName()
    {
        return 'category';
    }

    /** 
    
    */
    public function getProducts()
    {
       return $this->hasMany( Product::className(), ['category_id'=>'id'] ); //указываем связь
    }


    public function getCategory()
    {
       return $this->hasOne( Category::className(), ['id'=>'parent_id'] ); //указываем связь
    }


    public function rules()
    {
       return [
        ['name', 'required'],
        [['parent_id', 'description','meta_description', 'meta_keywords'], 'safe']
       ];
    }

}  //__/class Category
