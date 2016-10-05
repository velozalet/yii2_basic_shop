<?php

namespace common\widgets;

use common\models\Category;
use Yii\base\Widget;
use Yii;


class CategoryWidget extends Widget
{
    public $data;

    public function run() //echo 'Hello!'; -чтобы проверить
    {
        $this->data = Category::find()->asArray()->all(); //print_r($this->data);

        echo '<ul>';
        foreach ($this->data as $category) {
            echo '<li><a href="/category/view?id='.$category['id'].'">'.$category['name'].'</a></li>';
        }
        echo '</ul>';

    }


} //class CategoryWidget