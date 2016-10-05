<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test; //подкл.Модель Test, кот.не связана с БД
use frontend\models\Player; //подкл.Модель Player, кот.связана с БД

/**
 * Test controller
*/
class TestController extends Controller {

    public function actionIndex() 
    {
        return $this->render('index'); //название файла вида кот.должен находится в views/test/index.php
    }

    public function actionInfo() 
    {
        //эти данные например будут приходить из Модели из БД
        $title = 'Post Title';
        $content = 'Post Content';

        /*return $this->render('info', [
                'titlePost'=> $title,
                'contentPost'=> $content,
            ]);*/

        // по-другому
        return $this->render('info', compact('title', 'content'));

    }


    public function actionPost($id=null)  //чтобы по умолчанию отрабатывало когда нет в id ничего
    {
        $id = ($id) ? $id : 'not value of ID'; //when /test/post/?id
        return $this->render('info', compact('id'));
    }


//--------------- actions for Model "Test"--------------------
   public function actionModel() 
   {
        $model = new Test; //$model->firstname = 'Violetta'; - было для примера чтобы передать во въюху
        //use Yii тогда можем обращаться Yii::$app->request->post();
        //$model->load() - загружает то, что передано в кругл.скобки в нашу Мodel
        if( $model->load( Yii::$app->request->post() ) ) {
            return $this->render( 'model-get', ['model'=>$model, 'post'=>Yii::$app->request->post()] ); //тут модель уже с данными из POST и во въюхе model-get.php мы,если пропишем echo $model->firstname.'<br>'; echo $model->lastname.'<br>'; то получим то, что ввели в форму и отправили
        }
        else {
            return $this->render( 'model', ['model'=>$model] );
        }

   }

//--------------- actions for Model "Player"--------------------
   public function actionPlayer() 
   {
        $model = new Player; 
        if( $model->load( Yii::$app->request->post() ) ) {
            $model->save();
        }

        return $this->render( 'player', ['model'=>$model] );
   }


   public function actionView() 
   {
        $model = Player::find()->all();

        return $this->render( 'view', ['model'=>$model] );
   }

}  //__/class TestController
