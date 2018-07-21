<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EquipmentMaster */

$this->title = 'Create Equipment Master';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
