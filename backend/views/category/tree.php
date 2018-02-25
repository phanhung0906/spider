<?php
    $this->registerCssFile("@web/libs/css/jstree/style.min.css", [
        'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    ], 'css-print-theme');
    $this->registerJsFile(
        '@web/libs/js/jstree/jstree.min.js',
        ['depends' => [yii\web\JqueryAsset::className()]]
    );
    $this->registerJsFile(
        '@web/libs/js/jstree/main.js',
        ['depends' => [yii\web\JqueryAsset::className()]]
    );
?>
<input type="text" id="plugins4_q" class="input">
<h5>Current Category ID: </h5>
<b class="texr-info" id="currentCategoryId"></b>
<div id="jstree">
  <h1>Show Menu</h1>
</div>
<button class="btn btn-default expand-all">Expand All</button>
<button class="btn btn-default close-all">Close All</button>
