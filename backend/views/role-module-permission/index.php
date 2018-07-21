<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoleModulePermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role Module Permissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-module-permission-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Role Module Permission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'RoleName',
            'ModuleName',
            [
                'attribute'=>'new',
                'header'=>'Create',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',
                'value' => function($model, $key, $index)
                {   
                    if($model->new == '1')
                    {
                        return "Active";
                    }
                    else
                    {   
                        return "Deactive";
                    }
                },
            ],
            [
                'attribute'=>'view',
                'header'=>'View',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',
                'value' => function($model, $key, $index)
                {   
                    if($model->view == '1')
                    {
                        return "Active";
                    }
                    else
                    {   
                        return "Deactive";
                    }
                },
            ],
            [
                'attribute'=>'save',
                'header'=>'Edit',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',
                'value' => function($model, $key, $index)
                {   
                    if($model->save == '1')
                    {
                        return "Active";
                    }
                    else
                    {   
                        return "Deactive";
                    }
                },
            ],
            [
                'attribute'=>'remove',
                'header'=>'Delete',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',
                'value' => function($model, $key, $index)
                {   
                    if($model->remove == '1')
                    {
                        return "Active";
                    }
                    else
                    {   
                        return "Deactive";
                    }
                },
            ],
           //'added_at',
            //'added_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
