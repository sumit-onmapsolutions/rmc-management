<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConcreteTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Concrete Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concrete-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Concrete Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'parent_concrete_id',
            'sub_concrete_id',
            'quantity',
            //'unit',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
