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

  home.on('shown.bs.modal','div[id ^= "load-image"]', function () {
    var form = home.find('form[name = "default-form"]');
    var offer = $(this).attr('offer');
    form.append('<input type="hidden" name="offer" value="'+offer+'">');
    var block_reload = $(this).find('div.modal-body');
    block_reload.empty();
    block_reload.append('<div class="text-center"><i class = "fa fa-spinner fa-pulse fa-4x"></i></div>');
      $.post(
          '/rladmin/load-form-edit-logo',
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

  home.on('change','input[name = "logo"]', function () {
    var input = this;
    if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                home.find('img[name = "preview-logo"]').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }        
  });

  home.on('submit', 'form[name = "load-logo"]',function( event ) {
      var block_reload = $(this).parents('div.modal-body').find('div[name = "block-modal-info"]');
      var files = event.currentTarget[2]['files'];
      var offer = $(this).find('input[name = "offer"]').val();
      handleFileUpload(files,offer, block_reload);
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

  function handleFileUpload(files,offer, block_reload)
  {   
      
      if (window.FormData === undefined) {
          console.log("FUCK");
      }
     for (var i = 0; i < files.length; i++) 
     {

          var fd = new FormData();

          fd.append('imageFiles', files[i]);
          fd.append('offer', offer);
       //   console.log(fd);
          //var status = new createStatusbar(obj); //Using this we can set progress.
          //status.setFileNameSize(files[i].name,files[i].size);
          sendFileToServer(fd,block_reload);
   
     }
     //console.log(fd);
  }

  function sendFileToServer(formData,block_reload)
  {   
      
      var uploadURL ="save-logo"; //Upload URL
      var extraData ={}; //Extra Data.
      var jqXHR=$.ajax({
              xhr: function() {
              var xhrobj = $.ajaxSettings.xhr();
              if (xhrobj.upload) {
                      xhrobj.upload.addEventListener('progress', function(event) {
                          var percent = 0;
                          var position = event.loaded || event.position;
                          var total = event.total;
                          if (event.lengthComputable) {
                              percent = Math.ceil(position / total * 100);
                          }
                          //console.log(percent);
                          //Set progress
                          //status.setProgress(percent);
                      }, false);
                  }
              return xhrobj;
          },
          url: uploadURL,
          type: "POST",
          contentType:false,
          processData: false,
          cache: false,
          data: formData,
          success: function(data){

              block_reload.html(data);
              
          }
      }); 
   
      //status.setAbort(jqXHR);
  }
});