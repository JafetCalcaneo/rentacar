<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_modelo".
 *
 * @property int $mod_id Id
 * @property string $mod_nombre Nombre
 * @property int $mod_anio Año
 * @property int $mod_fkmarca Marca
 * @property int $mod_fktransmision Transmisión
 * @property int $mod_fkcarroceria Carroceria
 *
 * @property CatCarroceria $modFkcarroceria
 * @property CatMarca $modFkmarca
 * @property CatTransmision $modFktransmision
 * @property RenAuto[] $renAutos
 */
class RenModelo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_modelo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mod_nombre', 'mod_anio', 'mod_fkmarca', 'mod_fktransmision', 'mod_fkcarroceria'], 'required'],
            [['mod_anio', 'mod_fkmarca', 'mod_fktransmision', 'mod_fkcarroceria'], 'integer'],
            [['mod_nombre'], 'string', 'max' => 40],
            [['mod_fktransmision'], 'exist', 'skipOnError' => true, 'targetClass' => CatTransmision::className(), 'targetAttribute' => ['mod_fktransmision' => 'tra_id']],
            [['mod_fkmarca'], 'exist', 'skipOnError' => true, 'targetClass' => CatMarca::className(), 'targetAttribute' => ['mod_fkmarca' => 'mar_id']],
            [['mod_fkcarroceria'], 'exist', 'skipOnError' => true, 'targetClass' => CatCarroceria::className(), 'targetAttribute' => ['mod_fkcarroceria' => 'car_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mod_id' => Yii::t('app', 'Id'),
            'mod_nombre' => Yii::t('app', 'Nombre'),
            'mod_anio' => Yii::t('app', 'Año'),
            'mod_fkmarca' => Yii::t('app', 'Marca'),
            'mod_fktransmision' => Yii::t('app', 'Transmisión'),
            'mod_fkcarroceria' => Yii::t('app', 'Carroceria'),
        ];
    }

    /**
     * Gets query for [[ModFkcarroceria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModFkcarroceria()
    {
        return $this->hasOne(CatCarroceria::className(), ['car_id' => 'mod_fkcarroceria']);
    }

    /**
     * Gets query for [[ModFkmarca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModFkmarca()
    {
        return $this->hasOne(CatMarca::className(), ['mar_id' => 'mod_fkmarca']);
    }

    /**
     * Gets query for [[ModFktransmision]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModFktransmision()
    {
        return $this->hasOne(CatTransmision::className(), ['tra_id' => 'mod_fktransmision']);
    }

    /**
     * Gets query for [[RenAutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenAutos()
    {
        return $this->hasMany(RenAuto::className(), ['aut_fkmodelo' => 'mod_id']);
    }
}
