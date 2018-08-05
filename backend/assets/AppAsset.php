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
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'finaltheme/assets2/plugins/font-awesome/css/font-awesome.css',
        'finaltheme/assets2/plugins/simple-line-icons/simple-line-icons.min.css',
        'finaltheme/assets2/plugins/bootstrap/css/bootstrap.min.css',
        'finaltheme/assets2/plugins/bootstrap-toastr/toastr.min.js',
        'finaltheme/assets2/plugins/bootstrap-tabdrop/css/tabdrop.css',
        'finaltheme/assets2/plugins/jquery-nestable/jquery.nestable.css',
        'finaltheme/assets2/plugins/pace/themes/pace-theme-barber-shop.css',
        'finaltheme/assets2/plugins/jstree/dist/themes/default/style.min.css',
        'finaltheme/assets2/css/components.css',
        'finaltheme/assets2/css/plugins.css',
        'finaltheme/assets2/css/layout.css',
        'finaltheme/assets2/css/error.css',
        'finaltheme/assets2/css/login.css',
        'finaltheme/assets2/css/themes/darkblue.css',
        'finaltheme/assets2/plugins/org-chart/jquery.orgchart.css',
        'finaltheme/assets2/css/custom.css',
        'finaltheme/assets2/css/login3.css',
        'finaltheme/assets2/resizable-columns/dist/jquery.resizableColumns.css'
    ];
    public $js = [
        // 'theme/js/jquery-2.1.1.min.js  ',
        // 'finaltheme/assets2/plugins/jquery-ui/jquery-ui.min.js',
        'finaltheme/assets2/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'finaltheme/assets2/plugins/jquery-nestable/jquery.nestable.js',
        'finaltheme/assets2/plugins/jstree/dist/jstree.min.js',
        'finaltheme/assets2/plugins/pace/pace.min.js',
        'finaltheme/assets2/js/metronic.js',
        'finaltheme/assets2/js/layout.js',
        'finaltheme/assets2/js/quick-sidebar.js',
        'finaltheme/assets2/js/components-knob-dials.js',
        'finaltheme/assets2/js/ui-general.js',
        'finaltheme/assets2/js/ui-nestable.js',
        'finaltheme/assets2/js/ui-toastr.js',
        'finaltheme/assets2/js/ui-tree.js',
        'finaltheme/assets2/js/jquery.floatThead.min.js',
        'finaltheme/assets2/plugins/org-chart/jquery.orgchart.js',
        'finaltheme/assets2/resizable-columns/dist/jquery.resizableColumns.min.js',
        'finaltheme/assets2/plugins/bootstrap/js/bootstrap.min.js',
        'finaltheme/bootstrap.js',
        'finaltheme/assets2/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'finaltheme/assets2/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js',
        'finaltheme/assets2/js/form-wizard.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
