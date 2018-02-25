$(document).ready(function () {
    //Get smallest image height list product
    function setHeightActiveImage() {

        $(".product-block a>img").css('height', 'auto');
        var allDivs = $(".product-block a>img");
        var dvSmallest = allDivs.first().outerHeight();
        $(".product-block a>img").each(function () {
            if ($(this).outerHeight() < dvSmallest)
                dvSmallest = $(this).outerHeight();
        });

        $(".product-block a>img").css('height', dvSmallest + 'px');
    }

    setHeightActiveImage();

    $( window ).resize(function() {
        setHeightActiveImage();
    });

    // Filter product in title
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    function insertParam(key, value, oneValue = true)
    {
        key = encodeURIComponent(key);
        value = encodeURIComponent(value);

        var kvp = document.location.search.substr(1).split('&');

        var i=kvp.length;
        var x;
        while(i--)
        {
            x = kvp[i].split('=');

            if (x[0]==key)
            {
                if(oneValue){
                    x[1] = value;
                } else {
                    x[1] = x[1] + ',' + value;
                }
                kvp[i] = x.join('=');
                break;
            }
        }

        if(i<0) {kvp[kvp.length] = [key,value].join('=');}

        return location.protocol + '//' + location.host + location.pathname + '?' + kvp.join('&');
    }

    $('.filter-product select').on('change', function() {
        var attr = $('.filter-product').data('attr');
        var returnUrl = insertParam(attr, this.value, true);
        var deletePageParamUrl = removeURLParameter(returnUrl, "page");
        var newUrl =  removeURLParameter(deletePageParamUrl, "per-page");
        window.location.href = newUrl;
    });

    var filter_attr = $('.filter-product').data('attr');
    var filter = getUrlParameter(filter_attr);
    if(typeof(filter) != "undefined" && filter !== null) {
        $(".filter-selected").val(filter);
        $(".filter-product .select-option").removeClass("open");
    }
    // End filter in title

    //Filter by Price
    function removeURLParameter(url, parameter) {
        var urlparts= url.split('?');
        if (urlparts.length>=2) {
            var prefix= encodeURIComponent(parameter)+'=';
            var pars= urlparts[1].split(/[&;]/g);
            for (var i= pars.length; i-- > 0;) {
                //idiom for string.startsWith
                if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                    pars.splice(i, 1);
                }
            }
            url= urlparts[0]+'?'+pars.join('&');
            return url;
        } else {
            return url;
        }
    }

    function filterPrice() {
        var attr = $("#btnPriceRange").parents(".filter-panel").data("attr");
        var fromPrice = $("#fromPrice").val();
        var toPrice = $("#toPrice").val();
        if (fromPrice.match(/^\d+$/) || toPrice.match(/^\d+$/)) {
            var returnUrl = insertParam(attr, fromPrice + "-" + toPrice, true);
            var deletePageParamUrl = removeURLParameter(returnUrl, "page");
            var newUrl = removeURLParameter(deletePageParamUrl, "per-page");
            window.location.href = newUrl;
        }
    }

    $("#btnPriceRange").on("click", function(){
        filterPrice();
    });

    $('#formPriceRange input').keypress(function (e) {
        if (e.which == 13) {
            filterPrice();
            return false;
        }
    });

    $(".filter-panel").each(function() {
        var attr = $(this).data("attr");
        var valueAttr = getUrlParameter(attr);
        if (typeof(valueAttr) != "undefined" && valueAttr !== null) {
            if (attr == "prices") {
                var values = valueAttr.split("-");
                var fromPrice = values[0];
                var toPrice = values[1];
                $("#fromPrice").val(fromPrice);
                $("#toPrice").val(toPrice);
            } else {
                var value = valueAttr.split(',');
                var i = value.length;
                while(i--) {
                    $('.filter-panel[data-attr=' + attr+']').find('[data-value="_value_"]'.replace('_value_', value[i])).addClass("is-active");
                }
            }
            var html = $(".wrap-delete-attr").html();
            $('.filter-panel[data-attr=' + attr + ']').find('.remove-block').prepend(html);
        }

        $(".remove-block a").on('click', function () {
            var parameter = $(this).parents(".filter-panel").data("attr");
            var deletePageParamUrl = removeURLParameter(window.location.href, "page");
            var deletePerPageAndPageParamUrl = removeURLParameter(deletePageParamUrl, "per-page");
            var newUrl = removeURLParameter(deletePerPageAndPageParamUrl, parameter);
            window.location.href = newUrl;
        });
    })

    //Allow only number input
    $("#formPriceRange input").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    //End filter by Price

    // Filter by website name
    $(".filter-panel .filter-item:not('.is-active')").on('click', function() {
        var attr = $(this).parents(".filter-panel").data("attr");
        var value = $(this).data("value");
        var returnUrl = insertParam(attr, value, false);
        var deletePageParamUrl = removeURLParameter(returnUrl, "page");
        var newUrl =  removeURLParameter(deletePageParamUrl, "per-page");
        window.location.href = newUrl;
    });
    // End Filter by website name

    // Filter by review
    $(".filter-panel.review .filter-item:not('.is-active')").on('click', function() {
        var attr = $(this).parents(".filter-panel").data("attr");
        var value = $(this).data("value");
        var returnUrl = insertParam(attr, value, true);
        var deletePageParamUrl = removeURLParameter(returnUrl, "page");
        var newUrl =  removeURLParameter(deletePageParamUrl, "per-page");
        window.location.href = newUrl;
    });
    // End Filter by review

});