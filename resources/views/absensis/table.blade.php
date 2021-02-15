<div class="table-responsive">
    <table class="table" id="absensis-table">
        <thead>
            <tr>
                <th>Time In</th>
        <th>Time Out</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Keterangan</th>
        <th>Karyawans Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($absensis as $absensi)
            <tr>
                <td>{{ $absensi->time_in }}</td>
            <td>{{ $absensi->time_out }}</td>
            <td>{{ $absensi->longitude }}</td>
            <td>{{ $absensi->latitude }}</td>
            <td>{{ $absensi->keterangan }}</td>
            <td>{{ $absensi->karyawans_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['absensis.destroy', $absensi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('absensis.show', [$absensi->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('absensis.edit', [$absensi->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
