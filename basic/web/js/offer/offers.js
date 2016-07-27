$(function() {
  var home = $('div.wrap');


  home.find('div#new-offer').on('shown.bs.modal', function () {
    var form = home.find('form[name = "default-form"]');
    var block_reload = $(this).find('div.modal-body');
    block_reload.empty();
    block_reload.append('<div class="text-center"><i class = "fa fa-spinner fa-pulse fa-4x"></i></div>');
      $.post(
          '/rladmin/load-form-new-offer',
          form.serializeArray()
      ).done(function( data ) {
        block_reload.html(data);
        $.validate();
        
      }
      ).fail( function(xhr, textStatus, errorThrown) {
          alert(xhr.responseText);
          }
        );
        
  });

  home.find('div#new-offer').on('hidden.bs.modal', function () {
    var form = home.find('form[name = "default-form"]');
    var block_reload = $(this).find('div.modal-body');
    block_reload.empty();
    reloadListOffers();
        
  });

  home.on('submit', 'form[name = "new-offer"]',function( event ) {
      var block_reload = $(this).parents('div.modal-body').find('div[name = "block-modal-info"]');
      //change resolution date
      $.post(
          '/rladmin/save-new-offer',
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

  
  home.on('shown.bs.modal','div[id ^= "edit-offer-"]', function () {
    var form = home.find('form[name = "default-form"]');
    var offer = $(this).attr('offer');
    form.append('<input type="hidden" name="offer" value="'+offer+'">');
    var block_reload = $(this).find('div.modal-body');
    block_reload.empty();
    block_reload.append('<div class="text-center"><i class = "fa fa-spinner fa-pulse fa-4x"></i></div>');
      $.post(
          '/rladmin/load-form-edit-offer',
          form.serializeArray()
      ).done(function( data ) {
        block_reload.html(data);
        $.validate();
        
      }
      ).fail( function(xhr, textStatus, errorThrown) {
          alert(xhr.responseText);
          }
        );
        
  });


  home.on('hidden.bs.modal','div[id ^= "edit-offer-"]', function () {
    var form = home.find('form[name = "default-form"]');
    var block_reload = $(this).find('div.modal-body');
    block_reload.empty();
    reloadListOffers();
        
  });

  home.on('submit', 'form[name = "edit-offer"]',function( event ) {
      var block_reload = $(this).parents('div.modal-body').find('div[name = "block-modal-info"]');
      //change resolution date
      $.post(
          '/rladmin/save-offer',
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

  function reloadListOffers() {
    var form = home.find('form[name = "default-form"]');
    var block_reload = home.find('div[name = "list-offers"]');
    block_reload.empty();
    block_reload.append('<div class="text-center"><i class = "fa fa-spinner fa-pulse fa-4x"></i></div>');
      $.post(
          '/rladmin/reload-list-offer',
          form.serializeArray()
      ).done(function( data ) {
        block_reload.html(data);
        $.validate();
        
      }
      ).fail( function(xhr, textStatus, errorThrown) {
          alert(xhr.responseText);
          }
        );
  }
});