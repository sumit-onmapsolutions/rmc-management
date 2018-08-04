<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlantManagersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plant Managers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plant-managers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plant Managers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'plant_id',
            'plant_manager_id',
            'created_at',
            'created_by',
            //'updated_at',
            //'updated_by',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
