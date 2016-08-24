$(function() {
    var home = $('body');

	home.on('submit', 'form[name = "subscribe"]',function( event ) {
        var form = $(this);
        var block_reload = home.find('div[name = "result-subcribe"]');
        //change resolution date
        $.post(
            '/site/subscribe',
            $(this).serializeArray()
        ).done(function( data ) {
                block_reload.html(data);
                if (block_reload.hasClass('alert-success')) {
                    form.find('input[name = "email"]').val('');
                }
                setTimeout(function(){
                  block_reload.empty();
                }, 2000);
                
            }
        ).fail( function(xhr, textStatus, errorThrown) {
              alert(xhr.responseText);
            }
        );
        event.preventDefault();
  });
});