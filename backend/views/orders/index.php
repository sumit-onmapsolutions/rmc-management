<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'user_id',
            'date',
           // 'customer_id',
            //'cid',
            'ProjectManager',
            'Site',
            'Section',
            //'qty',
            //'unit',
            //'isPumping',
            //'isDumping',
            //'vehicle_interval',
            //'tentetive_time',
            //'confirmed_time',
            //'plant_id',
            //'additional_if_any',
            //'status',
            //'reason:ntext',
            //'isSIApproved',
            //'isPMApproved',
            //'isAdminApproved',
            //'mix_type',
            //'mix_no',
            //'vehicle_no',
            //'name_of_driver',
            //'name_of_helper',
            //'plant_dispatch_time',
            //'slump_at_plant_mm',
            //'site_reach_time',
            //'slump_at_site_reach_time',
            //'any_admixture_addedatsite',
            //'any_water_added_at_site',
            //'after_addition_of_water',
            //'admixture_slumpmm',
            //'pour_start_time',
            //'pour_completed_time',
            //'plant_return_time',
            //'isdeleted',
            //'created_by',
            //'created_at',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
