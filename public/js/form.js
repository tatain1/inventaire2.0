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

// Fonction qui affiche ou non les bonnes checkbox en fonction de la valeur
// du Select
$('#console').change(function(e) {
  e.preventDefault();
  // Reinitialise les checkbox deja coché en cas de changement de valeur.
  var cases = $(".cases").find(':checkbox').prop("checked", false);

  var plateforme = $( "#console" ).val();

  if (plateforme === 'NES') {
    addElement('boite', 'notice', 'cale', 'fourreau');
    removeElement('jaquette');
  }
  else if (plateforme === 'SNES') {
    addElement('boite', 'notice', 'cale');
    removeElement('jaquette', 'fourreau');
  }
  else if (plateforme === 'N64') {
    addElement('boite', 'notice', 'cale');
    removeElement('jaquette', 'fourreau');
  }
  else if (plateforme === 'GAMECUBE') {
    addElement('boite', 'notice', 'jaquette');
    removeElement('cale', 'fourreau');
  }
  else if (plateforme === 'WII') {
    addElement('boite', 'notice', 'jaquette');
    removeElement('cale', 'fourreau');
  }
  else if (plateforme === 'WII-U') {
    addElement('boite', 'notice', 'jaquette');
    removeElement('cale', 'fourreau');
  }
  else {
    removeElement('jaquette', 'cale', 'boite', 'notice', 'fourreau');
  }
});
