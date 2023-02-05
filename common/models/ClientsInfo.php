<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clients_info".
 *
 * @property int $id
 * @property string $client_first_name
 * @property string $client_last_name
 * @property string $client_email_address
 */
class ClientsInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_first_name', 'client_last_name', 'client_email_address'], 'required'],
            [['client_first_name', 'client_last_name'], 'string', 'max' => 256],
            [['client_email_address'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_first_name' => 'Client First Name',
            'client_last_name' => 'Client Last Name',
            'client_email_address' => 'Client Email Address',
        ];
    }
}
