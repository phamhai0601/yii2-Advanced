<?php

namespace app\models;

use Yii;
use app\models\MagDevices;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "line".
 *
 * @property int $id
 * @property int|null $member_id
 * @property string $username
 * @property string $password
 * @property int|null $exp_date
 * @property int $admin_enabled
 * @property int $enabled
 * @property string $admin_notes
 * @property string $reseller_notes
 * @property string $bouquet
 * @property int $max_connections
 * @property int $is_restreamer
 * @property string $allowed_ips
 * @property string $allowed_ua
 * @property int $is_trial
 * @property int $created_at
 * @property int $created_by
 * @property int|null $pair_id
 * @property int $is_mag
 * @property int $is_e2
 * @property int $force_server_id
 * @property int $is_isplock
 * @property string|null $isp_desc
 * @property string $forced_country
 * @property int $is_stalker
 * @property int $bypass_ua
 * @property string|null $as_number
 * @property string $play_token
 */

class Line extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const ADMIN_ENABLE = 1;
    const ADMIN_DISABLE =   0;
    const ENABLE = 1;
    const DISABLE = 0;
    public $mac;
    public $status;
    public $packages;

    public static function tableName()
    {
        return 'line';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','member_id', 'exp_date', 'admin_enabled', 'enabled', 'max_connections', 'is_restreamer', 'is_trial', 'created_at', 'created_by', 'pair_id', 'is_mag', 'is_e2', 'force_server_id', 'is_isplock', 'is_stalker', 'bypass_ua'], 'integer'],
            [['username', 'password'], 'required'],
            [['admin_notes', 'reseller_notes', 'bouquet', 'allowed_ips', 'allowed_ua', 'isp_desc', 'play_token',], 'string'],
            [['username', 'password'], 'string', 'max' => 255],
            [['forced_country'], 'string', 'max' => 3],
            [['as_number'], 'string', 'max' => 30],
            [['mac','status','packages'],'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'username' => 'Username',
            'password' => 'Password',
            'exp_date' => 'Exp Date',
            'admin_enabled' => 'Admin Enabled',
            'enabled' => 'Enabled',
            'admin_notes' => 'Admin Notes',
            'reseller_notes' => 'Reseller Notes',
            'bouquet' => 'Bouquet',
            'max_connections' => 'Max Connections',
            'is_restreamer' => 'Is Restreamer',
            'allowed_ips' => 'Allowed Ips',
            'allowed_ua' => 'Allowed Ua',
            'is_trial' => 'Is Trial',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'pair_id' => 'Pair ID',
            'is_mag' => 'Is Mag',
            'is_e2' => 'Is E2',
            'force_server_id' => 'Force Server ID',
            'is_isplock' => 'Is Isplock',
            'isp_desc' => 'Isp Desc',
            'forced_country' => 'Forced Country',
            'is_stalker' => 'Is Stalker',
            'bypass_ua' => 'Bypass Ua',
            'as_number' => 'As Number',
            'play_token' => 'Play Token',
            'mac'       =>  'Mag Address',
            'status'    =>  'Status',
            'package'   =>  'Package',
        ];
    }
    
}
