<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ren_empleado".
 *
 * @property int $emp_id Id
 * @property string|null $emp_nombre Nombre
 * @property string|null $emp_paterno Apellido Paterno
 * @property string|null $emp_materno Apellido Materno
 * @property int|null $emp_cargo Cargo
 * @property int|null $emp_fkuser Usuario
 *
 * @property User $empFkuser
 */
class RenEmpleado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ren_empleado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_cargo', 'emp_fkuser'], 'integer'],
            [['emp_nombre', 'emp_paterno', 'emp_materno'], 'string', 'max' => 30],
            [['emp_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['emp_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_id'      => Yii::t('app', 'Id'),
            'emp_nombre'  => Yii::t('app', 'Nombre'),
            'emp_paterno' => Yii::t('app', 'Apellido Paterno'),
            'emp_materno' => Yii::t('app', 'Apellido Materno'),
            'emp_cargo'   => Yii::t('app', 'Cargo'),
            'emp_fkuser'  => Yii::t('app', 'Usuario'),
        ];
    }

    /**
     * Gets query for [[EmpFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'emp_fkuser']);
    }
}
