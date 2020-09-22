<!-- Clients Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clients_id', 'Clients Id:') !!}
    {!! Form::number('clients_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Typecomptes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typecomptes_id', 'Typecomptes Id:') !!}
    {!! Form::number('typecomptes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Compte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_compte', 'Num Compte:') !!}
    {!! Form::text('num_compte', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Cle Rip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cle_rip', 'Cle Rip:') !!}
    {!! Form::text('cle_rip', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Frais Ouverture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frais_ouverture', 'Frais Ouverture:') !!}
    {!! Form::number('frais_ouverture', null, ['class' => 'form-control']) !!}
</div>

<!-- Agio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agio', 'Agio:') !!}
    {!! Form::number('agio', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Ouverture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_ouverture', 'Date Ouverture:') !!}
    {!! Form::text('date_ouverture', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Fermuture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_fermuture', 'Date Fermuture:') !!}
    {!! Form::text('date_fermuture', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('comptes.index') }}" class="btn btn-default">Cancel</a>
</div>
