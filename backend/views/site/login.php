<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm*/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="site-login">
    <div class="login-form">
        <?php $form = ActiveForm::begin(['id' => 'login-form']);?>
        <div class="avatar">
            <img src="http://localhost/php/advanced/backend/web/template/image/avatar.jpg" alt="Avatar">
        </div>
        <h2 class="text-center"><?= Html::encode($this->title) ?></h2>
        <div class="form-group">
            <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username','autofocus' => true]) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>
        </div>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end();?>
        <p class="text-center small">Don't have an account? <a href="#">Sign up here!</a></p>
    </div>
</div>

