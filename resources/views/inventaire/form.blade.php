<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
    {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
</div>
<!-- A FAIRE : placeholder / modifier couleur -->
<!-- A FAIRE : formulaire dynamique en JS -->
<div class="form-group {!! $errors->has('console') ? 'has-error' : '' !!}">
    {!! Form::select('console', array(
      '' => '----Console----',
      'NES' => 'NES',
      'SNES' => 'SNES',
      'N64' => 'Nintendo 64',
      'GAMECUBE' => 'GameCube',
      'WII' => 'Wii',
      'WII-U' => 'Wii U'
    ), null, ['class' => 'form-control', 'id' => 'console']) !!}
    {!! $errors->first('console', '<small class="help-block">:message</small>') !!}
</div>
<div class="form-group {!! $errors->has('note') ? 'has-error' : '' !!}">
    {!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 'Note']) !!}
    {!! $errors->first('note', '<small class="help-block">:message</small>') !!}
</div>

<div class="form-group cases">
  <div id="boite_div" class="checkbox hide">
    <label>
      {!! Form::checkbox('boite', 1, null, ['id' => 'boite', 'class' => 'case']) !!} Boite
    </label>
  </div>

  <div id="notice_div" class="checkbox hide">
    <label>
      {!! Form::checkbox('notice', 1, null, ['id' => 'notice', 'class' => 'case']) !!} Notice
    </label>
  </div>

  <div id="jaquette_div" class="checkbox hide">
    <label>
      {!! Form::checkbox('jaquette', 1, null, ['id' => 'jaquette', 'class' => 'case']) !!} Jaquette
    </label>
  </div>

  <div id="cale_div" class="checkbox hide">
    <label>
      {!! Form::checkbox('cale', 1, null, ['id' => 'cale', 'class' => 'case']) !!} Cale
    </label>
  </div>

  <div id="fourreau_div" class="checkbox hide">
    <label>
      {!! Form::checkbox('fourreau', 1, null, ['id' => 'fourreau', 'class' => 'case']) !!} Fourreau
    </label>
  </div>

</div>
