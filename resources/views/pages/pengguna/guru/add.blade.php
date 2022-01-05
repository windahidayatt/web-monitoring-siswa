@extends('layouts.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800">Guru</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Guru</h6>
    </div>
    <div class="card-body">
        <form action="/pengguna/guru" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="nip">Nomor Identitas Pegawai Negeri Sipil</label>
                <input type="text" class="form-control" name="nip" id="nip">
            </div>

            <div class="form-group">
                <label for="username">Username (untuk login ke aplikasi)</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <p>*Catatan: Semua password default untuk guru adalah guru123</p>
            <button type="submit" class="btn btn-primary mt-4 btn-block">Tambah</button>
        </form>
    </div>
</div>
@endsection
