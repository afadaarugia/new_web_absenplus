<div class="table-responsive">
    <table class="table" id="tmpImages-table">
        <thead>
            <tr>
                <th>Image</th>
        <th>Users Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tmpImages as $tmpImage)
            <tr>
                <td>{{ $tmpImage->image }}</td>
            <td>{{ $tmpImage->users_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tmpImages.destroy', $tmpImage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tmpImages.show', [$tmpImage->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tmpImages.edit', [$tmpImage->id]) }}" class='btn btn-default btn-xs'>
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
