<?php

namespace frontend\widgets\blueimp\assets;

class BlueImpAsset extends \yii\web\AssetBundle
{
    public $name = 'blueimp';
    public $sourcePath = '@frontend/widgets/blueimp/files';
    
    public $js = [
        'js/blueimp-helper.js',
        'js/blueimp-gallery.min.js',
        'js/jquery.blueimp-gallery.min.js'
    ];
    public $css = [
        'css/blueimp-gallery.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}