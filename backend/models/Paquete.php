<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Paquete".
 *
 * @property integer $id
 * @property integer $residente_id
 * @property string $num_buzon
 * @property string $fecha
 * @property string $entregadoPor
 * @property string $observaciones
 *
 * @property Residente $residente
 */
class Paquete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Paquete';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residente_id'], 'integer'],
            [['fecha'], 'safe'],
            [['num_buzon','observaciones','entregado_por'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'residente_id' => 'Residente ',
            'num_buzon' => 'Num Buzon',
            'observaciones' => 'Observaciones',
            'fecha' => 'Fecha',
            'entregado_por' => 'Entregado Por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResidente()
    {
        return $this->hasOne(Residente::className(), ['id' => 'residente_id']);
    }
}
