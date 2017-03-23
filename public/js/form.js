function addElement(/* any number of arguments */) {
  var args = Array.prototype.slice.call(arguments);
  // or [].slice.call(arguments)

  args.forEach(function(arg) {
    $('#'+ arg +'_div').removeClass("hide");
    $('#'+ arg +'_div').show();
  });
};

function removeElement(/* any number of arguments */) {
  var args = Array.prototype.slice.call(arguments);
  // or [].slice.call(arguments)

  args.forEach(function(arg) {
    $('#'+ arg +'_div').hide();
    $('#'+ arg +'').prop('checked', false);
  });
};

$('#ajout').change(function(e) {
  e.preventDefault();

  var plateforme = $( "#console" ).val();

  if (plateforme === 'NES') {

    addElement('boite', 'notice', 'cale', 'fourreau');
    removeElement('jaquette');

  } else if (plateforme === 'SNES') {

    addElement('boite', 'notice', 'cale', 'fourreau');
    removeElement('jaquette');

  } else if (plateforme === 'N64') {

    addElement('boite', 'notice', 'cale', 'fourreau');
    removeElement('jaquette');

  } else if (plateforme === 'GAMECUBE') {

    addElement('boite', 'notice', 'jaquette');
    removeElement('cale', 'fourreau');

  } else if (plateforme === 'WII') {

    addElement('boite', 'notice', 'jaquette');
    removeElement('cale', 'fourreau');

  } else {

    removeElement('jaquette', 'cale', 'boite', 'notice', 'fourreau');

  }
});

// A FAIRE : une fonction "affiche(nomDeLElement)" et une fonction "cache(nomDeLElement)" ?
// fonction resetCheckbox();
