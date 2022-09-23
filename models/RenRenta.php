<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_renta".
 *
 * @property int $ren_id Id
 * @property string|null $ren_fechaPago Fecha Pago
 * @property string|null $ren_fechaInicio Fecha Inicio
 * @property string|null $ren_fechaFinal Fecha Final
 * @property string|null $ren_fechaEntregado Fecha Entregado
 * @property float|null $ren_monto Monto
 * @property int|null $ren_promocion Promocion
 * @property int|null $ren_fkmetodoPago Metodo Pago
 * @property int|null $ren_fkcliente Cliente
 * @property int|null $ren_fkauto Auto
 *
 * @property RenAuto $renFkauto
 * @property RenCliente $renFkcliente
 * @property CatMetodopago $renFkmetodoPago
 */
class RenRenta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_renta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ren_fechaPago', 'ren_fechaInicio', 'ren_fechaFinal', 'ren_fechaEntregado','ren_monto', 'ren_promocion', 'ren_fkmetodoPago', 'ren_fkcliente', 'ren_fkauto'], 'required'],
            [['ren_fechaPago', 'ren_fechaInicio', 'ren_fechaFinal', 'ren_fechaEntregado'], 'safe'],
            [['ren_monto'], 'number'],
            [['ren_promocion', 'ren_fkmetodoPago', 'ren_fkcliente', 'ren_fkauto'], 'integer'],
            [['ren_fkmetodoPago'], 'exist', 'skipOnError' => true, 'targetClass' => CatMetodopago::className(), 'targetAttribute' => ['ren_fkmetodoPago' => 'met_id']],
            [['ren_fkcliente'], 'exist', 'skipOnError' => true, 'targetClass' => RenCliente::className(), 'targetAttribute' => ['ren_fkcliente' => 'cli_id']],
            [['ren_fkauto'], 'exist', 'skipOnError' => true, 'targetClass' => RenAuto::className(), 'targetAttribute' => ['ren_fkauto' => 'aut_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ren_id'             => Yii::t('app', 'Id'),
            'ren_fechaPago'      => Yii::t('app', 'Fecha de Pago'),
            'ren_fechaInicio'    => Yii::t('app', 'Fecha de Inicio'),
            'ren_fechaFinal'     => Yii::t('app', 'Fecha Final'),
            'ren_fechaEntregado' => Yii::t('app', 'Fecha de Entregado'),
            'ren_monto'          => Yii::t('app', 'Monto'),
            'ren_promocion'      => Yii::t('app', 'Promoción'),
            'ren_fkmetodoPago'   => Yii::t('app', 'Método de Pago'),
            'ren_fkcliente'      => Yii::t('app', 'Cliente'),
            'ren_fkauto'         => Yii::t('app', 'Auto'),
        ];
    }

    /**
     * Gets query for [[RenFkauto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenFkauto()
    {
        return $this->hasOne(RenAuto::className(), ['aut_id' => 'ren_fkauto']);
    }

    /**
     * Gets query for [[RenFkcliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenFkcliente()
    {
        return $this->hasOne(RenCliente::className(), ['cli_id' => 'ren_fkcliente']);
    }

    /**
     * Gets query for [[RenFkmetodoPago]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenFkmetodoPago()
    {
        return $this->hasOne(CatMetodopago::className(), ['met_id' => 'ren_fkmetodoPago']);
    }
}
