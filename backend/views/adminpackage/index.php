<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AdminPackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-package-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Admin Package', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'admin_id',
            'name',
            'amount',
            'credit',
            //'type',
            //'is_trial',
            //'status',
            //'created_at',
            //'updated_at',
            //'currency',
            //'discount',
            //'client_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
