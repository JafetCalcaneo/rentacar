<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_diasemana".
 *
 * @property int $sem_id Id
 * @property string|null $sem_dia Dia
 *
 * @property RenHorario[] $renHorarios
 */
class CatDiasemana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_diasemana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sem_dia'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sem_id'  => Yii::t('app', 'Id'),
            'sem_dia' => Yii::t('app', 'Dia'),
        ];
    }

    /**
     * Gets query for [[RenHorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenHorarios()
    {
        return $this->hasMany(RenHorario::className(), ['hor_fkdiaSemana' => 'sem_id']);
    }
}
