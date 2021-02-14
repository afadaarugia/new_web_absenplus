<div class="table-responsive">
    <table class="table" id="fotoRecognitions-table">
        <thead>
            <tr>
                <th>Foto</th>
        <th>Users Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fotoRecognitions as $fotoRecognitions)
            <tr>
                <td>{{ $fotoRecognitions->foto }}</td>
            <td>{{ $fotoRecognitions->users_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['fotoRecognitions.destroy', $fotoRecognitions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fotoRecognitions.show', [$fotoRecognitions->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('fotoRecognitions.edit', [$fotoRecognitions->id]) }}" class='btn btn-default btn-xs'>
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
