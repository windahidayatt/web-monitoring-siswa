<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Alert;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        if (!(Gate::allows('administrator'))) {
            abort(403);
        }

        // $users = Teacher::all();

        $users = DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')->get();

        return view('pages/pengguna/siswa/index', [
            "page_name" => "Daftar Siswa",
            "users" => $users
        ]);
    }

    public function show()
    {
        if (!(Gate::allows('student'))) {
            abort(403);
        }

        $user_id = Auth::user()->id;
        $student =  DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->where('students.user_id', '=', $user_id)
            ->get()->first();

        return view('pages/pengguna/siswa/detail', [
            "page_name" => "Detail Data Siswa",
            "user" => $student
        ]);
    }

    public function create()
    {
        if (!(Gate::allows('administrator'))) {
            abort(403);
        }

        return view('pages/pengguna/siswa/add', [
            "page_name" => "Tambah Siswa"
        ]);
    }

    public function store(Request $request)
    {
        if (!(Gate::allows('administrator'))) {
            abort(403);
        }

        $user_obj['username'] = $request->username;
        $user_obj['password'] = Hash::make('siswa123');
        $user_obj['role'] = 'student';
        $user =  User::create($user_obj);

        $student_obj = $request->except('_token', 'username');
        $student_obj['user_id'] = $user->id;
        $student =  Student::create($student_obj);


        if ($student) {
            Alert::success('Berhasil!', 'Data Siswa telah ditambahkan!');

            return redirect('/pengguna/siswa');
        }
    }
}
