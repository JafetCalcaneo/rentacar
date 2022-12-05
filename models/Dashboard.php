<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dashboard".
 *
 * @property int $das_id Id
 * @property int $das_orden Orden
 * @property string $das_imagen Imagen
 * @property string $das_titulo Titulo
 * @property string $das_url URL
 * @property int $das_estatus Estatus
 * @property string $das_roles Roles
 */
class Dashboard extends \yii\db\ActiveRecord
{
    public $archivo_imagen;
    public $lista_roles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dashboard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['das_orden', 'das_imagen', 'das_titulo', 'das_url', 'das_estatus', 'das_roles'], 'required'],
            [['das_orden', 'das_estatus'], 'integer'],
            [['das_imagen', 'das_titulo', 'das_roles'], 'string', 'max' => 50],
            [['das_url'], 'string', 'max' => 100],
            [['das_imagen'], 'unique'],
            // [
            //     ['das_imagen'], 'match', 'pattern' => '/^[a-z]+[a-z0-9_]*$/g',
            //     'message' => Yii::t('app', 'letra+caracter: minúsculas, sin espacios, sin acentos.')
            // ],
            [['archivo_imagen', 'lista_roles'], 'safe'],
            [['archivo_imagen'], 'file', 'extensions' => 'png'],
            [['archivo_imagen'], 'file', 'maxSize' => '1000000'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'das_id' => Yii::t('app', 'Id'),
            'das_orden' => Yii::t('app', 'Orden'),
            'das_imagen' => Yii::t('app', 'Imagen'),
            'das_titulo' => Yii::t('app', 'Titulo'),
            'das_url' => Yii::t('app', 'URL'),
            'das_estatus' => Yii::t('app', 'Estatus'),
            'das_roles' => Yii::t('app', 'Roles'),
            'archivo_imagen' => Yii::t('app', 'Imagen'),
            'lista_roles' => Yii::t('app', 'Roles'),
        ];
    }
}
