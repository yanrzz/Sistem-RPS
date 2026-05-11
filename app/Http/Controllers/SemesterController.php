<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Semester::query();

        if ($search) {
            $query->where('nama_semester', 'like', '%' . $search . '%');
        }

        $data = $query->get();
        return view('semester.index', compact('data', 'search'));
    }

    public function create()
    {
        return view('semester.create');
    }

    public function store(Request $request)
    {
        Semester::create([
            'nama_semester' => $request->nama_semester
        ]);

        return redirect('/semester');
    }

    public function edit($id)
    {
        $data = Semester::findOrFail($id);
        return view('semester.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Semester::findOrFail($id);
        $data->update([
            'nama_semester' => $request->nama_semester
        ]);

        return redirect('/semester');
    }

    public function destroy($id)
    {
        Semester::destroy($id);
        return redirect('/semester');
    }
}
