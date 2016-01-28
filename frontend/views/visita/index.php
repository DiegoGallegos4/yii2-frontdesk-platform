<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\bootstrap\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel frontend\controllers\VisitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Evento', ['class' => 'btn btn-success', 'id' => 'modalButtonCrear','value' => '/visita/create']) ?>
        <?= Html::button('Residente', ['class' => 'btn btn-success', 'id' => 'modalButtonCrearVres','value' => '/visita/create-vres']) ?>
        
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

            'nombre',
            'apellido',
            'identidad',
            'tipo',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
