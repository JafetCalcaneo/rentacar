<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_imagenauto".
 *
 * @property int $img_id Id
 * @property string|null $img_url Url
 * @property int|null $img_fkauto Auto
 *
 * @property RenAuto[] $renAutos
 */
class CatImagenauto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_imagenauto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_fkauto'], 'integer'],
            [['img_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img_id'     => Yii::t('app', 'Id'),
            'img_url'    => Yii::t('app', 'Url'),
            'img_fkauto' => Yii::t('app', 'Auto'),
        ];
    }

    /**
     * Gets query for [[RenAutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenAutos()
    {
        return $this->hasMany(RenAuto::className(), ['aut_fkimagen' => 'img_id']);
    }
}
