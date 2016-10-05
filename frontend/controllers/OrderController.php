<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Orders;
use common\models\OrderItems;
use yii\web\Session;

/**
 * OrderController
*/
class OrderController extends Controller {

    public function actionView() 
    {
    	$session = new Session();
    	$session->open();
 		$order = new Orders();
	//если нажали заказать товар из корзины
    	if( $order->load( Yii::$app->request->post() ) ) {
    		//1. Заказ запишем в таблицу orders
    		$order->summa = $_SESSION['sum'];

    		if( $order->save() ) {
    			foreach ( $_SESSION['cart'] as $product ) {
    				$item = new OrderItems;
    				$item->id_order = $order->id;
    				$item->id_product = $product['id'];
    				$item->qty = $product['qty'];
    				$item->save();
    			}

    		//2. отправляем письмо
    			Yii::$app->mailer->compose('mailcart')
    			->setFrom('athlonnus@gmail.com')
    			->setTo($order->email)
    			->setSubject('Заказ с Сайта')
    			->send();

    		//3. очищаем корзину
    		$session->remove('cart');
    		$session->remove('sum');

    		//выводим сообщение пользователю
    		//Yii::$app->session->setFlash('message', 'Ваш заказ принят.Списибо!');
//ИЛИ так тогда во вьюхе для этого контроллера писать сторку echo Yii::$app->session->getFlash('message');  НЕ НУЖНО
    		Yii::$app->session->setFlash('success', 'Ваш заказ принят.Списибо!');

    		}

    	}

    		



       
        return $this->render('view', ['order'=>$order, 'session'=>$session['cart']]);
    }


}  //__/class OrderController
