<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\CategoryForm;
use common\models\Category;
use common\models\Product;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use yii\data\Pagination;
use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $product = new Product();
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'name');
        // var_dump($categories);die;
        if ($product->load(Yii::$app->request->post()) && $product->validate()) {
            $product->save();
            Yii::$app->session->setFlash('success', 'Thêm thành công');
            return $this->redirect(['product/index']);
        } else {
            return $this->render('create', compact('product','categories'));
        } 
    }

    public function actionIndex(){
        $query = Product::find()->with(['category']);;

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $products = $query->orderBy(['id'=>SORT_ASC])
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('index', ['products' => $products,'pagination'=>$pagination]);
    }
    
    public function actionUpdate($id){

    }

    public function actionDelete($id){

    }

}