<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdminPackage */

$this->title = 'Update Admin Package: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-package-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
