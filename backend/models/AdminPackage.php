<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_package".
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $name
 * @property float $amount số tiền reseller tự custom
 * @property float|null $credit số tiền server thực trừ
 * @property string $type
 * @property string|null $is_trial
 * @property string $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string $currency
 * @property int|null $discount
 * @property string $client_status
 */
class AdminPackage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'created_at', 'updated_at', 'discount'], 'integer'],
            [['amount', 'credit'], 'number'],
            [['type', 'is_trial', 'status', 'currency', 'client_status'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'name' => 'Name',
            'amount' => 'Amount',
            'credit' => 'Credit',
            'type' => 'Type',
            'is_trial' => 'Is Trial',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'currency' => 'Currency',
            'discount' => 'Discount',
            'client_status' => 'Client Status',
        ];
    }
}
