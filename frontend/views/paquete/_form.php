<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Residente;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Paquete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-form col-lg-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'residente_id')->dropDownList(Residente::find()->select(['nombre_completo','id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'num_buzon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->widget(DateTimePicker::className(),[
        'type' => DateTimePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd hh:ii'
        ]
    ]) ?>
    
    <?= $form->field($model, 'entregado_por')->textInput() ?>
    
    <?= $form->field($model, 'observaciones')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
