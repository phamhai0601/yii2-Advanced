<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="line-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'member_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'exp_date') ?>

    <?php // echo $form->field($model, 'admin_enabled') ?>

    <?php // echo $form->field($model, 'enabled') ?>

    <?php // echo $form->field($model, 'admin_notes') ?>

    <?php // echo $form->field($model, 'reseller_notes') ?>

    <?php // echo $form->field($model, 'bouquet') ?>

    <?php // echo $form->field($model, 'max_connections') ?>

    <?php // echo $form->field($model, 'is_restreamer') ?>

    <?php // echo $form->field($model, 'allowed_ips') ?>

    <?php // echo $form->field($model, 'allowed_ua') ?>

    <?php // echo $form->field($model, 'is_trial') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'pair_id') ?>

    <?php // echo $form->field($model, 'is_mag') ?>

    <?php // echo $form->field($model, 'is_e2') ?>

    <?php // echo $form->field($model, 'force_server_id') ?>

    <?php // echo $form->field($model, 'is_isplock') ?>

    <?php // echo $form->field($model, 'isp_desc') ?>

    <?php // echo $form->field($model, 'forced_country') ?>

    <?php // echo $form->field($model, 'is_stalker') ?>

    <?php // echo $form->field($model, 'bypass_ua') ?>

    <?php // echo $form->field($model, 'as_number') ?>

    <?php // echo $form->field($model, 'play_token') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
