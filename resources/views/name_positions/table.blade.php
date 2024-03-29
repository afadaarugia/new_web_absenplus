<div class="table-responsive">
    <table class="table" id="namePositions-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Levels Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($namePositions as $namePosition)
            <tr>
                <td>{{ $namePosition->nama }}</td>
            <td>{{ $namePosition->levels_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['namePositions.destroy', $namePosition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('namePositions.show', [$namePosition->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('namePositions.edit', [$namePosition->id]) }}" class='btn btn-default btn-xs'>
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
