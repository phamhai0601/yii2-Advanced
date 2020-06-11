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
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        'vendors/font-awesome/css/font-awesome.min.css',
        'vendors/nprogress/nprogress.css',
        'vendors/iCheck/skins/flat/green.css',
        'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
        'build/css/custom.min.css',
        'css/custom.css',
        'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css',

    ];
    public $js = [
        'build/js/custom.min.js',
        'js/jquery_custom.js',
        'js/rails.js',
        'https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js',
        'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js',
        'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
