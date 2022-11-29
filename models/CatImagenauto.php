<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "cat_imagenauto".
 *
 * @property int $img_id Id
 * @property string $img_imagen Imagen
 * @property string $img_descripcion Descripción
 * @property string $img_titulo Titulo
 * @property string $img_seccion Sección
 * @property string $img_url Url
 * @property string $img_href Href
 * @property string $img_estatus Estatus
 * @property int $img_fkauto Auto
 *
 * @property RenAuto[] $renAutos
 */
class CatImagenauto extends \yii\db\ActiveRecord
{

    public $archivo_imagen;
    public $lista_roles;

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
            [['img_descripcion', 'img_titulo', 'img_seccion', 'img_url', 'img_href', 'img_estatus'], 'required'],
            [['img_fkauto'], 'integer'],
            [['img_imagen'], 'unique'],
            [['img_imagen', 'img_descripcion', 'img_titulo', 'img_seccion', 'img_url', 'img_href', 'img_estatus'], 'string', 'max' => 255],
            [['archivo_imagen'], 'safe'],
            [['archivo_imagen'], 'file', 'extensions' => 'jpg'],
            [['archivo_imagen'], 'file', 'maxSize' => '10000000'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img_id'          => Yii::t('app', 'Id'),
            'img_imagen'      => Yii::t('app', 'Imagen'),
            'img_descripcion' => Yii::t('app', 'Descripción'),
            'img_titulo'      => Yii::t('app', 'Titulo'),
            'img_seccion'     => Yii::t('app', 'Sección'),
            'img_url'         => Yii::t('app', 'Url'),
            'img_href'        => Yii::t('app', 'Href'),
            'img_estatus'     => Yii::t('app', 'Estatus'),
            'img_fkauto'      => Yii::t('app', 'Auto'),
            'archivo_imagen'  => Yii::t('app', 'Imagen'),
        ];
    }

    public function getImg() {
        return Html::img(
        "/img/{$this->img_url}",
        ['alt' => Yii::t('app', $this->img_titulo), 'style' => 'width: 70%;']
        );
        }

        public function getSta() {
            $texto = $this->img_estatus == 1 ? 'Disponible' : 'Ocupado';
            $color = $this->img_estatus == 1 ? 'success' : 'default';
            return Html::button($texto, ['class' => "btn btn-{$color}", 'style' => 'width: 100%;']);
            }

    /**
     * Gets query for [[RenAutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenAutos()
    {
        return $this->hasMany(RenAuto::class, ['aut_fkimagen' => 'img_id']);
    }

    


}
