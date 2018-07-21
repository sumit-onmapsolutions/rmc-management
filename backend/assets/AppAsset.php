<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'theme/css/demo-page.css',
        'theme/css/bootstrap.css',
        'theme/css/examples.css',
        'theme/css/font-awesome.css',
        'theme/css/geochart.css',
        'theme/css/hover.css',
        'theme/css/magnific-popup.css',
        'theme/css/style.css',
    ];
    public $js = [
        //'theme/js/jquery-2.1.1.min.js  ',
        'theme/js/jquery.magnific-popup.js',
        'theme/js/jquery.nicescroll.js',
        'theme/js/scripts.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
