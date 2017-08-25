$(function(){
/*$("#search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "/search/search.php",
    data: dataString,
    cache: false,
    success: function(html)
    {


    $("header").append(html);

    }
    });
}return false;    
});

jQuery("#resultsearch").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#search').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#resultsearch").fadeOut(); 
    }
});
$('#search').click(function(){
    jQuery("#resultsearch").fadeIn();
});






*/

$( "#search" ).autocomplete({
    minLength: 1,
    source: function(request, response){
           $.ajax({
               type: "POST",
               url: "/search/search.php",
               data:{"term":request.term},
//               contentType: "application/json; charset=utf-8",
               dataType: "json",
               success: function (data) {
 response( $.map( data, function( item ) {
								return {
									name: item.name,
									id: item.id,
pic:item.pic
								}
							}));

},
               error: function (data) {
                //   alert(msg.status + ' ' + msg.statusText);
               }
           })
       },
    delay: 0,
open: function(){
        setTimeout(function () {
            $('.ui-autocomplete').css('z-index',9999);
        }, 0);
    },
    autofocus: true,
    focus: function(event, ui) {
        $( "#search" ).val( ui.item.name );
        return false;
        },
    select: function( event, ui ) {
        $( "#search" ).val( ui.item.name  );
window.location.href="../user-profile.php?id="+ui.item.id;        
return false;
        }    
    })
    .data( "ui-autocomplete")._renderItem = function( ul, item ) {
        var fb_pic_path = '<img class="img-circle" src="' + item.pic +'">' ;
if(!item.pic)
 var fb_pic_path = '<img class="img-circle" src="../images/avtar.png">';
        return $( "<li></li>" )
        .data( "item.autocomplete", item )
        .append(  fb_pic_path +"&nbsp;&nbsp;"+  item.name  )
        .appendTo( ul );
    };

//find
if($("#find").length!= 0) {
$( "#find" ).autocomplete({
    minLength: 1,
    source: function(request, response){
           $.ajax({
               type: "POST",
               url: "/search/message.php",
               data:{"term":request.term},
               dataType: "json",
               success: function (data) {
 response( $.map( data, function( item ) {
                                                                return {
                                                                        name: item.name,
                                                                        id: item.id,
pic:item.pic
                                                                }
                                                        }));
},
               error: function (data) {
               }
           })
       },
    delay: 0,
open: function(){
        setTimeout(function () {
            $('.ui-autocomplete').css('z-index',9999);
        }, 0);
    },
 autofocus: true,
    focus: function(event, ui) {
//        $( "#find" ).val( ui.item.name );
        return false;
        },
    select: function( event, ui ) {
        $( "#find" ).hide();//val( ui.item.name  );
//window.location.href="../user-profile.php?id="+ui.item.id;
if(!ui.item.pic)
ui.item.pic= '../images/avtar.png';
$( ".modal-body h5" ).append("<img src='"+ui.item.pic+"' class='img-circle' style='margin-right:5px;'>"); 
$( ".modal-body h5" ).append( ui.item.name  );
$( ".modal-body h5" ).attr("id",ui.item.id);
return false;
        }
    })
  .data( "ui-autocomplete")._renderItem = function( ul, item ) {
        var fb_pic_path = '<img class="img-circle" src="' + item.pic +'">' ;
if(!item.pic)
 var fb_pic_path = '<img class="img-circle" src="../images/avtar.png">';
        return $( "<li></li>" )
        .data( "item.autocomplete", item )
        .append(  fb_pic_path +"&nbsp;&nbsp;"+  item.name  )
        .appendTo( ul );
    };

}
});
