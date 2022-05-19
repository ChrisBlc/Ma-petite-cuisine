$(function(){
    $('.menuBurger').hide();
    $(window).scroll( function() {
      var value = $(this).scrollTop();
      if ( value > 400 ){
        $("header").addClass("smallHeader");
        $('body').css('margin-top', '400px');
      }
      else{
        $("header").removeClass("smallHeader");
        $('body').css('margin-top', 0);
      }
          
  });
});
