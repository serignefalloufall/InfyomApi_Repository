<!-- Clients Id Field -->
<div class="form-group">
    {!! Form::label('clients_id', 'Clients Id:') !!}
    <p>{{ $compte->clients_id }}</p>
</div>

<!-- Typecomptes Id Field -->
<div class="form-group">
    {!! Form::label('typecomptes_id', 'Typecomptes Id:') !!}
    <p>{{ $compte->typecomptes_id }}</p>
</div>

<!-- Num Compte Field -->
<div class="form-group">
    {!! Form::label('num_compte', 'Num Compte:') !!}
    <p>{{ $compte->num_compte }}</p>
</div>

<!-- Cle Rip Field -->
<div class="form-group">
    {!! Form::label('cle_rip', 'Cle Rip:') !!}
    <p>{{ $compte->cle_rip }}</p>
</div>

<!-- Frais Ouverture Field -->
<div class="form-group">
    {!! Form::label('frais_ouverture', 'Frais Ouverture:') !!}
    <p>{{ $compte->frais_ouverture }}</p>
</div>

<!-- Agio Field -->
<div class="form-group">
    {!! Form::label('agio', 'Agio:') !!}
    <p>{{ $compte->agio }}</p>
</div>

<!-- Date Ouverture Field -->
<div class="form-group">
    {!! Form::label('date_ouverture', 'Date Ouverture:') !!}
    <p>{{ $compte->date_ouverture }}</p>
</div>

<!-- Date Fermuture Field -->
<div class="form-group">
    {!! Form::label('date_fermuture', 'Date Fermuture:') !!}
    <p>{{ $compte->date_fermuture }}</p>
</div>

