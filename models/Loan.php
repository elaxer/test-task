<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "loans".
 *
 * @property int $id
 * @property string $date
 * @property float $amount
 * @property int $term
 * @property float $annual_rate
 */
class Loan extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['date', 'amount', 'term', 'annual_rate'],
                'required',
                'message' => 'Поле обязательно к заполнению'
            ],
            ['date', 'date', 'message' => 'Введите корректную дату'],
            [['amount', 'annual_rate'], 'number', 'message' => 'Значение должно быть числом'],
            [['term'], 'integer', 'message' => 'Значение должно быть целым числом'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Начальная дата',
            'amount' => 'Сумма займа',
            'term' => 'Срок займа (в месяцах)',
            'annual_rate' => 'Годовая процентная ставка',
        ];
    }
}
