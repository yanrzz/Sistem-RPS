<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Kurikulum;

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Prodi::query();

        if ($search) {
            $query->where('nama_prodi', 'like', '%' . $search . '%');
        }

        $data = $query->get();
        return view('prodi.index', compact('data', 'search'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        Prodi::create($request->all());
        return redirect('/prodi');
    }

    public function edit($id)
    {
        $data = Prodi::findOrFail($id);
        return view('prodi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Prodi::findOrFail($id);
        $data->update($request->all());
        return redirect('/prodi');
    }

    public function destroy($id)
    {
        Prodi::destroy($id);
        return redirect('/prodi');
    }
}