<div class="table-responsive">
    <table class="table" id="jams-table">
        <thead>
            <tr>
                <th>Masuk</th>
        <th>Pulang</th>
        <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jams as $jam)
            <tr>
                <td>{{ $jam->masuk }}</td>
            <td>{{ $jam->pulang }}</td>
            <td>{{ $jam->keterangan }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['jams.destroy', $jam->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jams.show', [$jam->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('jams.edit', [$jam->id]) }}" class='btn btn-default btn-xs'>
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
