<div class="table-responsive">
    <table class="table" id="karyawans-table">
        <thead>
            <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Name Positions Id</th>
        <th>Sektors Id</th>
        <th>Kotas Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($karyawans as $karyawan)
            <tr>
            <td><img src= "{{ $karyawan->foto }}" height="70px" width="70px"></td>
            <td>{{ $karyawan->nama }}</td>
            <td>{{ $karyawan->alamat }}</td>
            <td>{{ $karyawan->jenis_kelamin }}</td>
            <td>{{ $karyawan->namePositions->nama }}</td>
            <td>{{ $karyawan->sektors->nama }}</td>
            <td>{{ $karyawan->kotas->nama }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['karyawans.destroy', $karyawan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('karyawans.show', [$karyawan->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('karyawans.edit', [$karyawan->id]) }}" class='btn btn-default btn-xs'>
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
