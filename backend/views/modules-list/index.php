<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ModulesListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Modules Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modules-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Modules List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                // 'module_id',
            'module_name',
            'controller',
            'icon',
            [
                'attribute'=>'active',
                'header'=>'Status',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',
                'value' => function($model, $key, $index)
                {   
                    if($model->is_active == '1')
                    {
                        return "Active";
                    }
                    else
                    {   
                        return "Deactive";
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
