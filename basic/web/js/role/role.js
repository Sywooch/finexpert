$(function() {
  var home = $('div.wrap');

  home.on('submit', 'form[name = "create-role"]',function( event ) {
      var block_reload = home.find('div[name = "list-roles"]');
      //change resolution date
      $.post(
          '/rladmin/create-role',
          $(this).serializeArray()
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