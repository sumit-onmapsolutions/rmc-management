<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ExcelRecords */

$this->title = 'Create Excel Records';
$this->params['breadcrumbs'][] = ['label' => 'Excel Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excel-records-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
