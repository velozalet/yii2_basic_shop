<?php 
namespace frontend\models;
use yii\db\ActiveRecord;

/**
 * Класс Cart
*/
class Cart extends ActiveRecord { //корзина Юзера

    public static function addToCart($product, $qty)  
    { //

        if ( $_SESSION['cart'][$product->id]) { //в сессию обавлеям кол-во товара 
            $_SESSION['cart'][$product->id]['qty']+=$qty;
        }
        else {
             $_SESSION['cart'][$product->id]['img'] = $product->img_path;
             $_SESSION['cart'][$product->id]['name'] = $product->name;
             $_SESSION['cart'][$product->id]['qty'] = $qty;
             $_SESSION['cart'][$product->id]['name'] = $product->name;
             $_SESSION['cart'][$product->id]['price'] = $product->price;
             $_SESSION['cart'][$product->id]['id'] = $product->id;
        }


        $sum = $_SESSION['sum'];
        //если добавляем первый раз товар
        if(!isset($sum)) {
             $_SESSION['sum'] = $product->price * $qty; //or  $_SESSION['cart']['sum'] = $_SESSION['cart'][$product->id]['price'] * $_SESSION['cart'][$product->id]['qty'];
        }
        else {
             $_SESSION['sum'] = $sum + ($product->price * $qty);
        }

    }


    public function changeCart($id) { //удаление одного, кликнутого товаоа из корзины
        //отнимаем стоимость удаленного товара из общей суммы заказа
        $cost = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['sum']-= $cost;
        unset($_SESSION['cart'][$id]); //удаляем из сессиии этот товар
    }


} //__/class Cart

?>
