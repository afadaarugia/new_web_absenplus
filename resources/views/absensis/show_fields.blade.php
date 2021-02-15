<!-- Time In Field -->
<div class="col-sm-12">
    {!! Form::label('time_in', 'Time In:') !!}
    <p>{{ $absensi->time_in }}</p>
</div>

<!-- Time Out Field -->
<div class="col-sm-12">
    {!! Form::label('time_out', 'Time Out:') !!}
    <p>{{ $absensi->time_out }}</p>
</div>

<!-- Longitude Field -->
<div class="col-sm-12">
    {!! Form::label('longitude', 'Longitude:') !!}
    <p>{{ $absensi->longitude }}</p>
</div>

<!-- Latitude Field -->
<div class="col-sm-12">
    {!! Form::label('latitude', 'Latitude:') !!}
    <p>{{ $absensi->latitude }}</p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $absensi->keterangan }}</p>
</div>

<!-- Karyawans Id Field -->
<div class="col-sm-12">
    {!! Form::label('karyawans_id', 'Karyawans Id:') !!}
    <p>{{ $absensi->karyawans_id }}</p>
</div>

