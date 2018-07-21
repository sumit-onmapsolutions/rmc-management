<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'Engineer',
            'date',
            'Customer',
            'cid',
            'ProjectManager',
            'Site',
            'Section',
            'qty',
            'unit',
            [
                'attribute'=>'Pumping',
                'header'=>'Pumping',
                'filter' => ['1'=>'Yes', '0'=>'No'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->isPumping == '1')
                    {
                        return 'Yes';
                    }
                    else
                    {   
                        return 'No';
                    }
                },
            ],
            [
                'attribute'=>'Dumping',
                'header'=>'Dumping',
                'filter' => ['1'=>'Yes', '0'=>'No'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->isDumping == '1')
                    {
                        return 'Yes';
                    }
                    else
                    {   
                        return 'No';
                    }
                },
            ],
            'vehicle_interval',
            'tentetive_time',
            'confirmed_time',
            'plant_id',
            'additional_if_any',
            [
                'attribute'=>'Status',
                'header'=>'Status',
                'filter' => ['1'=>'Yes', '0'=>'No'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->status == '1')
                    {
                        return 'Yes';
                    }
                    else
                    {   
                        return 'No';
                    }
                },
            ],
            'reason:ntext',//
            [
                'attribute'=>'isSIApproved',
                'header'=>'SI Approved',
                'filter' => ['1'=>'Yes', '0'=>'No'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->isSIApproved == '1')
                    {
                        return 'Yes';
                    }
                    else
                    {   
                        return 'No';
                    }
                },
            ],
            [
                'attribute'=>'isPMApproved',
                'header'=>'PM Approved',
                'filter' => ['1'=>'Yes', '0'=>'No'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->isPMApproved == '1')
                    {
                        return 'Yes';
                    }
                    else
                    {   
                        return 'No';
                    }
                },
            ],
            [
                'attribute'=>'isAdminApproved',
                'header'=>'Admin Approved',
                'filter' => ['1'=>'Yes', '0'=>'No'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->isAdminApproved == '1')
                    {
                        return 'Yes';
                    }
                    else
                    {   
                        return 'No';
                    }
                },
            ],
            'mix_type',
            'mix_no',
            'vehicle_no',
            'name_of_driver',
            'name_of_helper',
            'plant_dispatch_time',
            'slump_at_plant_mm',
            'site_reach_time',
            'slump_at_site_reach_time',
            'any_admixture_addedatsite',
            'any_water_added_at_site',
            'after_addition_of_water',
            'admixture_slumpmm',
            'pour_start_time',
            'pour_completed_time',
            'plant_return_time',
            //'isdeleted',
            //'created_by',
            //'created_at',
            //'updated_at',
            //'updated_by',
        ],
    ]) ?>

</div>
