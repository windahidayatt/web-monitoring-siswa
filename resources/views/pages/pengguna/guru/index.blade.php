@extends('layouts.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800">Guru</h1>
    <a href="/add-pengguna/guru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50" ></i> Tambah Guru</a>
    
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
    </div>
    <div class="card-body">
        @if (count($users) > 0)
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                        <tr>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Username</th>
                            <th scope="col" style="width: 20%;">Action</th>
                        </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Username</th>
                            <th scope="col" style="width: 20%;">Action</th>
                        </tr>
                </tfoot>
                  <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="col">{{ $user->nip }}</td>
                            <td scope="col">{{ $user->name }}</td>
                            <td scope="col">{{ $user->username }}</td>
                            <td scope="col" style="width: 20%;">
                                <a href="/guru/{{ $user->id }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm disabled"><i
                                    class="fas fa-eye fa-sm text-white-50"></i> View</a>
                                <a href="/edit-guru/{{ $user->id }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm disabled" ><i
                                    class="fas fa-edit fa-sm text-white-50" ></i> Edit</a>

                                <form id="delete-item-{{$user->id}}" action="/guru/{{ $user->id }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="deleteConfirm('delete-item-{{$user->id}}')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm disabled"><i
                                        class="fas fa-trash-alt fa-sm text-white-50"></i> Delete</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        @else
            <p>Tidak ada data guru.</p>
        @endif
    </div>
</div>
<script>
    deleteConfirm = function(formId)
    {
        Swal.fire({
            icon: 'warning',
            text: 'Anda yakin ingin menghapus guru ini?',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>
@endsection
