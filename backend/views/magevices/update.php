<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MagDevices */

$this->title = 'Update Mag Devices: ' . $model->mag_id;
$this->params['breadcrumbs'][] = ['label' => 'Mag Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mag_id, 'url' => ['view', 'id' => $model->mag_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mag-devices-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
