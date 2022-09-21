<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_marca".
 *
 * @property int $mar_id Id
 * @property string|null $mar_nombre Marca
 *
 * @property RenModelo[] $renModelos
 */
class CatMarca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_marca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mar_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mar_id'     => Yii::t('app', 'Id'),
            'mar_nombre' => Yii::t('app', 'Marca'),
        ];
    }

    /**
     * Gets query for [[RenModelos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenModelos()
    {
        return $this->hasMany(RenModelo::className(), ['mod_fkmarca' => 'mar_id']);
    }
}
