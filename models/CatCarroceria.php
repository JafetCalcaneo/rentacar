<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_carroceria".
 *
 * @property int $car_id Id
 * @property string|null $car_nombre Nombre
 * @property int|null $car_asientos Asientos
 *
 * @property RenModelo[] $renModelos
 */
class CatCarroceria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_carroceria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_asientos'], 'integer'],
            [['car_nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id'       => Yii::t('app', 'Id'),
            'car_nombre'   => Yii::t('app', 'Nombre'),
            'car_asientos' => Yii::t('app', 'Asientos'),
        ];
    }

    /**
     * Gets query for [[RenModelos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenModelos()
    {
        return $this->hasMany(RenModelo::className(), ['mod_fkcarroceria' => 'car_id']);
    }
}
