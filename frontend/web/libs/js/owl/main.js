$(document).ready(function(){
    $('#viewDefault .product-slide').owlCarousel({
        nav:true,
        navText: ['<i class="fas fa-angle-left" aria-hidden="true"></i>','<i class="fas fa-angle-right" aria-hidden="true"></i>'],
        loop:false,
        slideSpeed : 3000,
        paginationSpeed : 3000,
        singleItem:true,
        items:7,
        margin:20,
        autoplay:true,
        lazyLoad: true,
        autoplayTimeout:10000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive : {
            0 : {
                items: 2
            },
            768 : {
                items: 3
            },
            960 : {
                items: 4
            },
            1200 : {
                items: 5
            },
            1920 : {
                items: 6
            }
        }
    });

    $('.preview-thumbnail').owlCarousel({
        loop:false,
        nav:true,
        navText: ['<i class="fas fa-angle-left" aria-hidden="true"></i>','<i class="fas fa-angle-right" aria-hidden="true"></i>'],
        slideSpeed : 3000,
        paginationSpeed : 3000,
        singleItem:true,
        lazyLoad: true,
        items:3,
        margin:5,
        responsiveClass:true,
        responsive : {
            0 : {
                items: 3
            },
            768 : {
                items: 4
            },
            960 : {
                items: 5
            },
            1200 : {
                items: 5
            },
            1920 : {
                items: 5
            }
        }
    });
});
