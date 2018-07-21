<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'backend/theme/css/bootstrap.css',
        'backend/theme/css/style.css',
        'backend/theme/css/font-awesome.css',
    ];
    public $js = [
        'backend/theme/js/jquery-2.1.1.min.js',
        'backend/theme/js/jquery.nicescroll.js',
        'backend/theme/js/scripts.js',
        'backend/theme/js/bootstrap.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
