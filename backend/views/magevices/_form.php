<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MagDevices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mag-devices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'bright')->textInput() ?>

    <?= $form->field($model, 'contrast')->textInput() ?>

    <?= $form->field($model, 'saturation')->textInput() ?>

    <?= $form->field($model, 'aspect')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'video_out')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'playback_buffer_bytes')->textInput() ?>

    <?= $form->field($model, 'playback_buffer_size')->textInput() ?>

    <?= $form->field($model, 'audio_out')->textInput() ?>

    <?= $form->field($model, 'mac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ls')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'hd')->textInput() ?>

    <?= $form->field($model, 'main_notify')->textInput() ?>

    <?= $form->field($model, 'fav_itv_on')->textInput() ?>

    <?= $form->field($model, 'now_playing_start')->textInput() ?>

    <?= $form->field($model, 'now_playing_type')->textInput() ?>

    <?= $form->field($model, 'now_playing_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_last_play_tv')->textInput() ?>

    <?= $form->field($model, 'time_last_play_video')->textInput() ?>

    <?= $form->field($model, 'hd_content')->textInput() ?>

    <?= $form->field($model, 'image_version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_change_status')->textInput() ?>

    <?= $form->field($model, 'last_start')->textInput() ?>

    <?= $form->field($model, 'last_active')->textInput() ?>

    <?= $form->field($model, 'keep_alive')->textInput() ?>

    <?= $form->field($model, 'playback_limit')->textInput() ?>

    <?= $form->field($model, 'screensaver_delay')->textInput() ?>

    <?= $form->field($model, 'stb_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_watchdog')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plasma_saving')->textInput() ?>

    <?= $form->field($model, 'ts_enabled')->textInput() ?>

    <?= $form->field($model, 'ts_enable_icon')->textInput() ?>

    <?= $form->field($model, 'ts_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ts_max_length')->textInput() ?>

    <?= $form->field($model, 'ts_buffer_use')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ts_action_on_exit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ts_delay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_clock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rtsp_type')->textInput() ?>

    <?= $form->field($model, 'rtsp_flags')->textInput() ?>

    <?= $form->field($model, 'stb_lang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'display_menu_after_loading')->textInput() ?>

    <?= $form->field($model, 'record_max_length')->textInput() ?>

    <?= $form->field($model, 'plasma_saving_timeout')->textInput() ?>

    <?= $form->field($model, 'now_playing_link_id')->textInput() ?>

    <?= $form->field($model, 'now_playing_streamer_id')->textInput() ?>

    <?= $form->field($model, 'device_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_id2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hw_version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spdif_mode')->textInput() ?>

    <?= $form->field($model, 'show_after_loading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'play_in_preview_by_ok')->textInput() ?>

    <?= $form->field($model, 'hdmi_event_reaction')->textInput() ?>

    <?= $form->field($model, 'mag_player')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'play_in_preview_only_by_ok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fav_channels')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tv_archive_continued')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tv_channel_default_aspect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_itv_id')->textInput() ?>

    <?= $form->field($model, 'units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lock_device')->textInput() ?>

    <?= $form->field($model, 'watchdog_timeout')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
