$(document).ready(function(){
    var markersArray = [];
    var map;
    function clearOverlays() {
        for (var i = 0; i < markersArray.length; i++ ) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }

    function initialize() {
        var mapOptions = {
            zoom: 14,
            center: new google.maps.LatLng(48.620800000000000000,22.287882999999965000)  // Uzhorod
        };
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);

        google.maps.event.addListener(map, 'click', function(e) {
            clearOverlays();
            placeMarker(e.latLng, map);

            var lat = e.latLng.k;
            var lng = e.latLng.B;
            $('#lat').val(lat);
            $('#lng').val(lng);

        });
    }

    function placeMarker(position, map) {
        var marker = new google.maps.Marker({
            position: position,
            map: map
        });
        markersArray.push(marker);
        map.panTo(position);
    }

    if ( $('#map').size() > 0 ) {
        google.maps.event.addDomListener(window, 'load', initialize);
    }

    $('input[name="datetime"]').datetimepicker({
        format:'Y-m-d H:i',
        maxDate:0 // now
    });

    $('input[name="address"]').geocomplete({location : $('input[name="address"]').val()})
        .bind("geocode:result", function(event, result){
            clearOverlays();
            placeMarker(result.geometry.location,map);
        });

    $('.well-lg th .cls').click(function(){
        var close_cross = $(this);
        close_cross.prev().prev().val('');
        close_cross.prev().removeClass('ins').attr('src','');
        close_cross.parent().hide();
    });

    $('#f-updl').uploadifive({
        'buttonText' : 'Загрузити фото',
        'uploadScript' : '/uploadifive.php',
        'onUploadComplete' : function(file, data) {
            if ( $('.img-prod-img.ins').size() < 6 ) {
                var cur_img = $('.img-prod-img').not('.ins').eq(0);
                cur_img.attr("src", '/uploads/temp/'+file.name);
                cur_img.attr("width",parseInt(100)+10);
                cur_img.attr("height",parseInt(100)+10);
                cur_img.css("height" , parseInt(100)+10 );
                cur_img.addClass('ins');
                cur_img.prev().val('/uploads/temp/'+file.name);
                cur_img.parent().show();
            }
        }
    });

    $('.img-link').click(function(e){
        e.preventDefault();

        var img = $(this).find('img');
        $('.main-img').attr('src',img.attr('src').replace('mini_','big_'));
        $('.main-img').parent().attr('href',img.attr('src').replace('mini_',''));
    });
    $('.fancy').fancybox();
});

$(document).on('click','.reply',function(e){
    e.preventDefault();
    var comment_id = $(this).parent().data('com_id');
    var clone_form = $('.well-form').clone();
    $('.well-form').html('').hide();
    clone_form.find('.reply_id').val(comment_id);

    $(this).parent().append(clone_form.html())
});

$(document).on('click','#comment-form button[type="submit"]',function(e){
    e.preventDefault();
    var form = $('#comment-form');
    form.ajaxSubmit({
        beforeSubmit:function () {
//                    $.fancybox.showLoading();
        },
        success:function (responce) {
            $('.comments-list').html(responce);
            form.resetForm();
            if ( !form.parent().hasClass('well-form') ) {
                form.find('.reply_id').val(0);
                $('.well-form').html(form).show()
            }
        }
    });
});