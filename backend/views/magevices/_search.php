<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\MagDevicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mag-devices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mag_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'bright') ?>

    <?= $form->field($model, 'contrast') ?>

    <?= $form->field($model, 'saturation') ?>

    <?php // echo $form->field($model, 'aspect') ?>

    <?php // echo $form->field($model, 'video_out') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'playback_buffer_bytes') ?>

    <?php // echo $form->field($model, 'playback_buffer_size') ?>

    <?php // echo $form->field($model, 'audio_out') ?>

    <?php // echo $form->field($model, 'mac') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'ls') ?>

    <?php // echo $form->field($model, 'ver') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <?php // echo $form->field($model, 'locale') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'hd') ?>

    <?php // echo $form->field($model, 'main_notify') ?>

    <?php // echo $form->field($model, 'fav_itv_on') ?>

    <?php // echo $form->field($model, 'now_playing_start') ?>

    <?php // echo $form->field($model, 'now_playing_type') ?>

    <?php // echo $form->field($model, 'now_playing_content') ?>

    <?php // echo $form->field($model, 'time_last_play_tv') ?>

    <?php // echo $form->field($model, 'time_last_play_video') ?>

    <?php // echo $form->field($model, 'hd_content') ?>

    <?php // echo $form->field($model, 'image_version') ?>

    <?php // echo $form->field($model, 'last_change_status') ?>

    <?php // echo $form->field($model, 'last_start') ?>

    <?php // echo $form->field($model, 'last_active') ?>

    <?php // echo $form->field($model, 'keep_alive') ?>

    <?php // echo $form->field($model, 'playback_limit') ?>

    <?php // echo $form->field($model, 'screensaver_delay') ?>

    <?php // echo $form->field($model, 'stb_type') ?>

    <?php // echo $form->field($model, 'sn') ?>

    <?php // echo $form->field($model, 'last_watchdog') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'plasma_saving') ?>

    <?php // echo $form->field($model, 'ts_enabled') ?>

    <?php // echo $form->field($model, 'ts_enable_icon') ?>

    <?php // echo $form->field($model, 'ts_path') ?>

    <?php // echo $form->field($model, 'ts_max_length') ?>

    <?php // echo $form->field($model, 'ts_buffer_use') ?>

    <?php // echo $form->field($model, 'ts_action_on_exit') ?>

    <?php // echo $form->field($model, 'ts_delay') ?>

    <?php // echo $form->field($model, 'video_clock') ?>

    <?php // echo $form->field($model, 'rtsp_type') ?>

    <?php // echo $form->field($model, 'rtsp_flags') ?>

    <?php // echo $form->field($model, 'stb_lang') ?>

    <?php // echo $form->field($model, 'display_menu_after_loading') ?>

    <?php // echo $form->field($model, 'record_max_length') ?>

    <?php // echo $form->field($model, 'plasma_saving_timeout') ?>

    <?php // echo $form->field($model, 'now_playing_link_id') ?>

    <?php // echo $form->field($model, 'now_playing_streamer_id') ?>

    <?php // echo $form->field($model, 'device_id') ?>

    <?php // echo $form->field($model, 'device_id2') ?>

    <?php // echo $form->field($model, 'hw_version') ?>

    <?php // echo $form->field($model, 'parent_password') ?>

    <?php // echo $form->field($model, 'spdif_mode') ?>

    <?php // echo $form->field($model, 'show_after_loading') ?>

    <?php // echo $form->field($model, 'play_in_preview_by_ok') ?>

    <?php // echo $form->field($model, 'hdmi_event_reaction') ?>

    <?php // echo $form->field($model, 'mag_player') ?>

    <?php // echo $form->field($model, 'play_in_preview_only_by_ok') ?>

    <?php // echo $form->field($model, 'fav_channels') ?>

    <?php // echo $form->field($model, 'tv_archive_continued') ?>

    <?php // echo $form->field($model, 'tv_channel_default_aspect') ?>

    <?php // echo $form->field($model, 'last_itv_id') ?>

    <?php // echo $form->field($model, 'units') ?>

    <?php // echo $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'lock_device') ?>

    <?php // echo $form->field($model, 'watchdog_timeout') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
