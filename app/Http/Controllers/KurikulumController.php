<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kurikulum;
use App\Models\Prodi;

class KurikulumController extends Controller
{
   public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Kurikulum::with('prodi');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_kurikulum', 'like', '%' . $search . '%')
                  ->orWhere('tahun', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%')
                  ->orWhereHas('prodi', function($q2) use ($search) {
                      $q2->where('nama_prodi', 'like', '%' . $search . '%');
                  });
            });
        }

        $data = $query->get();
        return view('kurikulum.index', compact('data', 'search'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('kurikulum.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        
        Kurikulum::create([
        'prodi_id' => $request->prodi_id,
        'nama_kurikulum' => $request->nama_kurikulum,
        'tahun' => $request->tahun,
        'status' => $request->status
    ]);

    return redirect('/kurikulum');
    }

    public function edit($id)
    {
        $data = Kurikulum::findOrFail($id);
        $prodi = Prodi::all();
        return view('kurikulum.edit', compact('data','prodi'));
    }

    public function update(Request $request, $id)
    {
        $data = Kurikulum::findOrFail($id);
        $data->update($request->all());
        return redirect('/kurikulum');
    }

    public function destroy($id)
    {
        Kurikulum::destroy($id);
        return redirect('/kurikulum');
    }
}