@extends('layout.template')
<!-- START FORM -->
@section('konten')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-home"></i> Home
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Edit
      </li>
  </ol>
</nav>


<form action='{{ url('pasien/'. $data->id_pasien) }}' method='post'>
@csrf
@method('PUT')
  <div class="my-3 p-3 bg-body rounded shadow-sm ">
    <a href="{{ url('pasien') }}" class="btn btn-secondary"><< Kembali</a>
    <div class="col-12 col-md-7 mb-5">
      <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='nama' value="{{ $data->nama}}" id="nama">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='alamat' value="{{ $data->alamat }}" id="alamat">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="usia" class="col-sm-2 col-form-label">Usia</label>
          <div class="col-sm-10">
              <input type="number" class="form-control" name='usia' value="{{ $data->usia }}" id="usia">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select name="jk" id="jk" class="form-control" >
              <option value="{{ $data->jk }}">{{ $data->jk }}</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
      </div>
      <div class="mb-3 row">
          <label for="riwayat" class="col-sm-2 col-form-label">Riwayat Penyakit</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='riwayat' value="{{ $data->riwayat }}" id="riwayat">
          </div>
      </div>
      <div class="mb-3 row">
        <label for="poli" class="col-sm-2 col-form-label">Poli</label>
        <div class="col-sm-10">
          <select name="poli" id="poli" class="form-control" >
            <option value="{{ $data->poli }}">{{ $data->poli }}</option>
            <option value="Poli Umum">Poli Umum</option>
            <option value="Poli Gigi">Poli Gigi</option>
          </select>
        </div>
      <div class="mb-3 row" style="margin-top: 1rem">
        <label for="poli" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10"><button type="submit" class="btn btn-info" name="submit">SIMPAN</button></div>
      </div>    
    </div>
  </div>
</form>
<!-- AKHIR FORM -->    
@endsection

