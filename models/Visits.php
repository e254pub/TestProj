<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%visits}}".
 *
 * @property int $id
 * @property int|null $usr_id
 * @property string|null $date
 * @property string|null $host
 * @property string|null $ip_addr
 */
class Visits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%visits}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usr_id'], 'integer'],
            [['date'], 'safe'],
            [['host', 'ip_addr'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usr_id' => 'Usr ID',
            'date' => 'Date',
            'host' => 'Host',
            'ip_addr' => 'Ip Addr',
        ];
    }
}
