<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bouquets".
 *
 * @property int $id
 * @property string $bouquet_name
 * @property string $bouquet_channels
 * @property string $bouquet_series
 * @property int $allow_reseller
 */
class Bouquet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bouquets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bouquet_name', 'bouquet_channels', 'bouquet_series', 'allow_reseller'], 'required'],
            [['bouquet_name', 'bouquet_channels', 'bouquet_series'], 'string'],
            [['allow_reseller'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bouquet_name' => 'Bouquet Name',
            'bouquet_channels' => 'Bouquet Channels',
            'bouquet_series' => 'Bouquet Series',
            'allow_reseller' => 'Allow Reseller',
        ];
    }
}
