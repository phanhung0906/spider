<?php
use frontend\helpers\Helper;
use common\models\Product;

$this->registerCssFile("@web/css/category.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);

$this->registerJsFile(
    '@web/js/category.js',
    ['depends' => [yii\web\JqueryAsset::className()]]
);

$this->title = Yii::t('app', 'Thời trang');
$this->params['breadcrumbs'][] = Yii::t('app', 'Thời trang');
?>

<div class="container">
    <div class="row category-wrap">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
            <section id="category-sbox" class="common-sbox category-sbox">
                <div class="sbox-head">
                    <div class="title-cell">Danh mục liên quan</div>
                </div>
                <div class="sbox-main">
                    <a class="lv1-link" href="/us/s/search/?rh=n:283155,k:Women's+Fashion&amp;keywords=Women's+Fashion">
                        <span class="icon"></span>
                        <span class="title">Books</span>
                    </a>
                    <a class="lv1-link" href="/us/s/search/?rh=n:48,k:Women's+Fashion&amp;keywords=Women's+Fashion">
                        <span class="icon"></span>
                        <span class="title">Crafts, Hobbies &amp; Home</span>
                    </a>
                    <a class="lv1-link" href="/us/s/search/?rh=n:5126,k:Women's+Fashion&amp;keywords=Women's+Fashion">
                        <span class="icon"></span>
                        <span class="title">Crafts &amp; Hobbies</span>
                    </a>
                    <a class="lv1-link" href="/us/s/search/?rh=n:13998731,k:Women's+Fashion&amp;keywords=Women's+Fashion">
                        <span class="icon"></span>
                        <span class="title">Needlecrafts &amp; Textile Crafts</span>
                    </a>
                    <a class="lv1-link" href="/us/s/search/?rh=n:5140,k:Women's+Fashion&amp;keywords=Women's+Fashion">
                        <span class="icon"></span>
                        <span class="title">Fashion</span>
                    </a>
                    <ul class="lv2-list">
                    </ul><!-- .lv2-list -->

                </div><!-- .sbox-main -->
            </section>

            <section id="filter-cate-sbox" class="common-sbox filter-cate-sbox">
                <div class="sbox-head">
                    <div class="title-cell">Tùy chọn tìm kiếm</div>
                </div>

                <div class="sbox-main">
                    <div class="filter-panel is-show">
                        <div class="panel-head">Nơi bán</div>
                        <div class="panel-main">
                            <a class="remove-filter-btn" href="javascript:void(0)">Bỏ lọc theo điều kiện này</a>
                            <a class="filter-item  is-active " href="/us/s/search/?rh=n:1045024,k:dress,p_n_feature_four_browse-bin:13904925011&amp;keywords=dress">
                                <span class="icon"></span>
                                <span class="title">Adayroi</span>
                            </a>
                            <a class="filter-item   " href="/us/s/search/?rh=n:1045024,k:dress,p_n_feature_four_browse-bin:13904925011,p_n_feature_eighteen_browse-bin:14630392011|16926165011&amp;keywords=dress">
                                <span class="icon"></span>
                                <span class="title">Lazada</span>
                            </a>

                        </div><!-- .panel-main -->
                    </div>
                    <div class="filter-panel is-show">
                        <div class="panel-head">Đánh giá</div>
                        <div class="panel-main">
                            <div class="star">
                                <a href="#">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span> (ít nhất 4 sao)</span>
                                </a>
                            </div>
                            <div class="star">
                                <a href="#">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span> (ít nhất 3 sao)</span>
                                </a>
                            </div>
                            <div class="star">
                                <a href="#">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span> (ít nhất 2 sao)</span>
                                </a>
                            </div>
                            <div class="star">
                                <a href="#">
                                    <span class="fas fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span class="far fa-star"></span>
                                    <span> (ít nhất 1 sao)</span>
                                </a>
                            </div>
                        </div><!-- .panel-main -->
                    </div>
                    <div class="filter-panel is-show" data-attr="<?= Product::PRICES?>">
                        <div class="panel-head">Giá</div>
                        <div class="remove-block"></div>
                        <div class="panel-main">
                            <form id="formPriceRange" class="filter-price-form">
                                <div class="show-wrap">
                                    <input type="text" class="price-val" id="fromPrice" placeholder="Tối thiểu">
                                    <i class="fas fa-chevron-right"></i>
                                    <input type="text" class="price-val" id="toPrice" placeholder="Tối đa">
                                </div>
                                <button class="submit-btn btn-reset" type="button" id="btnPriceRange">OK</button>
                            </form>
                        </div><!-- .panel-main -->
                    </div>
                </div><!-- .sbox-main -->
            </section>
        </div>
        <div class="col-sm-12 col-md-9 col-lg-10 product-list-block">
            <div class="title-wrap">
                <div class="row">
                    <div class="col-md-6 col-lg-7 title-block">
                        <h1 class="header__title">THỜI TRANG</h1>
                        <span class="header__search-result">Tìm thấy <?= $pages->totalCount ?> sản phẩm</span>
                    </div>

                    <div class="col-md-6 col-lg-5 text-right">
                        <form method="GET" class="filter-product" data-attr="<?= Product::SORT?>">
                            <select name="filter" class="form-control filter-selected">
                                <option value="0" selected="selected" class="select-option open">Sắp xếp theo:</option>
                                <option value="<?= Product::FILTER_PRICE_ASC ?>">Giá từ thấp đến cao</option>
                                <option value="<?= Product::FILTER_PRICE_DESC ?>">Giá từ cao đến thấp</option>
                                <option value="<?= Product::FILTER_PROMOTION_DESC ?>">Giảm giá nhiều nhất</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <div class="product-wrap row">
                <?php foreach ($models as $product): ?>
                    <?php $productUrl = Helper::urlDetail('/product', $product['_id'], $product['slug']); ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 product-block">
                        <a class="img" href="<?= $productUrl ?>">
                            <img class="img-lazy"
                                 src="<?= $product['thumbnail'] ?>">
                            <?php if (!empty($product['sale'])): ?>
                                <div class="sale-rate">Giảm<span><?= $product['sale'] ?>%</span></div>
                            <?php endif; ?>
                        </a>
                        <div class="title">
                            <a href="<?= $productUrl ?>"><?= $product['name'] ?></a>
                        </div>
                        <div class="price">
                            <span class="money"><?= \Yii::$app->helper->product_price($product['price']['newPrice']) ?></span>
                            <?php if (!empty($product['sale'])): ?>
                                <span class="suggest-price"><?= \Yii::$app->helper->product_price($product['price']['oldPrice']) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="website">
                            Nơi bán: <a href="<?= $product['aff_url'] ?>"><?= $product['website_name'] ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center">
                <?= \yii\widgets\LinkPager::widget([
                    'pagination' => $pages,
                    'maxButtonCount' => 10,
                    'firstPageLabel' => 'Trang đầu',
                    'lastPageLabel' => 'Trang cuối'
                ]); ?>
            </div>
        </div>
    </div>
</div>


<div class="wrap-delete-attr" style="display: none">
    <a class="remove-filter-btn" href="javascript:void(0)">Bỏ lọc theo điều kiện này</a>
</div>
