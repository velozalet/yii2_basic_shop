<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use common\models\Product;

/**
 * CategoryController
*/
class CategoryController extends Controller {

    public function actionView($id) 
    {
        //$category = Category::findOne($id);
        $products = Product::find()-> where( ['category_id'=>$id] )->all();

        return $this->render('view', ['product'=>$products]);
    }


}  //__/class CategoryController
