jQuery(document).ready(function() {
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    var q = getUrlParameter('q');
    if(q == '' || q === undefined || q == null){
        // do nothing
    } else {
        $('#pkeywords').val(q.replace(/\+/g, " "));
    }

    $('#searchFormTop').on('keyup keypress', function(e) {
        var searchText = $('#pkeywords').val();
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13 && searchText == '') {
            e.preventDefault();
            return false;
        }
    });

    $('.ico-search').click(function(){
        var searchText = $('#pkeywords').val();
        if (searchText != '') {
            $('#searchFormTop').submit();
        }
    });
});