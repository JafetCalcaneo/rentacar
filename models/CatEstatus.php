<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_estatus".
 *
 * @property int $est_id Id
 * @property string|null $est_nombre Estatus
 *
 * @property RenAuto[] $renAutos
 */
class CatEstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_estatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_id'     => Yii::t('app', 'Id'),
            'est_nombre' => Yii::t('app', 'Estatus'),
        ];
    }

    /**
     * Gets query for [[RenAutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenAutos()
    {
        return $this->hasMany(RenAuto::className(), ['aut_fkestatus' => 'est_id']);
    }
}
