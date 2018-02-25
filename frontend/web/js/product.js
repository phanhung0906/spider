$(document).ready(function () {
    $('.preview-thumbnail .wrapper-image-list a').hover(function () {
        $(this).tab('show');
        $(".preview-thumbnail .wrapper-image-list").removeClass("active");
        $(this).parent('.wrapper-image-list').addClass('active');
    });

    $(".product-detail__specs img").each(function() {
        var attr = $(this).data("original");
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).attr("src", attr);
        }
    });
});