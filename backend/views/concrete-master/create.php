<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ConcreteMaster */

$this->title = 'Create Concrete Master';
$this->params['breadcrumbs'][] = ['label' => 'Concrete Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concrete-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
