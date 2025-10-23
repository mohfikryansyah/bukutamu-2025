<table>
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Instansi</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengunjung as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->pengunjung->nama }}</td>
                <td>{{ $data->pengunjung->email }}</td>
                <td>{{ $data->pengunjung->instansi }}</td>
                <td>{{ $data->pengunjung->alamat }}</td>
                <td>{{ $data->pengunjung->hp }}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>