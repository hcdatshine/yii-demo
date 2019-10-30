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

class CategoryController extends Controller
{
    public function actionCreate()
    {
        $category = new Category();
        if ($category->load(Yii::$app->request->post()) && $category->validate()) {
            var_dump($category);die;
            if($category->save()){
                Yii::$app->session->setFlash('success', 'Thêm thành công');
                return $this->redirect(['category/index']);
            }
            else {
                echo '<pre>';
                print_r($category->getErrors());die;
            }
        } else {
            return $this->render('create', compact('category'));
        }
    }

    public function actionIndex(){

        $query = Category::find();

        
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $categories=$query->orderBy(['id'=> SORT_ASC])
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('index',['categories' => $categories,'pagination' => $pagination]);
    }
    
    public function actionUpdate($id)
    {
        // tao 1 category
        $category = Category::findOne($id);//validate xem co bi loi hay khong
        // var_dump($category->id);die;
        if ($category->load(Yii::$app->request->post()) && $category->validate()) {
            
            if($category->save()){
                Yii::$app->session->setFlash('success', 'Sửa thành công');
                return $this->redirect(['category/index']);
            }
            else {
                echo '<pre>';
                print_r($category->getErrors());die;
            }
        }else {
            return $this->render('update', compact('category'));
        }   
    }

    public function actionDelete($id)
    {
        $category = Category::findOne($id);
        if($category->getProducts()->count() > 0)
        {
            Yii::$app->session->setFlash('danger', 'Category đã có sản phẩm , cần xoá sản phẩm trước');
            return $this->redirect(['category/index']);
        }
        else {
            $category->delete();                
            Yii::$app->session->setFlash('success', 'Xoá thành công');
            return $this->redirect(['category/index']);
        }
    }
}
