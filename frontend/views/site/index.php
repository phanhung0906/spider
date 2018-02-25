<?php
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="welcome-box">
    <div class="welcome-box-inner">
        <h1 class="welcome-box_title">Tập hợp hơn 2 tỷ sản phẩm từ các Website uy tín!</h1>
        <h2 class="welcome-box_subtitle">Sứ mệnh của Fado Việt Nam là giúp bạn chọn mua được hàng tốt, giá rẻ, ưng ý tại Việt Nam</h2></div>
</div>

<section id="home-sale-block" class="home-sale-block">
    <div class="container">
        <div class="block-head">
            <h2 class="block-title">DANH SÁCH ĐANG KHUYẾN MÃI - MUA NGAY KẺO LỠ</h2>
        </div>
        <div class="row">
            <?php foreach ($promotiom_model as $promotion): ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="promotion-panel">
                    <a class="img" href="<?= $promotion['aff_link']?>">
                        <img src="<?= $promotion['image']?>">
                    </a>
                    <div class="title">
                        <a href="<?= $promotion['aff_link']?>"><?= $promotion['name']?></a>
                    </div>
                    <div class="text-danger">Ngày hết hạn: <?= date('m/d/Y', $promotion['end_time'])?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <a class="btn view-more-btn" href="<?=  Url::to(['promotion/index']);?>">XEM THÊM</a>
    </div>
</section>

