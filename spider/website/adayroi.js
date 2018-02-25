var require = patchRequire(require);

var getSelectedPage = function () {
    var currentPage = document.querySelector('ul.pagination li.active');
    return parseInt(currentPage.textContent);
};

var getProducts = function () {
    var url = window.location.href;
    var arr = url.split("/");
    var result = arr[0] + "//" + arr[2];
    var block = document.querySelectorAll('.product-list__wrapper .product-item__wrapper');
    var products = [];
    var productQuantity = block.length;

    for (var i = 0; i < productQuantity; i++) {
        var product = {};
        product['thumbnail'] = block[i].querySelector('.product-item__thumbnail img.default').getAttribute('data-original');
        product['url'] = result + block[i].querySelector('.product-item__info-title').getAttribute('href');

        products.push(product);
    }

    return products;
};

var getProductDetail = function () {
    var productDetail = {};
    var images = [];

    var productName = document.querySelector('.product-detail__info .product-detail__title h1');
    productDetail['name'] = productName !== null ? productName.innerText : '';

    var brand = document.querySelector('.product-detail__title .product-detail__title-top-brand');
    productDetail['brand'] = brand !== null ? brand.innerText : '';

    var summary = document.querySelector('.short-des__content');
    productDetail['summary'] = summary !== null ? summary.innerHTML.replace(/\n/g, "").replace(/\t/g, "") : '';

    var oldPrice = document.querySelector('.price-info__original');
    productDetail['oldPrice'] = oldPrice !== null ? Number(oldPrice.innerText.replace(/\D/g, '')) : '';

    var newPrice = document.querySelector('.price-info__sale');
    if(newPrice !== null) {
        productDetail['newPrice'] = Number(newPrice.innerText.replace(/\D/g, ''));
    } else {
        var specialPrice = document.querySelector('.price-info__super-sale b');
        productDetail['newPrice'] = specialPrice !== null ? Number(specialPrice.innerText.replace(/\D/g, '')) : '';
    }

    var originImageBlock = document.querySelectorAll('#modal-theatre-image .product-detail__theatre .theatre-image__content .swiper-wrapper .swiper-slide');
    var responsiveImageBlock = document.querySelectorAll('#modal-theatre-image .product-detail__theatre .theatre-image__list .swiper-wrapper .swiper-slide');
    var imageQuantity = originImageBlock.length;
    if (imageQuantity > 0) {
        for (var i = 0; i < imageQuantity; i++) {
            var imageList = {};
            var origin = originImageBlock[i].querySelector('img');
            if(origin != null){
                imageList['origin'] = origin.getAttribute('src');
            } else {
                continue;
            }

            var responsive = responsiveImageBlock[i].querySelector('img');
            if(responsive != null){
                imageList['responsive'] = responsive.getAttribute('src');
            } else {
                continue;
            }

            images.push(imageList);
        }
    }

    productDetail['image'] = images;

    var table = document.querySelector('#allClassificationAtrrModal .product-specs__table table tbody');
    var information_list = [];
    if (table !== null) {
        var row_num = table.rows.length;
        for (var j = 0; j < row_num; j++) {
            var information = {};
            information['title'] = table.rows[j].cells.item(0).innerHTML;
            information['value'] = table.rows[j].cells.item(1).innerHTML;
            information_list.push(information);
        }
    }

    productDetail['information'] = information_list;

    var description = document.querySelector('.detail__info .panel-body');
    productDetail['description'] = description !== null ? description.innerHTML.replace(/\n/g, "").replace(/\t/g, "") : '';

    return productDetail;
};

var processPage = function () {
    var timeout = data.wait_second * 1000;
    casper.waitForSelector('.product-list__wrapper .product-item__wrapper', function () {
        products = casper.evaluate(getProducts);
        utils.dump(products);

        casper.then(function () {
            this.each(products, function (self, product) {
                self.thenOpen(product.url, function () {
                    casper.waitForSelector('.product-detail__info.product-detail__info-block', function () {
                        casper.echo('==================== Begin Page: ' + casper.getCurrentUrl() + ' ============================');
                        productInfo = casper.evaluate(getProductDetail);
                        productInfo['data'] = data;
                        productInfo['original_url'] = casper.getCurrentUrl();
                        productInfo['thumbnail'] = product.thumbnail !== null ? product.thumbnail : '';
                        utils.dump(productInfo);

                        // Call API Add Product

                        jsonObject_fields = this.evaluate(function (save_api_url, productInfo) {
                            try {
                                return JSON.parse(__utils__.sendAJAX(save_api_url, 'POST', JSON.stringify(productInfo), false, {contentType: "application/json"}));
                            } catch (e) {
                                console.log("Error in fetching json object");
                            }
                        }, save_api_url, productInfo);

                        casper.wait(timeout, function () {
                            utils.dump(jsonObject_fields);
                            this.echo('==================== Response:' + jsonObject_fields + ' ===========================');
                            this.echo('=================== Wait ' + data.wait_second + 's ============================');
                        });
                    }, terminate, timeout);
                });

                casper.then(function () {
                    this.back();
                    this.echo('Back');
                });

                casper.then(function () {
                    this.echo('======================= Page:' + currentPage + ' - url:' + casper.getCurrentUrl() + ' ============================');
                });
            });
        });
    }, terminate);

    casper.then(function () {
        this.echo('===================== End Page: ' + currentPage + '/' + data.max_page + ' ==============================');
        if (++currentPage > data.max_page) {
            casper.echo('============ Max Page:' + data.max_page + '================');
            allDone();
        }
    });

    casper.then(function () {
        if (casper.exists('ul.pagination li.active + li a:not(.disabled)')) {
            casper.thenClick("ul.pagination li.active + li a:not(.disabled)").then(function () {
                this.echo(this.getCurrentUrl());
                this.waitFor(function () {
                    return currentPage === this.evaluate(getSelectedPage);
                }, processPage, allDone, timeout);
            });
        } else {
            allDone();
        }
    });
};

exports.processPage = processPage;
