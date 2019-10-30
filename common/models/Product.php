<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Product extends ActiveRecord {
    

    public static function tableName()
    {
        return '{{%products}}';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

    public function getCategoryname(){
        return $this->category->categoryname();
    }
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name','price','sale'], 'required'],
            ['name','string','min'=> 3 ,'max'=>128],
            [['price','sale'],'number'],
            [['category_id','category_name'],'safe']
        ];
    }
}
