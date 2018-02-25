
<?php
$this->registerCssFile("@web/libs/css/mega-dropdown/style.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);
$this->registerJsFile(
    '@web/libs/js/mega-dropdown/modernizr.js'
);
$this->registerJsFile(
    '@web/libs/js/mega-dropdown/jquery.menu-aim.js',
    ['depends' => [yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/libs/js/mega-dropdown/main.js',
    ['depends' => [yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/js/header.js',
    ['depends' => [yii\web\JqueryAsset::className()]]
);
?>
<div>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div id="header-fixed" class="">
                <div id="header-fixed-container" class="">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/" style="padding:5px 0px 5px 20px;margin-left: 15px;"><img src="//static.muabay.com/frontend/library/img/logo.png" height="35" alt="Mua bay Logo"></a>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="search-bar-top">
                                    <form id="searchFormTop" action="/search" method="get">
                                        <div class="wrapper-input">
                                            <input name="q" type="text" id="pkeywords" class="watermark" placeholder="Tìm sản phẩm, thương hiệu bạn mong muốn ..." autocomplete="off">
                                        </div>
                                    </form>
                                    <a class="ico-search">
                                        <span class="fa fa-search"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="wrapper-header-user">
                                <div id="header-user">
                                    <div class="show-stat-box visible-lg">
                                        <div class="item">
                                            <div class="title">1.163.245</div>
                                            <div class="text">Sản phẩm - Dịch vụ</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">&gt; 100 website</div>
                                            <div class="text">uy tín tại Việt Nam</div>
                                        </div>
                                    </div>
                                </div> </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu">
                <?= \frontend\widgets\MegaMenu::widget(); ?>
                <div class="list-navigator">
                    <ul>
                        <li>
                            <a target="_blank" href="/category-list" rel="nofollow">Tất cả danh mục</a>
                        </li>
                        <li>
                            <a target="_blank" href="https://goo.gl/2mHrM8" rel="nofollow">Sản phẩm giá sốc giảm 50% ++<span class="hot"><img src="//static.muabay.com/frontend/library/img/hot.gif" alt="Sản phẩm giá sốc"></span></a>
                        </li>
                        <li>
                            <a target="_blank" href="/promotion" rel="nofollow">Khuyến mãi - Mã giảm giá</a>
                        </li>
                        <li>
                        </li>
                    </ul>
                </div> </div>
        </div>

    </nav>
</div>