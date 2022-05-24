$(function(){

  
    $('.burger').click(function () { 
      $('.menuBurger').addClass('menuBurgerVisible');
    });

    $('.croix').click(function() {
        $(".menuBurger").removeClass('menuBurgerVisible');
    })


    
    $(document).ready(function(){
      if($(window).width() > 670) {
        $(window).scroll( function() {
            var position = $(this).scrollTop();
            if ( position > 400 ){
              $("header").addClass("smallHeader");
              $('body').css('margin-top', '400px');
            }
            else{
              $("header").removeClass("smallHeader");
              $('body').css('margin-top', 0);
            }
        })
      } 
      else{
        $("header").addClass("smallHeader");
      }
    });
});
     
    
    
    
