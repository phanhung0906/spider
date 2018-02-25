<?php
use frontend\widgets\blueimp\Gallery;
use frontend\helpers\Helper;

$this->registerCssFile("@web/css/product.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);

$this->registerCssFile("@web/libs/css/owl/owl.carousel.min.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);
$this->registerCssFile("@web/libs/css/owl/owl.theme.default.min.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);

$this->registerJsFile(
    '@web/libs/js/owl/owl.carousel.min.js',
    ['depends' => [yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/libs/js/owl/main.js',
    ['depends' => [yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/js/product.js',
    ['depends' => [yii\web\JqueryAsset::className()]]
);
$this->title = Yii::t('app', 'Áo dài');
$this->params['breadcrumbs'][] = Yii::t('app', 'Áo dài');
?>

<div class="container" id="viewDefault">
    <div class="card">
        <div class="wrapper row">
            <div class="preview col-md-5">
                <?php Gallery::begin(['options' => ['class' => 'w-gallery']]); ?>
                <div class="preview-pic tab-content">
                    <?php $i = 0; ?>
                    <?php foreach ($model['image'] as $originImage): ?>
                        <?php $i++; ?>
                        <div class="tab-pane <?php if ($i == 1) echo 'active'; ?>" id="pic-<?= $i ?>"><a data-gallery
                                                                                                         href="<?= $originImage['origin'] ?>"><img
                                        src="<?= $originImage['origin'] ?>"/></a></div>
                    <?php endforeach; ?>
                </div>
                <?php Gallery::end(); ?>
                <div class="owl-carousel preview-thumbnail">
                    <?php $j = 0; ?>
                    <?php foreach ($model['image'] as $originImage): ?>
                        <?php $j++; ?>
                        <div class="wrapper-image-list"><a data-target="#pic-<?= $j ?>" data-toggle="tab"><img
                                        src="<?= $originImage['origin'] ?>"/></a></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="details col-md-7">
                <div class="title-wrap">
                    <h1 class="item-name"><?= $model['name'] ?></h1>
                    <div class="pd-meta-wrap">
                        <div class="meta-item">
                            <?php if(!empty($model['review']) && !empty($model['review_quantity'])): ?>
                            <span class="rating-box">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star"></i>
                                <span style="width: <?= (float)$model['review']/5 * 100 ?>%;">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </span>
                            <span><?= $model['review'] ?></span>/5 (<?= $model['review_quantity'] ?> lượt đánh giá) &nbsp;
                            <?php else: ?>
                                <span class="not-review">Chưa có đánh giá cho sản phẩm này</span>
                            <?php endif; ?>
                        </div>
                        <div class="meta-item sell_by">
                            Bán tại: <a href="<?= $model['aff_url'] ?>"><?= $model['website_name'] ?></a>
                        </div>
                        <div class="meta-item">
                            Ngày cập nhật: <span><?= date('d/m/Y', $model['updated_at']); ?></span>
                        </div>
                    </div>
                    <div class="item-brand">
                        <h6>Thương hiệu: </h6>
                        <a href="#"><?= $model['brand'] ?></a>
                    </div>
                </div>
                <div class="summary-wrap">
                    <?= $model['summary'] ?>
                </div>
                <div class="content-wrap">
                    <div id="new_price" class="price-block">
                        <span>Giá bán: </span> <span
                                class="price"><?= \Yii::$app->helper->product_price($model['price']['newPrice']) ?></span>
                    </div>
                    <?php if (!empty($model['sale'])): ?>
                        <div id="old_price" class="price-block">
                            <span>Giá trước đây: </span> <span
                                    class="price"><?= \Yii::$app->helper->product_price($model['price']['newPrice']) ?></span>
                        </div>
                        <div id="save" class="price-block">Tiết kiệm <span class="price"><?= $model['sale'] ?>%</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="action buy-button">
                    <a href="<?= $model['aff_url'] ?>"
                       class="add-to-cart btn" target="_blank">ĐẾN NƠI BÁN</a>
                </div>
            </div>
        </div>
    </div>

    <div class="infomation-wrap">
        <h1 class="product-detail__specs-title">Thông tin sản phẩm</h1>
        <div class="product-detail__specs">
            <div class="product-specs__table">
                <table class="table-bordered table-responsive">
                    <tbody>
                    <?php foreach ($model['information'] as $info): ?>
                        <tr>
                            <td class="specs-table__property"><?= $info['title']?></td>
                            <td class="specs-table__value"><?= $info['value']?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="infomation-wrap">
        <h1 class="product-detail__specs-title">Mô tả sản phẩm</h1>
        <div class="product-detail__specs">
            <?= $model['description'] ?>
        </div>
    </div>

    <div class="infomation-wrap">
        <h1 class="product-detail__specs-title">Có thể bạn quan tâm</h1>
        <div class="product-detail__specs">
            <div class="owl-carousel supplier product-slide">
                <?php foreach ($relateProduct as $product): ?>
                <?php $productUrl = Helper::urlDetail('/product', $product['_id'], $product['slug']); ?>
                <div class="supplier-wrap">
                    <a href="<?= $productUrl ?>"><img alt=""
                                     data-src="<?= $product['thumbnail']?>"
                                     class="product-image owl-lazy"></a>
                    <div class="supplier-info">
                        <div class="title"><a href="<?= $productUrl ?>"> <?= $product['name']?></a></div>
                        <div class="orders">
                            <span class="product-price"><?= \Yii::$app->helper->product_price($product['price']['newPrice']) ?></span>
                            <?php if (!empty($product['sale'])): ?>
                            <span class="product-price__saving">-<?= $product['sale'] ?>%</span>
                            <?php endif;?>
                        </div>
                        <div class="old-price">
                            <?php if (!empty($product['sale'])): ?>
                            <?= \Yii::$app->helper->product_price($product['price']['oldPrice']) ?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
