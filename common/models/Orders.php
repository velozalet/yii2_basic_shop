<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property double $summa
 * @property string $name
 * @property string $email
 * @property string $data
 *
 * @property OrderItems[] $orderItems
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['summa', 'name', 'email'], 'required'],
            [['summa'], 'number'],
            [['data'], 'safe'],
            [['name', 'email'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'summa' => 'Summa',
            'name' => 'Name',
            'email' => 'Email',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['id_order' => 'id']);
    }
}
