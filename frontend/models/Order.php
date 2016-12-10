<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $lastname
 * @property string $firstname
 * @property string $number
 * @property integer $item_id
 * @property string $order_date
 * @property string $perfomance_date
 * @property integer $employee_id
 *
 * @property Item $item
 * @property Employee $employee
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'number', 'item_id'], 'required', 'message'=>'Поле обязательно для заполнения'],
            [['item_id', 'employee_id'], 'integer'],
            [['perfomance_date'], 'date', 'format'=>'y-m-d','message'=>'Неверный формат даты' ],
            [['order_date', 'perfomance_date'], 'safe'],
            [['lastname', 'firstname'], 'string', 'max' => 30],
            [['number'], 'string', 'max' => 10 ],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'number' => 'Номер телефона',
            'item_id' => 'Товар',
            'order_date' => 'Дата заказа',
            'perfomance_date' => 'Дата выполнения (ГГГГ-ММ-ДД)',
            'employee_id' => 'Сотрудник',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
