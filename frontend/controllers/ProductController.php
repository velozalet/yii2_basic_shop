<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use common\models\Product;

/**
 * ProductController
*/
class ProductController extends Controller {

    public function actionView($id) 
    {
        //$category = Category::findOne($id);
        $product = Product::findOne($id);

        return $this->render('view', ['product'=>$product]);
    }


}  //__/class ProductController
