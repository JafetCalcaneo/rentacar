<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_banner".
 *
 * @property int $ban_id Id
 * @property string|null $ban_url Banner
 * @property string|null $ban_descripcion Descripcion
 */
class RenBanner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ban_url', 'ban_descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ban_id' => Yii::t('app', 'Id'),
            'ban_url' => Yii::t('app', 'Banner'),
            'ban_descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    



}
