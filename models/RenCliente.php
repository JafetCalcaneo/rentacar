<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_cliente".
 *
 * @property int $cli_id Id
 * @property string|null $cli_nombre Nombre
 * @property string|null $cli_paterno Paterno
 * @property string|null $cli_materno Materno
 * @property string|null $cli_telefono Telefono
 * @property string|null $cli_fechaNacimiento Fecha Nacimiento
 *
 * @property RenRenta[] $renRentas
 */
class RenCliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cli_nombre','cli_paterno','cli_materno','cli_telefono','cli_fechaNacimiento'], 'required'],
            [['cli_fechaNacimiento'], 'safe'],
            [['cli_nombre', 'cli_paterno', 'cli_materno'], 'string', 'max' => 100],
            [['cli_telefono'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cli_id'              => Yii::t('app', 'Id'),
            'cli_nombre'          => Yii::t('app', 'Nombre'),
            'cli_paterno'         => Yii::t('app', 'Paterno'),
            'cli_materno'         => Yii::t('app', 'Materno'),
            'cli_telefono'        => Yii::t('app', 'Teléfono'),
            'cli_fechaNacimiento' => Yii::t('app', 'Fecha de Nacimiento'),
        ];
    }

    /**
     * Gets query for [[RenRentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenRentas()
    {
        return $this->hasMany(RenRenta::className(), ['ren_fkcliente' => 'cli_id']);
    }
}
