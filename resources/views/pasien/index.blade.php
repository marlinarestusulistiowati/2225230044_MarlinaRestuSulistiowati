@extends('layout.template')
<!-- START DATA -->
@section('konten')
<h2 style="margin: 2rem 0">Selamat datang di dashboard Admin</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-home"></i> Home
        </li>
    </ol>
</nav>

<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('pasien') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('pasien/create') }}' class="btn btn-info">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-1">Usia</th>
                    <th class="col-md-1">Jenis Kelamin</th>
                    <th class="col-md-2">Riwayat Penyakit</th>
                    <th class="col-md-1">Poli</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstitem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->usia }}</td>
                    <td>{{ $item->jk }}</td>
                    <td>{{ $item->riwayat }}</td>
                    <td>{{ $item->poli }}</td>
                    <td>
                        <a href='{{ url('pasien/'.$item->id_pasien.'/edit') }}' class="btn btn-outline-success btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin akan delete data?')" action="{{ url('pasien/'.$item->id_pasien) }}" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach

            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
