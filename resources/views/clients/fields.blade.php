<!-- Typeclients Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typeclients_id', 'Typeclients Id:') !!}
    {!! Form::number('typeclients_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prenom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel', 'Tel:') !!}
    {!! Form::text('tel', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Profession Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profession', 'Profession:') !!}
    {!! Form::text('profession', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Salaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salaire', 'Salaire:') !!}
    {!! Form::number('salaire', null, ['class' => 'form-control']) !!}
</div>

<!-- Cni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cni', 'Cni:') !!}
    {!! Form::text('cni', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clients.index') }}" class="btn btn-default">Cancel</a>
</div>
