<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdminPackage */

$this->title = 'Create Admin Package';
$this->params['breadcrumbs'][] = ['label' => 'Admin Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-package-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
