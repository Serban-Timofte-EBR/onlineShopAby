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
        'css/plugins/bootstrap.min.css',
        'css/plugins/fontawesome.min.css',
        'css/plugins/default.css',
        'css/plugins/animate.css',
        'css/plugins/slick.css',
        'css/plugins/component.css',
        'css/plugins/magnific-popup.css',
        'css/plugins/jquery-ui.min.css',
        'css/plugins/select2.min.css',
        'css/plugins/photoswipe.css',
        'css/plugins/photoswipe-default-skin.css',
        'css/style.css',
    ];

    public $js = [
        'js/vendor/jquery-3.5.1.min.js',
        'js/vendor/modernizr-3.7.1.min.js',
        'js/plugins/slick.min.js',
        'js/plugins/jquery.dlmenu.js',
        'js/plugins/jquery.paroller.min.js',
        'js/plugins/select2.min.js',
        'js/plugins/photoswipe.min.js',
        'js/plugins/photoswipe-ui-default.min.js',
        'js/plugins/jquery.elevateZoom.min.js',
        'js/plugins/parallax.min.js',
        'js/plugins.min.js',
        'js/main.js'
    ];

    public $jsOptions= ['position' => \yii\web\View::POS_END];
}
