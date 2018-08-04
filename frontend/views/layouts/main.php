<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<style>
.navbar{
    background-color: #cc0000;
    color: white;
}
</style>

<style>
    .footer {
           position: fixed;
           left: 0;
           bottom: 0;
           height: 40px;
           width: 100%;
           background-color: #cc0000;
           color: white;
           text-align: center;
        }   

        p {
            padding: 10px;
        }

</style>


</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
      //  'brandLabel' => Yii::$app->name,
      //  'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-fixed-top ',
            'padding-bottom' => '2px',
        ],
    ]);
    $menuItems = [
     //   ['label' => 'Home', 'url' => ['/site/index']],
      //  ['label' => 'About', 'url' => ['/site/about']],
      //  ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup'], 'options' => ['style' => 'background-color: white; ']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['style' => 'background-color: white;']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <= Html::encode(Yii::$app->name) ?> <= date('Y') ?></p>

        <p class="pull-right"><= Yii::powered() ?></p>
    </div>
</footer> -->

<div class="footer">
    <p>Powered by ON MAP SOLUTIONS, PUNE</p>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
