$(document).ready(function() {
    $('.thumbnail').click(function(){
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({show:true});
    });
});

$.fn.googlemap = function() {

    var src = '';
    $(this).each(function () {
        var z = $(this);

        var address = jQuery.trim(z.attr('streetnumber'))
                + '+' + jQuery.trim(z.attr('streetname'))
                + '+' + jQuery.trim(z.attr('cityname'))
                + '+' + jQuery.trim(z.attr('statecode'))
                + '+' + jQuery.trim(z.attr('zipcode'))
            ;
        src = "https://maps.google.com/maps?"
            + "client=chrome"
            + "&q=" + address
            + "&oe=UTF-8&ie=UTF8&hq="
            + "&hnear=" + address
            + "&gl=es"
            + "&z=" + z.attr('zoom')
            + "&output=embed";
        z.html("<div class='google-map'><iframe  src='" + src + "' width=" + z.attr('width') + " height="
            + z.attr('height') + "></iframe></div>");
    });
    return src;

}
var url = $('#mymap').googlemap();
$('#mymap').parent().append("<a href='"+url+"'>enlarge map</a>");


