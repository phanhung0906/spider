<?php
$this->registerCssFile("@web/css/promotion.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);

$this->title = Yii::t('app', 'Chương trình khuyến mãi - Mã giảm giá');
$this->params['breadcrumbs'][] = Yii::t('app', 'Khuyến mãi - Mã giảm giá');
?>
<div class="promotion-wrap">
    <div class="box-head">
        <div class="icon"><i class="fas fa-align-justify"></i></div>
        <div class="title">TỔNG HỢP KHUYẾN MÃI <span>Tìm thấy <?= $pages->totalCount ?> khuyến mãi</span></div>
    </div>
    <?php foreach ($models as $promotion): ?>
        <div class="promotion-content">
            <div class="row">
                <div class="col-xs-12 col-md-6 image-block"><a href="<?= $promotion['aff_link'] ?>" target="_blank"
                                                               rel="nofollow"><img
                                src="<?= $promotion['image'] ?>"
                                alt="<?= $promotion['name'] ?>"></a></div>
                <div class="col-xs-12 col-md-6 content-block">
                    <h5 class="text-uppercase">
                        <a href="<?= $promotion['aff_link'] ?>"><?= '[' . $promotion['merchant'] . ']' ?></a>
                        <b><a href="<?= $promotion['aff_link'] ?>"><?= $promotion['name'] ?></a></b></h5>
                    <p><?= $promotion['content'] ?></p>
                    <?php if ($promotion['coupons'] && is_array($promotion['coupons'])): ?>
                        <p>Mã giảm giá:
                            <?php
                            $quantity = count($promotion['coupons']);
                            $count = 0;
                            ?>
                            <?php foreach ($promotion['coupons'] as $coupon): ?>
                                <label class="label label-info"><?= $coupon['coupon_code'] ?></label>&nbsp;(<?= $coupon['coupon_desc'] ?>)
                                <?php if (++$count < $quantity): ?>
                                    ,&nbsp;
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                    <p>
                        Ngày hoạt động:
                        <b class="text-danger">Từ <?= date('d/m/Y', $promotion['start_time']) ?> đến <?= date('d/m/Y',$promotion['end_time']) ?></b>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="text-center">
        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);?>
    </div>
</div>