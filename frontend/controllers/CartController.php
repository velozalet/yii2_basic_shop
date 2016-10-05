<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
// use common\models\Category;
use common\models\Product;
use yii\web\Session; //класс по раюоте с сессиями
use frontend\models\Cart; //


/**
 * CartController
*/
class CartController extends Controller {

    public function actionAdd() //добавление товара в корзину
    {

    	$id = Yii::$app->request->post('id'); //принимаем то,что в АЯКСЕ передаеи в посте сюда, А передевали мы idпродукта
    	$qty = 1; //кол-во 
    	$product = Product::findOne($id);

    	$session = new Session; //откоыли сессию
    	$session->open(); //откоыли сессию

    	$cart = new Cart;
		$cart->addToCart($product, $qty);  //вызвали метод Модели который записал данные в сессию

		$this->layout = false; //отменят вывод шаблона main и будет выводиться толкь точ то в этом именно виде
		return $this->render('cart-modal', ['session'=>$_SESSION['cart'] ]);

    }


    public function actionClear() //очищаем корзину (удаляем сессию)
    {
    	$session = new Session; //откоыли сессию
    	$session->open(); //откоыли сессию
		$session->remove('cart');
		$session->remove('sum');

		$this->layout = false; //отменят вывод шаблона main и будет выводиться толкь точ то в этом именно виде
		return $this->render('cart-modal', ['session'=>[]]);
    }



    public function actionDel() //удаляем товар одиночный из корзины
    {
    	$id = Yii::$app->request->post('id'); //принимаем то,что в АЯКСЕ передаеи в посте сюда, А передевали мы idпродукта
    	$session = new Session; //откоыли сессию
    	$session->open(); //откоыли сессию
		$cart = new Cart;

		$cart->changeCart($id);
		$this->layout = false; //отменят вывод шаблона main и будет выводиться толкь точ то в этом именно виде
		return $this->render('cart-modal', ['session'=>$_SESSION['cart'] ]);
    }


    public function actionShow() //
    {
      	$session = new Session; //откоыли сессию
    	$session->open(); //откоыли сессию
		$this->layout = false; //отменят вывод шаблона main и будет выводиться толкь точ то в этом именно виде
		return $this->render('cart-modal', ['session'=>$_SESSION['cart'] ]);
    }


}  //__/class CartController
