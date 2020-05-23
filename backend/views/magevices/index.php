<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MagDevicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mag Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mag-devices-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mag Devices', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mag_id',
            'user_id',
            'bright',
            'contrast',
            'saturation',
            //'aspect:ntext',
            //'video_out',
            //'volume',
            //'playback_buffer_bytes',
            //'playback_buffer_size',
            //'audio_out',
            //'mac',
            //'ip',
            //'ls',
            //'ver',
            //'lang',
            //'locale',
            //'city_id',
            //'hd',
            //'main_notify',
            //'fav_itv_on',
            //'now_playing_start',
            //'now_playing_type',
            //'now_playing_content',
            //'time_last_play_tv:datetime',
            //'time_last_play_video:datetime',
            //'hd_content',
            //'image_version',
            //'last_change_status',
            //'last_start',
            //'last_active',
            //'keep_alive',
            //'playback_limit',
            //'screensaver_delay',
            //'stb_type',
            //'sn',
            //'last_watchdog',
            //'created',
            //'country',
            //'plasma_saving',
            //'ts_enabled',
            //'ts_enable_icon',
            //'ts_path',
            //'ts_max_length',
            //'ts_buffer_use',
            //'ts_action_on_exit',
            //'ts_delay',
            //'video_clock',
            //'rtsp_type',
            //'rtsp_flags',
            //'stb_lang',
            //'display_menu_after_loading',
            //'record_max_length',
            //'plasma_saving_timeout:datetime',
            //'now_playing_link_id',
            //'now_playing_streamer_id',
            //'device_id',
            //'device_id2',
            //'hw_version',
            //'parent_password',
            //'spdif_mode',
            //'show_after_loading',
            //'play_in_preview_by_ok',
            //'hdmi_event_reaction',
            //'mag_player',
            //'play_in_preview_only_by_ok',
            //'fav_channels:ntext',
            //'tv_archive_continued:ntext',
            //'tv_channel_default_aspect',
            //'last_itv_id',
            //'units',
            //'token',
            //'lock_device',
            //'watchdog_timeout:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
