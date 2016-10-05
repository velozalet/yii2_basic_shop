<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property double $price
 * @property string $description
 * @property string $stock
 * @property string $new
 * @property string $sale
 * @property string $meta_description
 * @property string $meta_keywords
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['price'], 'number'],
            [['description', 'stock', 'new', 'sale'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['meta_description'], 'string', 'max' => 256],
            [['meta_keywords'], 'string', 'max' => 150],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            ['imageFile', 'file', 'extensions'=>'png, jpg'],
            ['imageFile', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'description' => 'Description',
            'stock' => 'Stock',
            'new' => 'New',
            'sale' => 'Sale',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function upload()
    {
        $file = $this->imageFile;
        $file->saveAs('uploads/'.$file->baseName.'.'.$file->extension);

        $this->img_path = 'uploads/'.$file->baseName.'.'.$file->extension;

    }

}
