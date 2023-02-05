<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clients_history".
 *
 * @property int $id
 * @property int $client_id
 * @property string $transaction_date
 * @property string $payment_total
 * @property string $payment_method
 */
class ClientsHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'transaction_date', 'payment_total', 'payment_method'], 'required'],
            [['client_id'], 'integer'],
            [['transaction_date', 'payment_total', 'payment_method'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'transaction_date' => 'Transaction Date',
            'payment_total' => 'Payment Total',
            'payment_method' => 'Payment Method',
        ];
    }
}
