<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_auto".
 *
 * @property int $aut_id Id
 * @property string|null $aut_color Color
 * @property float|null $aut_precio Precio
 * @property int|null $aut_fkmodelo Modelo
 * @property int|null $aut_fkestatus Estatus
 * @property int|null $aut_fkimagen Imagen
 *
 * @property CatEstatus $autFkestatus
 * @property CatImagenauto $autFkimagen
 * @property RenModelo $autFkmodelo
 * @property RenPromocion[] $renPromocions
 * @property RenRenta[] $renRentas
 */
class RenAuto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_auto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aut_color','aut_precio','aut_fkmodelo','aut_colot','aut_fkimagen','aut_fkestatus','aut_fkmodelo'], 'required'],
            [['aut_precio'], 'number'],
            [['aut_fkmodelo', 'aut_fkestatus', 'aut_fkimagen'], 'integer'],
            [['aut_color'], 'string', 'max' => 20],
            [['aut_fkimagen'], 'exist', 'skipOnError' => true, 'targetClass' => CatImagenauto::className(), 'targetAttribute' => ['aut_fkimagen' => 'img_id']],
            [['aut_fkestatus'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstatus::className(), 'targetAttribute' => ['aut_fkestatus' => 'est_id']],
            [['aut_fkmodelo'], 'exist', 'skipOnError' => true, 'targetClass' => RenModelo::className(), 'targetAttribute' => ['aut_fkmodelo' => 'mod_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aut_id' => Yii::t('app', 'Id'),
            'aut_color' => Yii::t('app', 'Color'),
            'aut_precio' => Yii::t('app', 'Precio'),
            'aut_fkmodelo' => Yii::t('app', 'Modelo'),
            'aut_fkestatus' => Yii::t('app', 'Estatus'),
            'aut_fkimagen' => Yii::t('app', 'Imagen'),
        ];
    }

    /**
     * Gets query for [[AutFkestatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkestatus()
    {
        return $this->hasOne(CatEstatus::className(), ['est_id' => 'aut_fkestatus']);
    }

    /**
     * Gets query for [[AutFkimagen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkimagen()
    {
        return $this->hasOne(CatImagenauto::className(), ['img_id' => 'aut_fkimagen']);
    }

    /**
     * Gets query for [[AutFkmodelo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkmodelo()
    {
        return $this->hasOne(RenModelo::className(), ['mod_id' => 'aut_fkmodelo']);
    }

    /**
     * Gets query for [[RenPromocions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenPromocions()
    {
        return $this->hasMany(RenPromocion::className(), ['pro_fkauto' => 'aut_id']);
    }

    /**
     * Gets query for [[RenRentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRenRentas()
    {
        return $this->hasMany(RenRenta::className(), ['ren_fkauto' => 'aut_id']);
    }
}
