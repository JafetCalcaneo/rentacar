<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_imagenauto".
 *
 * @property int $img_id Id
 * @property string $img_url Url
 * @property string $img_titulo Titulo
 * @property string $img_descripcion Descripción
 * @property string $img_seccion Sección
 * @property string $img_estatus Estatus
 * @property string $img_href Href
 * @property int $img_fkauto Auto
 *
 * @property RenAuto[] $renAutos
 */
class CatImagenauto extends \yii\db\ActiveRecord
{

    // public static function map(){
    //     return ArrayHelper::map(self::find()->all(), 'mod_id', 'mod_nombre');
    //  }

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
            [['img_url', 'img_titulo', 'img_descripcion', 'img_seccion', 'img_estatus', 'img_href', 'img_fkauto'], 'required'],
            [['img_fkauto'], 'integer'],
            [['img_url', 'img_titulo', 'img_descripcion', 'img_seccion', 'img_estatus', 'img_href'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img_id' => Yii::t('app', 'Id'),
            'img_url' => Yii::t('app', 'Url'),
            'img_titulo' => Yii::t('app', 'Titulo'),
            'img_descripcion' => Yii::t('app', 'Descripción'),
            'img_seccion' => Yii::t('app', 'Sección'),
            'img_estatus' => Yii::t('app', 'Estatus'),
            'img_href' => Yii::t('app', 'Href'),
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
