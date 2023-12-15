<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $code
 * @property int $nominal
 * @property string $name
 * @property float $value
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'nominal', 'name', 'value'], 'required'],
            [['nominal'], 'integer'],
            [['value'], 'number'],
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 100],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'nominal' => 'Nominal',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
}
