<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ConcreteTransaction */

$this->title = 'Create Concrete Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Concrete Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concrete-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
