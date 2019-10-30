<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\models\Product;

class Category extends ActiveRecord {

    public static function tableName()
    {
        return '{{%categories}}';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(),['category_id'=>'id']);
    }

    public function rules()
    {
        return [
            // name, email, subject and body are required
            ['name', 'required'],
            ['name','string','min'=> 3 ,'max'=>128],
        ];
    }
}
