<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EquipmentTransaction */

$this->title = 'Create Equipment Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
