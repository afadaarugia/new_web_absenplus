<div class="table-responsive">
    <table class="table" id="sektors-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Longitude</th>
        <th>Latitude</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sektors as $sektor)
            <tr>
                <td>{{ $sektor->nama }}</td>
            <td>{{ $sektor->longitude }}</td>
            <td>{{ $sektor->latitude }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sektors.destroy', $sektor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sektors.show', [$sektor->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sektors.edit', [$sektor->id]) }}" class='btn btn-default btn-xs'>
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
