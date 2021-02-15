<!-- Time In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_in', 'Time In:') !!}
    {!! Form::text('time_in', null, ['class' => 'form-control','id'=>'time_in']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#time_in').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Time Out Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_out', 'Time Out:') !!}
    {!! Form::text('time_out', null, ['class' => 'form-control','id'=>'time_out']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#time_out').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::number('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::number('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Karyawans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('karyawans_id', 'Karyawans Id:') !!}
    {!! Form::number('karyawans_id', null, ['class' => 'form-control']) !!}
</div>