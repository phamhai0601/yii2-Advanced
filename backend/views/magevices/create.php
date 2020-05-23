<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MagDevices */

$this->title = 'Create Mag Devices';
$this->params['breadcrumbs'][] = ['label' => 'Mag Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mag-devices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