<section class="home-sale-block">
    <div class="container">
        <div class="block-head">
            <h2 class="block-title">Danh mục ngành hàng</h2>
        </div>
        <div class="card-categories-ul">

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/dien-thoai-di-dong/?abtest=&amp;pos=1&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4518__3703394__u2i&amp;up_id=3703394&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4518__3703394__u2i" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4518__3703394__u2i" title="Điện" thoại="" di="" động="" data-spm-anchor-id="a2o4n.home.categories.1" data-aplus-ae="3c45e28">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-01.slatic.net/p/2/samsung-galaxy-j2-prime-vang-hong-hang-phan-phoi-chinh-thuc-1518147757-4933073-9a28215c7103499268c8bd1db883bcda-catalog_233.jpg" alt="Điện thoại di động">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Điện thoại di động
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/giay-sneaker-nam/?abtest=&amp;pos=2&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__6372__6884009__u2i&amp;up_id=6884009&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__6372__6884009__u2i" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__6372__6884009__u2i" title="Giày" sneaker="" nam="" data-spm-anchor-id="a2o4n.home.categories.2" data-aplus-ae="35446eeb">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-01.slatic.net/p/7/giay-sneaker-nam-cv-thap-co-zavans-den-1504819808-9004886-ff210eb4aefffd34c1094d01d87d8306-catalog_233.jpg" alt="Giày sneaker nam">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Giày sneaker nam
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/giay-luoi-giay-moi-nam/?abtest=&amp;pos=3&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__11209__5016507__u2i&amp;up_id=5016507&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__11209__5016507__u2i" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__11209__5016507__u2i" title="Giày" lười="" &amp;="" giày="" mọi="" nam="" data-spm-anchor-id="a2o4n.home.categories.3" data-aplus-ae="2ddc4a9f">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-03.slatic.net/p/7/giay-luoi-vai-nam-phong-cach-zavans-den-1490347813-7056105-ca73f6d12ad765f7ce65e99f739fb1e7-catalog_233.jpg" alt="Giày lười &amp; Giày mọi nam">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Giày lười &amp; Giày mọi nam
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/ao-khoac-cho-cho-cung/?abtest=&amp;pos=4&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14778__16572157__u2i&amp;up_id=16572157&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14778__16572157__u2i" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14778__16572157__u2i" title="Áo" khoác="" data-spm-anchor-id="a2o4n.home.categories.4" data-aplus-ae="3177deb0">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-03.slatic.net/p/8/pet-camouflage-clothes-winter-warm-waterproof-printing-coatarmy-green-xxl-intl-1507761252-75127561-fe76b572c34eceed07729fc299f9d4e1-catalog_233.jpg" alt="Áo khoác">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Áo khoác
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/ukulele/?abtest=&amp;pos=5&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__8617__3434694__u2i&amp;up_id=3434694&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__8617__3434694__u2i" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__8617__3434694__u2i" title="Đàn" ukulele="" data-spm-anchor-id="a2o4n.home.categories.5" data-aplus-ae="2b341776">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-03.slatic.net/p/1/dan-ukulele-21-mau-tron-1516344612-4964343-695a4b6012cb61fa657a97e4cdc56ffb-catalog_233.jpg" alt="Đàn Ukulele">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Đàn Ukulele
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/op-lung-bao-da-dien-thoai/?abtest=&amp;pos=6&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4523__14190811__static&amp;up_id=14190811&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4523__14190811__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4523__14190811__static" title="Ốp" lưng="" &amp;="" bao="" da="" điện="" thoại="" data-spm-anchor-id="a2o4n.home.categories.6" data-aplus-ae="54610876">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-02.slatic.net/p/2/huawei-nova-2-plus-case-mooncase-frosted-armor-hard-pc-back-cover-360-full-body-shockproof-protective-with-3-detachable-parts-phone-case-as-shown-intl-1505720591-11809141-e185d6426a9e8378634e053e78fb072e-catalog_233.jpg" alt="Ốp lưng &amp; bao da điện thoại">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Ốp lưng &amp; bao da điện thoại
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/thiet-bi-loa-di-dong/?abtest=&amp;pos=7&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__3299__2434454__static&amp;up_id=2434454&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__3299__2434454__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__3299__2434454__static" title="Loa" di="" động="" data-spm-anchor-id="a2o4n.home.categories.7" data-aplus-ae="429e1ba9">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-02.slatic.net/p/2/loa-di-dong-101c-den-1463904135-4936451-d37c1ad1968223bc4f3a9240d1b85c41-catalog_233.jpg" alt="Loa di động">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Loa di động
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/mu-bao-hiem-xe-mo-to-xe-dia-hinh/?abtest=&amp;pos=8&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__13730__5478134__static&amp;up_id=5478134&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__13730__5478134__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__13730__5478134__static" title="Mũ" bảo="" hiểm="" xe="" máy="" data-spm-anchor-id="a2o4n.home.categories.8" data-aplus-ae="552f3121">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-01.slatic.net/p/8/non-34-chuyen-phuot-1493118328-4318745-ddb611723baa744379746771763fd92c-catalog_233.jpg" alt="Mũ bảo hiểm xe máy">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Mũ bảo hiểm xe máy
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/dong-ho-nu-thoi-trang-cao-cap/?abtest=&amp;pos=9&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__8959__5529259__static&amp;up_id=5529259&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__8959__5529259__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__8959__5529259__static" title="Đồng" hồ="" thời="" trang="" nữ="" data-spm-anchor-id="a2o4n.home.categories.9" data-aplus-ae="2901ab77">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-02.slatic.net/p/8/dong-ho-nu-dinh-da-thoi-trang-bs-fa0280b-gold-1517989684-9529255-0192626afd6dbdcaae9cc16622589c57-catalog_233.jpg" alt="Đồng hồ thời trang nữ">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Đồng hồ thời trang nữ
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/smart-tivi/?abtest=&amp;pos=10&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4549__6477711__static&amp;up_id=6477711&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4549__6477711__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4549__6477711__static" title="Smart" tivi="" data-spm-anchor-id="a2o4n.home.categories.10" data-aplus-ae="10c054bc">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-02.slatic.net/p/2/smart-tv-led-lg-55-inch-uhd-4k-hdr-model-55uj632t-den-hangphan-phoi-chinh-thuc-1517455789-1177746-b17311314d35d156f91140e3d5b339c7-catalog_233.jpg" alt="Smart Tivi">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Smart Tivi
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/tui-deo-cheo-deo-vai-nu/?abtest=&amp;pos=11&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14430__3086997__static&amp;up_id=3086997&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14430__3086997__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14430__3086997__static" title="Túi" đeo="" chéo="" &amp;="" túi="" vai="" nữ="" data-spm-anchor-id="a2o4n.home.categories.11" data-aplus-ae="51a45eb7">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-02.slatic.net/p/7/tui-xach-tay-nu-lata-tx02-da-bo-nhat-1513180367-7996803-ba74c009ce6015ffd540bb1dd1835cef-catalog_233.jpg" alt="Túi đeo chéo &amp; Túi đeo vai nữ">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Túi đeo chéo &amp; Túi đeo vai nữ
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/ba-lo-nu/?abtest=&amp;pos=12&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14434__16484980__static&amp;up_id=16484980&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14434__16484980__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__14434__16484980__static" title="Ba" lô="" nữ="" data-spm-anchor-id="a2o4n.home.categories.12" data-aplus-ae="2a3843e8">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-03.slatic.net/p/7/ba-lo-thoi-trang-nam-nu-ancom-gl-1133la-xanh-1516203006-08948461-00d8a93df30371cee84339dd2eb71cc9-catalog_233.jpg" alt="Ba lô nữ">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Ba lô nữ
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/chuot-co-ban/?abtest=&amp;pos=13&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4460__10769721__static&amp;up_id=10769721&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4460__10769721__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4460__10769721__static" title="Chuột" cơ="" bản="" data-spm-anchor-id="a2o4n.home.categories.13" data-aplus-ae="7ee3f66d">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-01.slatic.net/p/2/chuot-khong-day-tu-sac-pin-cao-cap-den-1503070281-12796701-7ce972a3f21145d6d217925ae761a02d-catalog_233.jpg" alt="Chuột cơ bản">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Chuột cơ bản
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/mach-dien-linh-kien/?abtest=&amp;pos=14&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__13028__21962054__static&amp;up_id=21962054&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__13028__21962054__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__13028__21962054__static" title="Mạch" điện="" &amp;="" linh="" kiện="" data-spm-anchor-id="a2o4n.home.categories.14" data-aplus-ae="68f34e26">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-02.slatic.net/p/3/bo-10-con-transistor-tip41c-to-220-npn-6a-100v-1511510434-45026912-a29cff9685ebdf0544186961ef4cbf37-catalog_233.jpg" alt="Mạch điện &amp; Linh kiện">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Mạch điện &amp; Linh kiện
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/bo-khuech-dai-wifi/?abtest=&amp;pos=15&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4126__4525232__static&amp;up_id=4525232&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4126__4525232__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__4126__4525232__static" title="Bộ" khuếch="" đại="" wifi="" data-spm-anchor-id="a2o4n.home.categories.15" data-aplus-ae="4258bb8d">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-01.slatic.net/p/2/wifi-xiaomi-repeater-version-2-phien-ban-2017-thiet-bi-tang-song-1513178506-2325254-7f9991674db05297d91c4c0d00507327-catalog_233.jpg" alt="Bộ khuếch đại wifi">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Bộ khuếch đại wifi
                </span>
                    </div>
                </a>
            </div>

            <div class="card-categories-li hp-mod-card-hover align-left">
                <a class="card-categories-li-content" href="//www.lazada.vn/mat-na-dap/?abtest=&amp;pos=16&amp;abbucket=&amp;clickTrackInfo=f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__2291__21866497__static&amp;up_id=21866497&amp;from=hp_categories&amp;acm=icms-zebra-5000379-2586239.1003.1.2262805&amp;scm=1007.16282.95493.0&amp;aldid=wNQwG6Hu" exp-tracking="category" algo_scm="1007.16282.95493.0" trackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__2291__21866497__static" clicktrackinfo="f7ae7cbf-bcfa-4c7d-b0e3-3c3910e0befb__2291__21866497__static" title="Mặt" nạ="" đắp="" data-spm-anchor-id="a2o4n.home.categories.16" data-aplus-ae="6462b478">
                    <div class="card-categories-image-container">
                        <img class="image" src="https://vn-live-03.slatic.net/p/5/bo-duong-va-cham-soc-chuyen-sau-laneige-my-mask-collection-1517988093-79466812-c389422ae8215544c8076bf893f44122-catalog_233.jpg" alt="Mặt nạ đắp">
                    </div>
                    <div class="card-categories-name">
                <span class="text">
                  Mặt nạ đắp
                </span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<section class="category-block home-sale-block">
    <div class="container"">
        <div class="block-head">
            <h2 class="block-title">ĐIỆN THOẠI & MÁY TÍNH BẢNG</h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3 col-md-2">
                <div class="news-panel theme-news-1">
                    <a class="img" href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">
                        <img class="img-lazy" src="https://media.static-adayroi.com/sys_master/images/h9d/hb5/14699795120158.jpg">
                        <div class="sale-rate">Giảm<span>50%</span></div>
                    </a>
                    <div class="title">
                        <a href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">Đồng hồ unisex Daniel Wellington DW00100171 mặt trắng viền vàng dây da nâu</a>
                    </div>
                    <div class="price">
                        <span class="money">47,000₫</span>
                        <span class="suggest-price">94,000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-md-2">
                <div class="news-panel theme-news-1">
                    <a class="img" href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">
                        <img class="img-lazy" src="https://media.static-adayroi.com/sys_master/images/h9d/hb5/14699795120158.jpg">
                        <div class="sale-rate">Giảm<span>50%</span></div>
                    </a>
                    <div class="title">
                        <a href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">Đồng hồ unisex Daniel Wellington DW00100171 mặt trắng viền vàng dây da nâu</a>
                    </div>
                    <div class="price">
                        <span class="money">47,000₫</span>
                        <span class="suggest-price">94,000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-md-2">
                <div class="news-panel theme-news-1">
                    <a class="img" href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">
                        <img class="img-lazy" src="https://media.static-adayroi.com/sys_master/images/h9d/hb5/14699795120158.jpg">
                        <div class="sale-rate">Giảm<span>50%</span></div>
                    </a>
                    <div class="title">
                        <a href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">Đồng hồ unisex Daniel Wellington DW00100171 mặt trắng viền vàng dây da nâu</a>
                    </div>
                    <div class="price">
                        <span class="money">47,000₫</span>
                        <span class="suggest-price">94,000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-md-2">
                <div class="news-panel theme-news-1">
                    <a class="img" href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">
                        <img class="img-lazy" src="https://media.static-adayroi.com/sys_master/images/h9d/hb5/14699795120158.jpg">
                        <div class="sale-rate">Giảm<span>50%</span></div>
                    </a>
                    <div class="title">
                        <a href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">Đồng hồ unisex Daniel Wellington DW00100171 mặt trắng viền vàng dây da nâu</a>
                    </div>
                    <div class="price">
                        <span class="money">47,000₫</span>
                        <span class="suggest-price">94,000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-md-2">
                <div class="news-panel theme-news-1">
                    <a class="img" href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">
                        <img class="img-lazy" src="https://media.static-adayroi.com/sys_master/images/h9d/hb5/14699795120158.jpg">
                        <div class="sale-rate">Giảm<span>50%</span></div>
                    </a>
                    <div class="title">
                        <a href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">Đồng hồ unisex Daniel Wellington DW00100171 mặt trắng viền vàng dây da nâu</a>
                    </div>
                    <div class="price">
                        <span class="money">47,000₫</span>
                        <span class="suggest-price">94,000₫</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-md-2">
                <div class="news-panel theme-news-1">
                    <a class="img" href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">
                        <img class="img-lazy" src="https://media.static-adayroi.com/sys_master/images/h9d/hb5/14699795120158.jpg">
                        <div class="sale-rate">Giảm<span>50%</span></div>
                    </a>
                    <div class="title">
                        <a href="https://fado.vn/mua-sam-tai-fadovn-tra-gop-0-voi-city-bank.n1387/">Đồng hồ unisex Daniel Wellington DW00100171 mặt trắng viền vàng dây da nâu</a>
                    </div>
                    <div class="price">
                        <span class="money">47,000₫</span>
                        <span class="suggest-price">94,000₫</span>
                    </div>
                </div>
            </div>
        </div>
    <div class="block__footer clearfix">
        <a class="btn view-more-btn" href="<?=  Url::to(['promotion/index']);?>">XEM THÊM</a>
    </div>
    </div>
</section>