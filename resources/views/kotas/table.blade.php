<div class="table-responsive">
    <table class="table" id="kotas-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kotas as $kota)
            <tr>
                <td>{{ $kota->nama }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['kotas.destroy', $kota->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kotas.show', [$kota->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('kotas.edit', [$kota->id]) }}" class='btn btn-default btn-xs'>
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
