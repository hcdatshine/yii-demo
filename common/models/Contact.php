<?php

namespace common\models;
use yii\db\ActiveRecord;

class Contact extends ActiveRecord
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    public static function tableName(){
        return 'contact';
    }

    public function rules(){
        $rules= [
            [['name'],'required'],
        ];
        return $rules;
    }
}
