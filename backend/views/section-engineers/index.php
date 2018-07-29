<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SectionEngineersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Section Engineers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-engineers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Section Engineers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Section',
            'SectionIncharge',
            'Engineer',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
