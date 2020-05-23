<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MagDevices;

/**
 * MagDevicesSearch represents the model behind the search form of `app\models\MagDevices`.
 */
class MagDevicesSearch extends MagDevices
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mag_id', 'user_id', 'bright', 'contrast', 'saturation', 'volume', 'playback_buffer_bytes', 'playback_buffer_size', 'audio_out', 'city_id', 'hd', 'main_notify', 'fav_itv_on', 'now_playing_start', 'now_playing_type', 'time_last_play_tv', 'time_last_play_video', 'hd_content', 'last_change_status', 'last_start', 'last_active', 'keep_alive', 'playback_limit', 'screensaver_delay', 'last_watchdog', 'created', 'plasma_saving', 'ts_enabled', 'ts_enable_icon', 'ts_max_length', 'rtsp_type', 'rtsp_flags', 'display_menu_after_loading', 'record_max_length', 'plasma_saving_timeout', 'now_playing_link_id', 'now_playing_streamer_id', 'spdif_mode', 'play_in_preview_by_ok', 'hdmi_event_reaction', 'last_itv_id', 'lock_device', 'watchdog_timeout'], 'integer'],
            [['aspect', 'video_out', 'mac', 'ip', 'ls', 'ver', 'lang', 'locale', 'now_playing_content', 'image_version', 'stb_type', 'sn', 'country', 'ts_path', 'ts_buffer_use', 'ts_action_on_exit', 'ts_delay', 'video_clock', 'stb_lang', 'device_id', 'device_id2', 'hw_version', 'parent_password', 'show_after_loading', 'mag_player', 'play_in_preview_only_by_ok', 'fav_channels', 'tv_archive_continued', 'tv_channel_default_aspect', 'units', 'token'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MagDevices::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'mag_id' => $this->mag_id,
            'user_id' => $this->user_id,
            'bright' => $this->bright,
            'contrast' => $this->contrast,
            'saturation' => $this->saturation,
            'volume' => $this->volume,
            'playback_buffer_bytes' => $this->playback_buffer_bytes,
            'playback_buffer_size' => $this->playback_buffer_size,
            'audio_out' => $this->audio_out,
            'city_id' => $this->city_id,
            'hd' => $this->hd,
            'main_notify' => $this->main_notify,
            'fav_itv_on' => $this->fav_itv_on,
            'now_playing_start' => $this->now_playing_start,
            'now_playing_type' => $this->now_playing_type,
            'time_last_play_tv' => $this->time_last_play_tv,
            'time_last_play_video' => $this->time_last_play_video,
            'hd_content' => $this->hd_content,
            'last_change_status' => $this->last_change_status,
            'last_start' => $this->last_start,
            'last_active' => $this->last_active,
            'keep_alive' => $this->keep_alive,
            'playback_limit' => $this->playback_limit,
            'screensaver_delay' => $this->screensaver_delay,
            'last_watchdog' => $this->last_watchdog,
            'created' => $this->created,
            'plasma_saving' => $this->plasma_saving,
            'ts_enabled' => $this->ts_enabled,
            'ts_enable_icon' => $this->ts_enable_icon,
            'ts_max_length' => $this->ts_max_length,
            'rtsp_type' => $this->rtsp_type,
            'rtsp_flags' => $this->rtsp_flags,
            'display_menu_after_loading' => $this->display_menu_after_loading,
            'record_max_length' => $this->record_max_length,
            'plasma_saving_timeout' => $this->plasma_saving_timeout,
            'now_playing_link_id' => $this->now_playing_link_id,
            'now_playing_streamer_id' => $this->now_playing_streamer_id,
            'spdif_mode' => $this->spdif_mode,
            'play_in_preview_by_ok' => $this->play_in_preview_by_ok,
            'hdmi_event_reaction' => $this->hdmi_event_reaction,
            'last_itv_id' => $this->last_itv_id,
            'lock_device' => $this->lock_device,
            'watchdog_timeout' => $this->watchdog_timeout,
        ]);

        $query->andFilterWhere(['like', 'aspect', $this->aspect])
            ->andFilterWhere(['like', 'video_out', $this->video_out])
            ->andFilterWhere(['like', 'mac', $this->mac])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'ls', $this->ls])
            ->andFilterWhere(['like', 'ver', $this->ver])
            ->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'locale', $this->locale])
            ->andFilterWhere(['like', 'now_playing_content', $this->now_playing_content])
            ->andFilterWhere(['like', 'image_version', $this->image_version])
            ->andFilterWhere(['like', 'stb_type', $this->stb_type])
            ->andFilterWhere(['like', 'sn', $this->sn])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'ts_path', $this->ts_path])
            ->andFilterWhere(['like', 'ts_buffer_use', $this->ts_buffer_use])
            ->andFilterWhere(['like', 'ts_action_on_exit', $this->ts_action_on_exit])
            ->andFilterWhere(['like', 'ts_delay', $this->ts_delay])
            ->andFilterWhere(['like', 'video_clock', $this->video_clock])
            ->andFilterWhere(['like', 'stb_lang', $this->stb_lang])
            ->andFilterWhere(['like', 'device_id', $this->device_id])
            ->andFilterWhere(['like', 'device_id2', $this->device_id2])
            ->andFilterWhere(['like', 'hw_version', $this->hw_version])
            ->andFilterWhere(['like', 'parent_password', $this->parent_password])
            ->andFilterWhere(['like', 'show_after_loading', $this->show_after_loading])
            ->andFilterWhere(['like', 'mag_player', $this->mag_player])
            ->andFilterWhere(['like', 'play_in_preview_only_by_ok', $this->play_in_preview_only_by_ok])
            ->andFilterWhere(['like', 'fav_channels', $this->fav_channels])
            ->andFilterWhere(['like', 'tv_archive_continued', $this->tv_archive_continued])
            ->andFilterWhere(['like', 'tv_channel_default_aspect', $this->tv_channel_default_aspect])
            ->andFilterWhere(['like', 'units', $this->units])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}
