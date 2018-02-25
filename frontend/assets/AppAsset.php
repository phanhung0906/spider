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
        'css/reset.css',
        'css/site.css',
        'libs/css/fontawesome/fontawesome-all.min.css',
    ];
    public $js = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function dependJquery() {
        $this->depends[] = 'yii\web\JqueryAsset';
        return $this;
    }


    public function addCss($prod) {
        $this->css[] = $prod;
        return $this;
    }

    public function addJs($prod) {
        $this->js[] = $prod;
        return $this;
    }

}
