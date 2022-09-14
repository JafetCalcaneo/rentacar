<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_horario".
 *
 * @property int $hor_id Id
 * @property string|null $hor_horaInicio Hora Inicio
 * @property string|null $hor_horaCierre Hora Cierre
 * @property int|null $hor_estatus Estatus
 * @property int|null $hor_fkdiaSemana Dia Semana
 *
 * @property CatDiasemana $horFkdiaSemana
 */
class RenHorario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hor_horaInicio', 'hor_horaCierre'], 'safe'],
            [['hor_estatus', 'hor_fkdiaSemana'], 'integer'],
            [['hor_fkdiaSemana'], 'exist', 'skipOnError' => true, 'targetClass' => CatDiasemana::className(), 'targetAttribute' => ['hor_fkdiaSemana' => 'sem_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hor_id' => Yii::t('app', 'Id'),
            'hor_horaInicio' => Yii::t('app', 'Hora Inicio'),
            'hor_horaCierre' => Yii::t('app', 'Hora Cierre'),
            'hor_estatus' => Yii::t('app', 'Estatus'),
            'hor_fkdiaSemana' => Yii::t('app', 'Dia Semana'),
        ];
    }

    /**
     * Gets query for [[HorFkdiaSemana]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorFkdiaSemana()
    {
        return $this->hasOne(CatDiasemana::className(), ['sem_id' => 'hor_fkdiaSemana']);
    }
}
