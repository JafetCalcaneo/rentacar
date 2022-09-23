<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_metodopago".
 *
 * @property int $met_id Id
 * @property string|null $met_nombre Metodo
 *
 * @property RenRenta[] $renRentas
 */
class CatMetodopago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function map(){
        return ArrayHelper::map(self::find()->all(), 'met_id', 'met_nombre');
    }

    public static function tableName()
    {
        return 'cat_metodopago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['met_nombre'], 'required'],
            [['met_nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'met_id'     => Yii::t('app', 'Id'),
            'met_nombre' => Yii::t('app', 'Método de pago'),
        ];
    }

    /**
     * Gets query for [[RenRentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenRentas()
    {
        return $this->hasMany(RenRenta::className(), ['ren_fkmetodoPago' => 'met_id']);
    }
}
