<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_transmision".
 *
 * @property int $tra_id Id
 * @property string|null $tra_nombre Transmisión
 *
 * @property RenModelo[] $renModelos
 */
class CatTransmision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function mapTrans(){
        return ArrayHelper::map(self::find()->all(), 'tra_id', 'tra_nombre');
     }

    public static function tableName()
    {
        return 'cat_transmision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tra_nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tra_id'     => Yii::t('app', 'Id'),
            'tra_nombre' => Yii::t('app', 'Transmisión'),
        ];
    }

    /**
     * Gets query for [[RenModelos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenModelos()
    {
        return $this->hasMany(RenModelo::className(), ['mod_fktransmision' => 'tra_id']);
    }
}
