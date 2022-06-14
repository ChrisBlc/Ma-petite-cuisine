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

  /* AJOUT INPUT HIDDEN INGREDIENT et dans la liste */
  $('#ajoutIngredient').click(function (e) { 
    e.preventDefault();
    var liste, value, quantite;
    liste = document.getElementById("ingredients");
    value = liste.options[liste.selectedIndex].value;
    nom = liste.options[liste.selectedIndex].text;
    quantite = document.getElementById("quantite").value;
    $('.listeIngredient dt').append("<input type='hidden' name='ingredients["+'id'+"][]' value='"+value+"' />");
    $('.listeIngredient dt').append("<input type='hidden' name='ingredients["+'quantite'+"][]' value='"+quantite+"' />");
    $('.listeIngredient dt').append('<dd>' + quantite + ' ' + nom + '</dd>');
  });

  /*Suppression ingredient*/
  $('.supp').click(function (e) { 
    e.preventDefault();
    $(this).parent('.infoIngredient').remove();
  });

 /* AJOUT INPUT HIDDEN etapes et dans la liste */
 $('#ajouterEtape').click(function (e) { 
   e.preventDefault();
   $("<textarea name='etapes[]' placeholder='Etape: Rentrez vous instructions' rows='5' cols='180'></textarea>").insertBefore('#divetape');
 });

 /* Changement des quantité dans recette*/
  var  parts = 4;
  var oldparts = parts;
  $('#nbParts').text(parts +'personne(s)');
  $('#moins').click(function (e) { 
    e.preventDefault();
    if (parts==1){
      alert('Impossible de cuisiner pour personne')
    }
    else{
      oldparts = parts;
      parts -= 1;
    $('#nbParts').text(parts +'personne(s)');
    $('.qtt').each(function (indexInArray, valueOfElement) { 
      qtt = parseFloat($(valueOfElement).text())/oldparts;
      newQtt = Math.round(qtt * parts * 2)/2;
      $(valueOfElement).text(newQtt);
    });
    }
  });
  $('#plus').click(function (e) { 
    e.preventDefault();
      oldparts = parts;
      parts += 1;
    $('#nbParts').text(parts +'personne(s)');

    $('.qtt').each(function (indexInArray, valueOfElement) { 
      qtt = parseFloat($(valueOfElement).text())/oldparts;
      newQtt =Math.round(qtt * parts * 2)/2;
      $(valueOfElement).text(newQtt);
    });
  });
 
 
  
});


     
    
    
    
