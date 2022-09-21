<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_promocion".
 *
 * @property int $pro_id Id
 * @property string|null $pro_descripcion Descripcion
 * @property string|null $pro_imagen Imagen
 * @property string|null $pro_fechaInicio Fecha Inicio
 * @property string|null $pro_fechaFinal Fecha Final
 * @property float|null $pro_descuento Descuento
 * @property int|null $pro_fkauto Auto
 *
 * @property RenAuto $proFkauto
 */
class RenPromocion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_promocion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_fechaInicio', 'pro_fechaFinal'], 'safe'],
            [['pro_descuento'], 'number'],
            [['pro_fkauto'], 'integer'],
            [['pro_descripcion', 'pro_imagen'], 'string', 'max' => 255],
            [['pro_fkauto'], 'exist', 'skipOnError' => true, 'targetClass' => RenAuto::className(), 'targetAttribute' => ['pro_fkauto' => 'aut_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id'          => Yii::t('app', 'Id'),
            'pro_descripcion' => Yii::t('app', 'Descripcion'),
            'pro_imagen'      => Yii::t('app', 'Imagen'),
            'pro_fechaInicio' => Yii::t('app', 'Fecha Inicio'),
            'pro_fechaFinal'  => Yii::t('app', 'Fecha Final'),
            'pro_descuento'   => Yii::t('app', 'Descuento'),
            'pro_fkauto'      => Yii::t('app', 'Auto'),
        ];
    }

    /**
     * Gets query for [[ProFkauto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFkauto()
    {
        return $this->hasOne(RenAuto::className(), ['aut_id' => 'pro_fkauto']);
    }
}
