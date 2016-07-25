$(function() {
  var home = $('div.wrap');

  home.on('change', 'input[name = "roles[]"]',function( event ) {
      
      var block_reload = home.find('div[name = "block-info"]');
      var form = $(this).parents('form[name = "assign-role"]');
      //change resolution date
      $.post(
          '/rladmin/assign-role',
          form.serializeArray()
      ).done(function( data ) {
        block_reload.html(data);
        
      }
      ).fail( function(xhr, textStatus, errorThrown) {
          alert(xhr.responseText);
          }
        );
        event.preventDefault();
  });
});