<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mag_devices".
 *
 * @property int $mag_id
 * @property int $user_id
 * @property int $bright
 * @property int $contrast
 * @property int $saturation
 * @property string $aspect
 * @property string $video_out
 * @property int $volume
 * @property int $playback_buffer_bytes
 * @property int $playback_buffer_size
 * @property int $audio_out
 * @property string $mac
 * @property string|null $ip
 * @property string|null $ls
 * @property string|null $ver
 * @property string|null $lang
 * @property string $locale
 * @property int|null $city_id
 * @property int $hd
 * @property int $main_notify
 * @property int $fav_itv_on
 * @property int|null $now_playing_start
 * @property int $now_playing_type
 * @property string|null $now_playing_content
 * @property int|null $time_last_play_tv
 * @property int|null $time_last_play_video
 * @property int $hd_content
 * @property string|null $image_version
 * @property int|null $last_change_status
 * @property int|null $last_start
 * @property int|null $last_active
 * @property int|null $keep_alive
 * @property int $playback_limit
 * @property int $screensaver_delay
 * @property string $stb_type
 * @property string|null $sn
 * @property int|null $last_watchdog
 * @property int $created
 * @property string|null $country
 * @property int $plasma_saving
 * @property int|null $ts_enabled
 * @property int $ts_enable_icon
 * @property string|null $ts_path
 * @property int $ts_max_length
 * @property string $ts_buffer_use
 * @property string $ts_action_on_exit
 * @property string $ts_delay
 * @property string $video_clock
 * @property int $rtsp_type
 * @property int $rtsp_flags
 * @property string $stb_lang
 * @property int $display_menu_after_loading
 * @property int $record_max_length
 * @property int $plasma_saving_timeout
 * @property int|null $now_playing_link_id
 * @property int|null $now_playing_streamer_id
 * @property string|null $device_id
 * @property string|null $device_id2
 * @property string|null $hw_version
 * @property string $parent_password
 * @property int $spdif_mode
 * @property string $show_after_loading
 * @property int $play_in_preview_by_ok
 * @property int $hdmi_event_reaction
 * @property string|null $mag_player
 * @property string $play_in_preview_only_by_ok
 * @property string $fav_channels
 * @property string $tv_archive_continued
 * @property string $tv_channel_default_aspect
 * @property int $last_itv_id
 * @property string|null $units
 * @property string|null $token
 * @property int $lock_device
 * @property int $watchdog_timeout
 */
