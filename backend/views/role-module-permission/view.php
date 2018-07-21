<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RoleModulePermission */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Role Module Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-module-permission-view">

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
            // 'role_id',
            'RoleName',
            'ModuleName',
            //'module_id',
            [
                'attribute'=>'new',
                'header'=>'Create',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->new == '1')
                    {
                        return '<p class="text-success">Active</p>';
                    }
                    else
                    {   
                        return '<p class="text-danger">Deactive</p>';
                    }
                },
            ],
            [
                'attribute'=>'view',
                'header'=>'View',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->view == '1')
                    {
                        return '<p class="text-success">Active</p>';
                    }
                    else
                    {   
                        return '<p class="text-danger">Deactive</p>';
                    }
                },
            ],
            [
                'attribute'=>'save',
                'header'=>'Edit',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->save == '1')
                    {
                        return '<p class="text-success">Active</p>';
                    }
                    else
                    {   
                        return '<p class="text-danger">Deactive</p>';
                    }
                },
            ],
            [
                'attribute'=>'remove',
                'header'=>'Delete',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->remove == '1')
                    {
                        return '<p class="text-success">Active</p>';
                    }
                    else
                    {   
                        return '<p class="text-danger">Deactive</p>';
                    }
                },
            ],
            //'added_at',
            //'added_by',
        ],
    ]) ?>

</div>
