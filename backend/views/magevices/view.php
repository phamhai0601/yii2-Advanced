<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MagDevices */

$this->title = $model->mag_id;
$this->params['breadcrumbs'][] = ['label' => 'Mag Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mag-devices-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mag_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mag_id], [
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
            'mag_id',
            'user_id',
            'bright',
            'contrast',
            'saturation',
            'aspect:ntext',
            'video_out',
            'volume',
            'playback_buffer_bytes',
            'playback_buffer_size',
            'audio_out',
            'mac',
            'ip',
            'ls',
            'ver',
            'lang',
            'locale',
            'city_id',
            'hd',
            'main_notify',
            'fav_itv_on',
            'now_playing_start',
            'now_playing_type',
            'now_playing_content',
            'time_last_play_tv:datetime',
            'time_last_play_video:datetime',
            'hd_content',
            'image_version',
            'last_change_status',
            'last_start',
            'last_active',
            'keep_alive',
            'playback_limit',
            'screensaver_delay',
            'stb_type',
            'sn',
            'last_watchdog',
            'created',
            'country',
            'plasma_saving',
            'ts_enabled',
            'ts_enable_icon',
            'ts_path',
            'ts_max_length',
            'ts_buffer_use',
            'ts_action_on_exit',
            'ts_delay',
            'video_clock',
            'rtsp_type',
            'rtsp_flags',
            'stb_lang',
            'display_menu_after_loading',
            'record_max_length',
            'plasma_saving_timeout:datetime',
            'now_playing_link_id',
            'now_playing_streamer_id',
            'device_id',
            'device_id2',
            'hw_version',
            'parent_password',
            'spdif_mode',
            'show_after_loading',
            'play_in_preview_by_ok',
            'hdmi_event_reaction',
            'mag_player',
            'play_in_preview_only_by_ok',
            'fav_channels:ntext',
            'tv_archive_continued:ntext',
            'tv_channel_default_aspect',
            'last_itv_id',
            'units',
            'token',
            'lock_device',
            'watchdog_timeout:datetime',
        ],
    ]) ?>

</div>
