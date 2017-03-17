$('#ajout').change(function(e) {
  e.preventDefault();

  var plateforme = $( "#console" ).val();

  if (plateforme === 'NES') {

    $('#boite_div').removeClass("hide");
    $('#boite_div').show();
    $('#notice_div').removeClass("hide");
    $('#notice_div').show();
    $('#cale_div').removeClass("hide");
    $('#cale_div').show();
    $('#fourreau_div').removeClass("hide");
    $('#fourreau_div').show();

    $('#jaquette_div').hide();
    $('#jaquette').prop('checked', false);

  } else if (plateforme === 'GAMECUBE') {

    $('#boite_div').removeClass("hide");
    $('#boite_div').show();
    $('#notice_div').removeClass("hide");
    $('#notice_div').show();
    $('#jaquette_div').removeClass("hide");
    $('#jaquette_div').show();

    $('#cale_div').hide();
    $('#cale').prop('checked', false);
    $('#fourreau_div').hide();
    $('#fourreau').prop('checked', false);

  } else {

    $('#boite_div').hide();
    $('#notice_div').hide();

  }
});

// A FAIRE : une fonction "affiche(nomDeLElement)" et une fonction "cache(nomDeLElement)" ?
// fonction resetCheckbox();
