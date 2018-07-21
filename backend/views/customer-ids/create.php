<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerIds */

$this->title = 'Create Customer Ids';
$this->params['breadcrumbs'][] = ['label' => 'Customer Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-ids-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
