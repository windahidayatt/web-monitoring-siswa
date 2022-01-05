<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        if (!(Gate::allows('administrator'))) {
            abort(403);
        }

        // $users = Teacher::all();

        $users = DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')->get();

        return view('pages/pengguna/guru/index', [
            "page_name" => "Daftar Guru",
            "users" => $users
        ]);
    }

    public function show()
    {
        if (!(Gate::allows('teacher'))) {
            abort(403);
        }

        $user_id = Auth::user()->id;
        $teacher =  DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->where('teachers.user_id', '=', $user_id)
            ->get()->first();

        return view('pages/pengguna/guru/detail', [
            "page_name" => "Detail Data Guru",
            "user" => $teacher
        ]);
    }

    public function create()
    {
        if (!(Gate::allows('administrator'))) {
            abort(403);
        }

        return view('pages/pengguna/guru/add', [
            "page_name" => "Tambah Guru"
        ]);
    }

    public function store(Request $request)
    {
        if (!(Gate::allows('administrator'))) {
            abort(403);
        }

        $user_obj['username'] = $request->username;
        $user_obj['password'] = Hash::make('guru123');
        $user_obj['role'] = 'teacher';
        $user =  User::create($user_obj);

        $teacher_obj = $request->except('_token', 'username');
        $teacher_obj['user_id'] = $user->id;
        $teacher =  Teacher::create($teacher_obj);


        if ($teacher) {
            Alert::success('Berhasil!', 'Data Guru telah ditambahkan!');

            return redirect('/pengguna/guru');
        }
    }
}
