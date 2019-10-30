<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\captcha\Captcha;
use yii\helpers\Url;
use common\models\Category;

$this->title = 'Product';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Thêm Product
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'product-form']); ?>

                <?= $form->field($product, 'name')->textInput() ?>

                <?= $form->field($product, 'price') ?>

                <?= $form->field($product, 'sale')->textInput() ?>

                <?= $form->field($product, 'category_id')->dropDownList(
                    ArrayHelper::map(Category::find()->all(),'id','name'),
                    ['prompt'=>'Select Category']
                )?>


                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'product-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
