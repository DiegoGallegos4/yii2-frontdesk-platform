<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\controllers\PaqueteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paquetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paquete-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Paquete',['class' => 'btn btn-success', 
                            'id' => "modalButtonCrear", 
                            'value' => Url::to('/paquete/create')]) ?>
            
    </p>
    
    <?php 
        Modal::begin([
            'id' => 'modalCrear',
        ]);
        
        echo "<div id='modalContent'></div>";        
        Modal::end(); 
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'residente_id','value' => 'residente.nombre_completo'],
            'num_buzon',
            'fecha',
            'entregado_por',
            'observaciones',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
