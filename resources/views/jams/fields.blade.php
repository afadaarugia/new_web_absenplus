<!-- Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masuk', 'Masuk:') !!}
    {!! Form::text('masuk', null, ['class' => 'form-control','id'=>'masuk']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#masuk').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Pulang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pulang', 'Pulang:') !!}
    {!! Form::text('pulang', null, ['class' => 'form-control','id'=>'pulang']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#pulang').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>