<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;

/**
 * Site CategoryController
 */
class CategoryController extends Controller {

    public function actionIndex()
    {
        //$categories = Category::find()->all(); - если так сделать, то во вьюхе categories.php мы не сможем применить echo GridView::widget() для пагинации
        $categories = Category::find(); //выбрать все из Модели Category - даст все категории в таблице из БД
        return $this->render('categories', ['model'=>$categories]);
    }


    public function actionView($id)
    {
        //$category = Category::find()->where(['id'=>$id])->one();
        $category = Category::find()->where(['id'=>$id])->one();
        return $this->render('view', ['model'=>$category]);
    }

//создание новой категории
    public function actionCreate()
    {
        $model = new Category;

            if( $model->load(Yii::$app->request->post()) ) { //если данные есть и пришли из POST
                $model->save(); //cохранение Модели (данных переданых ей) в БД
                return $this->redirect('/category'); //чтобы после добавления категории переходило автоматом на страницу где отображаются все категории
            }

        return $this->render('create', ['model'=>$model, 'btn'=>'Create']);
    }


    //удаление категории
    public function actionDelete($id)
    {
        Category::findOne($id)->delete();
        return $this->render('/category'); //чтобы после удаления категории переходило автоматом на страницу где отображаются все категории
    }

    //Редактировние категории
    public function actionUpdate($id)
    {
        $model = Category::findOne($id);

        if( $model->load(Yii::$app->request->post()) ) { //если данные есть и пришли из POST
                $model->save(); //cохранение Модели (данных переданых ей) в БД
                return $this->redirect('/category'); //чтобы после добавления категории переходило автоматом на страницу где отображаются все категории
            }
       return $this->render('create', ['model'=>$model, 'btn'=>'Save']);
    }



}  //__/class CategoryController


