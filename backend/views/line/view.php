<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Line */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="line-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'member_id',
            'username',
            'password',
            'exp_date',
            'admin_enabled',
            'enabled',
            'admin_notes:ntext',
            'reseller_notes:ntext',
            'bouquet:ntext',
            'max_connections',
            'is_restreamer',
            'allowed_ips:ntext',
            'allowed_ua:ntext',
            'is_trial',
            'created_at',
            'created_by',
            'pair_id',
            'is_mag',
            'is_e2',
            'force_server_id',
            'is_isplock',
            'isp_desc:ntext',
            'forced_country',
            'is_stalker',
            'bypass_ua',
            'as_number',
            'play_token:ntext',
        ],
    ]) ?>

</div>
