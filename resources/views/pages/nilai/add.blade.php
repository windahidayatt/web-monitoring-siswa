@extends('layouts.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800">Nilai</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Nilai</h6>
    </div>
    <div class="card-body">
        <form action="/nilai" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
                <label for="name">Nama Siswa</label>
                <input type="text" class="form-control" name="name" id="name">
            </div> --}}

            <div class="form-group">
                <input type="text" class="form-control" name="users" id="users" value="{{ $users }}" hidden>
            </div>
            <div class="form-group">
                <label for="name">Nama Siswa</label>
                <div class="input-group mb-3">
                    <input class="form-control autocomplete" autocomplete="off" id="name" name="name" placeholder="Cari..." type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="course">Mata Pelajaran</label>
                <input type="text" class="form-control" name="course" id="course">
            </div>

            <div class="form-group">
                <label for="grade">Nilai</label>
                <input type="text" class="form-control" name="grade" id="grade">
            </div>
            <button type="submit" class="btn btn-primary mt-4 btn-block">Tambah</button>
        </form>
    </div>
</div>
@endsection
