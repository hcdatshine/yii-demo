<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<h1> Category </h1>
<div class="category-update">
    <p>
        Sửa Category
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($category, 'name')->textInput(['autofocus' => true]) ?>


                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>