class MagDevices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mag_devices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'aspect', 'mac', 'stb_type', 'created', 'fav_channels', 'tv_archive_continued', 'watchdog_timeout'], 'required'],
            [['user_id', 'bright', 'contrast', 'saturation', 'volume', 'playback_buffer_bytes', 'playback_buffer_size', 'audio_out', 'city_id', 'hd', 'main_notify', 'fav_itv_on', 'now_playing_start', 'now_playing_type', 'time_last_play_tv', 'time_last_play_video', 'hd_content', 'last_change_status', 'last_start', 'last_active', 'keep_alive', 'playback_limit', 'screensaver_delay', 'last_watchdog', 'created', 'plasma_saving', 'ts_enabled', 'ts_enable_icon', 'ts_max_length', 'rtsp_type', 'rtsp_flags', 'display_menu_after_loading', 'record_max_length', 'plasma_saving_timeout', 'now_playing_link_id', 'now_playing_streamer_id', 'spdif_mode', 'play_in_preview_by_ok', 'hdmi_event_reaction', 'last_itv_id', 'lock_device', 'watchdog_timeout'], 'integer'],
            [['aspect', 'fav_channels', 'tv_archive_continued'], 'string'],
            [['video_out', 'ip', 'ls', 'stb_type', 'ts_action_on_exit', 'ts_delay', 'parent_password', 'mag_player', 'units'], 'string', 'max' => 20],
            [['mac', 'lang', 'now_playing_content'], 'string', 'max' => 50],
            [['ver'], 'string', 'max' => 300],
            [['locale'], 'string', 'max' => 30],
            [['image_version'], 'string', 'max' => 350],
            [['sn', 'device_id', 'device_id2', 'hw_version', 'tv_channel_default_aspect'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 5],
            [['ts_path'], 'string', 'max' => 35],
            [['ts_buffer_use', 'stb_lang'], 'string', 'max' => 15],
            [['video_clock', 'play_in_preview_only_by_ok'], 'string', 'max' => 10],
            [['show_after_loading'], 'string', 'max' => 60],
            [['token'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mag_id' => 'Mag ID',
            'user_id' => 'User ID',
            'bright' => 'Bright',
            'contrast' => 'Contrast',
            'saturation' => 'Saturation',
            'aspect' => 'Aspect',
            'video_out' => 'Video Out',
            'volume' => 'Volume',
            'playback_buffer_bytes' => 'Playback Buffer Bytes',
            'playback_buffer_size' => 'Playback Buffer Size',
            'audio_out' => 'Audio Out',
            'mac' => 'Mac',
            'ip' => 'Ip',
            'ls' => 'Ls',
            'ver' => 'Ver',
            'lang' => 'Lang',
            'locale' => 'Locale',
            'city_id' => 'City ID',
            'hd' => 'Hd',
            'main_notify' => 'Main Notify',
            'fav_itv_on' => 'Fav Itv On',
            'now_playing_start' => 'Now Playing Start',
            'now_playing_type' => 'Now Playing Type',
            'now_playing_content' => 'Now Playing Content',
            'time_last_play_tv' => 'Time Last Play Tv',
            'time_last_play_video' => 'Time Last Play Video',
            'hd_content' => 'Hd Content',
            'image_version' => 'Image Version',
            'last_change_status' => 'Last Change Status',
            'last_start' => 'Last Start',
            'last_active' => 'Last Active',
            'keep_alive' => 'Keep Alive',
            'playback_limit' => 'Playback Limit',
            'screensaver_delay' => 'Screensaver Delay',
            'stb_type' => 'Stb Type',
            'sn' => 'Sn',
            'last_watchdog' => 'Last Watchdog',
            'created' => 'Created',
            'country' => 'Country',
            'plasma_saving' => 'Plasma Saving',
            'ts_enabled' => 'Ts Enabled',
            'ts_enable_icon' => 'Ts Enable Icon',
            'ts_path' => 'Ts Path',
            'ts_max_length' => 'Ts Max Length',
            'ts_buffer_use' => 'Ts Buffer Use',
            'ts_action_on_exit' => 'Ts Action On Exit',
            'ts_delay' => 'Ts Delay',
            'video_clock' => 'Video Clock',
            'rtsp_type' => 'Rtsp Type',
            'rtsp_flags' => 'Rtsp Flags',
            'stb_lang' => 'Stb Lang',
            'display_menu_after_loading' => 'Display Menu After Loading',
            'record_max_length' => 'Record Max Length',
            'plasma_saving_timeout' => 'Plasma Saving Timeout',
            'now_playing_link_id' => 'Now Playing Link ID',
            'now_playing_streamer_id' => 'Now Playing Streamer ID',
            'device_id' => 'Device ID',
            'device_id2' => 'Device Id2',
            'hw_version' => 'Hw Version',
            'parent_password' => 'Parent Password',
            'spdif_mode' => 'Spdif Mode',
            'show_after_loading' => 'Show After Loading',
            'play_in_preview_by_ok' => 'Play In Preview By Ok',
            'hdmi_event_reaction' => 'Hdmi Event Reaction',
            'mag_player' => 'Mag Player',
            'play_in_preview_only_by_ok' => 'Play In Preview Only By Ok',
            'fav_channels' => 'Fav Channels',
            'tv_archive_continued' => 'Tv Archive Continued',
            'tv_channel_default_aspect' => 'Tv Channel Default Aspect',
            'last_itv_id' => 'Last Itv ID',
            'units' => 'Units',
            'token' => 'Token',
            'lock_device' => 'Lock Device',
            'watchdog_timeout' => 'Watchdog Timeout',
        ];
    }
}
