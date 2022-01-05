<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Alert;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function index()
    {
        if (!(Gate::allows('teacher'))) {
            abort(403);
        }

        $grades = DB::table('students')
            ->join('grades', 'students.id', '=', 'grades.student_id')->get();

        return view('pages/nilai/index', [
            "page_name" => "Daftar Nilai",
            "grades" => $grades
        ]);
    }

    public function show()
    {
        $user_id = Auth::user()->id;
        $student = Student::where('user_id', '=', $user_id)->first();

        $student_grades = Grade::where('student_id', '=', $student->id)->get();

        return view('pages/nilai/detail', [
            "page_name" => "Daftar Nilai Siswa",
            "student_grades" => $student_grades
        ]);
    }

    public function create()
    {
        if (!(Gate::allows('teacher'))) {
            abort(403);
        }

        $users = $this->listUsers();

        return view('pages/nilai/add', [
            "page_name" => "Tambah Nilai",
            "users" => $users
        ]);
    }


    public function store(Request $request)
    {
        if (!(Gate::allows('teacher'))) {
            abort(403);
        }

        $nis = explode("/ ", $request->name)[1];
        $student = Student::where('nis', '=', $nis)->first();

        $grade_obj = $request->except('_token');
        $grade_obj['student_id'] = $student->id;
        $grade =  Grade::create($grade_obj);

        if ($grade) {
            Alert::success('Berhasil!', 'Data Nilai telah ditambahkan!');

            return redirect('/nilai');
        }
    }

    public function listUsers()
    {
        $users = Student::all();
        $result = "";
        if (count($users) > 0) {
            $result = $users[0]->name . ' / ' . $users[0]->nis;
            unset($users[0]);
            foreach ($users as $user) {
                $result =  $result . "_" .  $user->name . ' / ' . $user->nis;
            }
            return $result;
        } else {
            return "";
        }
    }
}
