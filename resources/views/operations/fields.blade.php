<!-- Typeoperations Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typeoperations_id', 'Typeoperations Id:') !!}
    {!! Form::number('typeoperations_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Comptes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comptes_id', 'Comptes Id:') !!}
    {!! Form::number('comptes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant', 'Montant:') !!}
    {!! Form::number('montant', null, ['class' => 'form-control']) !!}
</div>

<!-- Dateoperation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateoperation', 'Dateoperation:') !!}
    {!! Form::text('dateoperation', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operations.index') }}" class="btn btn-default">Cancel</a>
</div>
