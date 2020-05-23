<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdminPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'one_day' => 'One day', 'two_days' => 'Two days', 'seven_days' => 'Seven days', 'one_month' => 'One month', 'three_months' => 'Three months', 'six_months' => 'Six months', 'one_year' => 'One year', 'two_years' => 'Two years', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_trial')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'currency')->dropDownList([ 'USD' => 'USD', 'EURO' => 'EURO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'client_status')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
