<table id="example1" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$row->nama_siswa}}</td>
                <td>{{$row->jenis_kelamin}}</td>
            </tr>
        @endforeach
    </tbody>
</table>