$('#ajout').change(function(e) {
  e.preventDefault();

  var plateforme = $( "#console" ).val();

  if (plateforme === 'NES') {

    $('#boite_div').removeClass("hide");
    $('#boite_div').show();
    $('#notice_div').hide();

  } else if (plateforme === 'GAMECUBE') {

    $('#notice_div').removeClass("hide");
    $('#notice_div').show();
    $('#boite_div').hide();

    $('#boite').prop('checked', false);
  } else {

    $('#boite_div').hide();
    $('#notice_div').hide();

  }
});

// A FAIRE : une fonction "affiche(nomDeLElement)" et une fonction "cache(nomDeLElement)" ?
