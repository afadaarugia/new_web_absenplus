<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Levels Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('levels_id', 'Levels Id:') !!}
    {!! Form::select('levels_id', $Level, null, ['class' => 'form-control']) !!}
</div>