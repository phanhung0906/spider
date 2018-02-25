
var getSelectedPage = function () {
    var currentPage = document.querySelector('ul.ant-pagination li.ant-pagination-item-active');
    return parseInt(currentPage.textContent);
};

var getProducts = function () {
    var url = window.location.href;
    var arr = url.split("/");
    var result = arr[0];
    var block = document.querySelectorAll('.c1_t2i .c2prKC');
    var products = [];
    var productQuantity = block.length;

    for (var i = 0; i < productQuantity; i++) {
        var product = {};
        product['thumbnail'] = block[i].querySelector('.c2prKC img.c1ZEkM').getAttribute('src');
        product['url'] = result + block[i].querySelector('.cRjKsc a').getAttribute('href');

        products.push(product);
    }

    return products;
};

var getProductDetail = function () {
    var productDetail = {};
    var images = [];

    var productName = document.querySelector('#prod_title');
    productDetail['name'] = productName !== null ? productName.innerText : '';

    var brand = document.querySelector('#prod_brand .prod_header_brand_action a span');
    productDetail['brand'] = brand !== null ? brand.innerText : '';

    var summary = document.querySelector('#prod_content_wrapper .prod_content');
    productDetail['summary'] = summary !== null ? summary.innerHTML.replace(/\n/g, "").replace(/\t/g, "") : '';

    var oldPrice = document.querySelector('#price_box');
    productDetail['oldPrice'] = oldPrice !== null ? Number(oldPrice.innerText.replace(/\D/g, '')) : '';

    var newPrice = document.querySelector('#special_price_box');
    productDetail['newPrice'] = newPrice !== null ? Number(newPrice.innerText.replace(/\D/g, '')) : '';

    var imageBlock = document.querySelectorAll('.prd-moreImagesList li');
    var imageBlockQuantity = imageBlock.length;
    for(var block = 0; block < imageBlockQuantity; block++){
        var detailImageBlock = imageBlock[block].querySelectorAll('.ui-border');
        var imageQuantity = detailImageBlock.length;
            for (var i = 0; i < imageQuantity; i++) {
                var imageList = {};
                var imageInfo = detailImageBlock[i].querySelector('div');
                if(imageInfo != null){
                    imageList['origin'] = imageInfo.getAttribute('data-big');
                    imageList['responsive'] = imageInfo.getAttribute('data-swap-image');
                } else {
                    continue;
                }

                images.push(imageList);
            }
    }

    productDetail['image'] = images;

    var table = document.querySelector('table.specification-table tbody');
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

    var description = document.querySelector('#productDetails .product-description__block');
    productDetail['description'] = description !== null ? description.innerHTML.replace(/\n/g, "").replace(/\t/g, "") : '';

    var review = document.querySelector('.c-rating-total__text-rating-average em');
    productDetail['review'] = review !== null ? review.innerText : '';

    var review_quantity = document.querySelector('.c-rating-total__text-total-review');
    productDetail['review_quantity'] = review_quantity !== null ? review_quantity.innerText.replace(/(^\d+)(.+$)/i,'$1') : '';

    return productDetail;
};

var processPage = function () {
    casper.capture('1.png');
    var timeout = data.wait_second * 1000;
    casper.waitForSelector('.c1_t2i', function () {
        products = casper.evaluate(getProducts);
        utils.dump(products);

        casper.then(function () {
            this.each(products, function (self, product) {
                self.thenOpen(product.url, function () {
                    this.echo(product.url);
                    casper.waitForSelector('#prod_title', function () {
                        casper.echo('==================== Begin Page: ' + casper.getCurrentUrl() + ' ============================');
                        // Click xem thêm
                        casper.then(function () {
                            if (casper.exists('.product-description__block-expand-button')) {
                                this.click('.product-description__block-expand-button');
                            }
                        });
                        //End
                        casper.then(function () {
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
                        });

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
        if (casper.exists('ul.ant-pagination li.ant-pagination-item-active + li:not(.ant-pagination-disabled) a')) {
            casper.thenClick("ul.ant-pagination li.ant-pagination-item-active + li:not(.ant-pagination-disabled) a").then(function () {
                this.echo(this.getCurrentUrl());
                scroll();
            });

            casper.waitFor(function () {
                return currentPage === this.evaluate(getSelectedPage);
            }, processPage, allDone, timeout);
        } else {
            allDone();
        }
    })
};

exports.processPage = processPage;
