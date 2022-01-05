@extends('layouts.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800">Nilai</h1>
    
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai</h6>
    </div>
    <div class="card-body">
        @if (count($student_grades) > 0)
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                        <tr>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Nilai</th>
                        </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Nilai</th>
                        </tr>
                </tfoot>
                  <tbody>
                    @foreach ($student_grades as $grade)
                        <tr>
                            <td scope="col">{{ $grade->course }}</td>
                            <td scope="col">{{ $grade->grade }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        @else
            <p>Tidak ada data nilai.</p>
        @endif
    </div>
</div>
<script>
    deleteConfirm = function(formId)
    {
        Swal.fire({
            icon: 'warning',
            text: 'Anda yakin ingin menghapus nilai ini?',
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
