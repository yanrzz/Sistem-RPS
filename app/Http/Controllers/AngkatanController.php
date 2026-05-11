<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angkatan;
use App\Models\Kurikulum;

class AngkatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Angkatan::with('kurikulum');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('tahun_angkatan', 'like', '%' . $search . '%')
                  ->orWhereHas('kurikulum', function($q2) use ($search) {
                      $q2->where('nama_kurikulum', 'like', '%' . $search . '%');
                  });
            });
        }

        $data = $query->get();
        return view('angkatan.index', compact('data', 'search'));
    }

    public function create()
    {
        $kurikulum = Kurikulum::all();
        return view('angkatan.create', compact('kurikulum'));
    }

    public function store(Request $request)
    {
        Angkatan::create($request->all());
        return redirect('/angkatan');
    }

    public function edit($id)
    {
        $data = Angkatan::findOrFail($id);
        $kurikulum = Kurikulum::all();
        return view('angkatan.edit', compact('data','kurikulum'));
    }

    public function update(Request $request, $id)
    {
        $data = Angkatan::findOrFail($id);
        $data->update($request->all());
        return redirect('/angkatan');
    }

    public function destroy($id)
    {
        Angkatan::destroy($id);
        return redirect('/angkatan');
    }
}