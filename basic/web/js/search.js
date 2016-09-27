$(function() {
	$('body').on('focus', 'div.block-search input[name = "serach"]',function( event ) {
        var form = $(this).parents('form[name = "serach"]');
        $(this).autocomplete({
            
            source: function( request, response ) {
                //console.log('test');
                $.ajax({
                    url: "/site/autocomplete-city",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function( data ) {
                        response($.map(data, function(item){
                          return{
                            label: item.label,
                            value: item.value,
                          }
                        }));
                    }
                });
            },
            
            minLength: 3,
            delay: 5,
            select: function( event, ui ) {
               window.location.href = "/city/"+ui.item.value 
            },
            open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" )
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            },

        });  

        //$(this).autocomplete( "search", "" );
    });
});