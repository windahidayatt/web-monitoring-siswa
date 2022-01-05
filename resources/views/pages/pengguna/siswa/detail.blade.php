@extends('layouts.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800">Siswa</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil Saya</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0" >
                <tbody>
                <tr>
                    <th scope="col" style="width: 45%;">Nomor Induk Sekolah</th>
                    <td scope="col" colspan="3">{{ $user->nis }}</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 45%;">Nama Lengkap</th>
                    <td scope="col" colspan="3">{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="col" style="width: 45%;">Username</th>
                    <td scope="col" colspan="3">{{ $user->username }}</td>
                </tr>
            </tbody>
            </table>

        </div> 
    </div>
</div>
@endsection