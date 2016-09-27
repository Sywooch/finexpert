$(function() {
  var menu = $('div.med-header');

  menu.on('click', 'div.btn-menu-xs i.i-menu-xs',function( event ) {
    menuShow('normal');
    social('close');
  });

  function menuShow(type) {
    var block_menu = menu.find('div.btn-menu-xs div.block-menu-xs');
    var i = menu.find('div.btn-menu-xs i.i-menu-xs');
    if (type === 'normal') {
      if (block_menu.css('display') === 'none') {
        
        $({deg: 0}).animate({deg: 90}, {
          duration: 500,
          step: function(now){
              i.css({
                   transform: "rotate(" + now + "deg)"
              });
          }
        });
        //$(this).find('i').css("transform","rotate(90deg)");
        block_menu.show('explode');
      }else{
          $({deg: 90}).animate({deg: 0}, {
            duration: 500,
            step: function(now){
                i.css({
                     transform: "rotate(" + now + "deg)"
                });
            }
          });
          block_menu.hide('explode');
      }  
    }else{
      if (block_menu.css('display') !== 'none') {
        $({deg: 90}).animate({deg: 0}, {
            duration: 500,
            step: function(now){
                i.css({
                     transform: "rotate(" + now + "deg)"
                });
            }
          });
         block_menu.hide('explode');
      }
    }
      
    
  }

  menu.on('click', 'div.btn-menu-xs a.sub-menu-xs',function( event ) {
    var block_menu = $(this).next('ul.sub-menu-xs');
    var a = $(this);
    if (block_menu.css('display') === 'none') {
        block_menu.show('explode');
        $({deg: 0}).animate({deg: 90}, {
          duration: 500,
          step: function(now){
              a.find('span.icon-item i').css({
                   transform: "rotate(" + now + "deg)"
              });
          }
        });
    }else{
        block_menu.hide('explode');
        $({deg: 90}).animate({deg: 0}, {
          duration: 500,
          step: function(now){
              a.find('span.icon-item i').css({
                   transform: "rotate(" + now + "deg)"
              });
          }
        });
    }
  });


  menu.on('click', 'div.btn-social-xs i.i-social-xs',function( event ) {
    social('normal'); 
    menuShow('close');   
  });

  function social(type) {
    var block_social = menu.find('div.btn-social-xs div.block-social-xs');
    var i = menu.find('div.btn-social-xs i.i-social-xs');
    if (type === 'normal') {
      if (block_social.css('display') === 'none') {
        
        $({deg: 0}).animate({deg: 45}, {
          duration: 500,
          step: function(now){
              i.css({
                   transform: "rotate(" + now + "deg)"
              });
          }
        });
        //$(this).find('i').css("transform","rotate(90deg)");
        block_social.show('explode');
      }else{
          $({deg: 45}).animate({deg: 0}, {
            duration: 500,
            step: function(now){
                i.css({
                     transform: "rotate(" + now + "deg)"
                });
            }
          });
          block_social.hide('explode');
      }  
    }else{
      if (block_social.css('display') !== 'none') {
        $({deg: 45}).animate({deg: 0}, {
            duration: 500,
            step: function(now){
                i.css({
                     transform: "rotate(" + now + "deg)"
                });
            }
          });
          block_social.hide('explode');
      }
        
    }

    
  }
});