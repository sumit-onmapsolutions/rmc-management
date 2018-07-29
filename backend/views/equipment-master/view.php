<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EquipmentMaster */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Equipment Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-master-view">

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
            'name',
            'unit',
            [
                'attribute'=>'Status',
                'header'=>'Status',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->status == '1')
                    {
                        return '<p class="text-success">Active</p>';
                    }
                    else
                    {   
                        return '<p class="text-danger">Deactive</p>';
                    }
                },
            ],
           // 'created_at',
           // 'created_by',
           // 'updated_at',
           // 'updated_by',
           // 'is_deleted',
        ],
    ]) ?>

</div>
