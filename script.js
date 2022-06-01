$(function(){
  $('#connexion').hide();
  $('#mdpRecup').hide();
  $('.menuBurger').hide();

  /*CONNEXION*/
  $('.seConnecter').click(function (e) { 
    e.preventDefault();
    $('#connexion').fadeIn(700);
  });
  $('#connexion .croix').click(function() {
    $("#connexion").fadeOut(700);
  });
  $('#linkMdpRecup').click(function() {
    $("#connexion").fadeOut(700, function(){
      $('#mdpRecup').fadeIn(700)
    });
    
  });

  /* MDP OUBLIE*/
  $('#mdpRecup .croix').click(function() {
    $("#mdpRecup").fadeOut(700);
  });

  /* BURGER*/
  $('.burger').click(function () { 
    $('.menuBurger').fadeIn(1000);
    $('.menuBurger').addClass('menuBurgerVisible');
  });

  $('.menuBurger .croix').click(function() {
      $('.menuBurger').fadeOut(700,function() {
         $(".menuBurger").removeClass('menuBurgerVisible')});
      
  })
 


  /* BANNIERE */
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
     
    
    
    
