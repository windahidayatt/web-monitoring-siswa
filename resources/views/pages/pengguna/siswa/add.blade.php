@extends('layouts.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800">Siswa</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6>
    </div>
    <div class="card-body">
        <form action="/pengguna/siswa" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="nis">Nomor Induk Sekolah</label>
                <input type="text" class="form-control" name="nis" id="nis">
            </div>

            <div class="form-group">
                <label for="username">Username (untuk login ke aplikasi)</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <p>*Catatan: Semua password default untuk siswa adalah siswa123</p>
            <button type="submit" class="btn btn-primary mt-4 btn-block">Tambah</button>
        </form>
    </div>
</div>
@endsection
