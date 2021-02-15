<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::select('jenis_kelamin', ['laki-laki', 'perempuan'],null, ['class' => 'form-control']) !!}
</div>

<!-- Name Positions Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_positions_id', 'Name Positions Id:') !!}
    {!! Form::select('name_positions_id', $namePosition, null, ['class' => 'form-control']) !!}
</div>

<!-- Sektors Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sektors_id', 'Sektors Id:') !!}
    {!! Form::select('sektors_id', $Sektor, null, ['class' => 'form-control']) !!}
</div>

<!-- Kotas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kotas_id', 'Kotas Id:') !!}
    {!! Form::select('kotas_id', $Kota, null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::select('users_id', $User, null, ['class' => 'form-control']) !!}
</div>