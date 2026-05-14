<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Angkatan;
use App\Models\Kurikulum;
use App\Models\Prodi;
use App\Models\Semester;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $kurikulum_id = $request->query('kurikulum');

        $query = Matakuliah::with(['angkatan.kurikulum.prodi', 'semester']);
        $kurikulums = Kurikulum::with('prodi')->get();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('kode_mk', 'like', '%' . $search . '%')
                  ->orWhere('nama_mk', 'like', '%' . $search . '%')
                  ->orWhere('sks', 'like', '%' . $search . '%')
                  ->orWhere('jenis_mk', 'like', '%' . $search . '%')
                  ->orWhereHas('semester', function($q2) use ($search) {
                      $q2->where('nama_semester', 'like', '%' . $search . '%');
                  })
                  ->orWhereHas('angkatan', function($q2) use ($search) {
                      $q2->where('tahun_angkatan', 'like', '%' . $search . '%')
                         ->orWhereHas('kurikulum', function($q3) use ($search) {
                             $q3->where('nama_kurikulum', 'like', '%' . $search . '%')
                                ->orWhereHas('prodi', function($q4) use ($search) {
                                    $q4->where('nama_prodi', 'like', '%' . $search . '%');
                                });
                         });
                  });
            });
        } else {
            if (!$kurikulum_id && $kurikulums->count() > 0) {
                $kurikulum_id = $kurikulums->first()->id;
            }

            if ($kurikulum_id) {
                $query->whereHas('angkatan', function($q) use ($kurikulum_id) {
                    $q->where('kurikulum_id', $kurikulum_id);
                });
            }
        }

        $data = $query->paginate(20)->withQueryString();
        return view('matakuliah.index', compact('data', 'search', 'kurikulums', 'kurikulum_id'));
    }

    public function create()
    {
        $angkatan = Angkatan::with('kurikulum.prodi')->get();
        $semesters = Semester::all();
        return view('matakuliah.create', compact('angkatan', 'semesters'));
    }

    public function store(Request $request)
    {
        Matakuliah::create([
            'angkatan_id' => $request->angkatan_id,
            'semester_id' => $request->semester_id,
            'jenis_mk' => $request->jenis_mk ?? 'wajib',
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'link_rps' => $request->link_rps
        ]);

        return redirect('/matakuliah');
    }

    public function edit($id)
    {
        $data = Matakuliah::findOrFail($id);
        $angkatan = Angkatan::with('kurikulum.prodi')->get();
        $semesters = Semester::all();
        return view('matakuliah.edit', compact('data','angkatan', 'semesters'));
    }

    public function update(Request $request, $id)
    {
        $data = Matakuliah::findOrFail($id);

        $data->update([
            'angkatan_id' => $request->angkatan_id,
            'semester_id' => $request->semester_id,
            'jenis_mk' => $request->jenis_mk ?? 'wajib',
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'link_rps' => $request->link_rps
        ]);

        return redirect('/matakuliah');
    }

    public function destroy($id)
    {
        Matakuliah::destroy($id);
        return redirect('/matakuliah');
    }

    public function public()
    {
        $prodis = Prodi::all();
        $data = Matakuliah::with(['angkatan.kurikulum.prodi', 'semester'])->get();
        
        $prodiData = [];
        
        // Initialize arrays for all Prodis so tabs always show up even if empty
        foreach ($prodis as $prodi) {
            $prodiData[$prodi->nama_prodi] = [];
        }
        
        // Group data
        foreach ($data as $item) {
            $prodiName = $item->angkatan->kurikulum->prodi->nama_prodi ?? 'Lainnya';
            $kurikulumName = $item->angkatan->kurikulum->nama_kurikulum ?? 'Kurikulum Default';
            $semesterName = $item->semester ? $item->semester->nama_semester : 'Tanpa Semester';
            $jenisMk = $item->jenis_mk ?? 'wajib';
            
            if (!isset($prodiData[$prodiName])) {
                $prodiData[$prodiName] = [];
            }
            if (!isset($prodiData[$prodiName][$kurikulumName])) {
                $prodiData[$prodiName][$kurikulumName] = [
                    'wajib' => [],
                    'peminatan' => []
                ];
            }
            
            if ($jenisMk == 'peminatan') {
                $prodiData[$prodiName][$kurikulumName]['peminatan'][] = $item;
            } else {
                if (!isset($prodiData[$prodiName][$kurikulumName]['wajib'][$semesterName])) {
                    $prodiData[$prodiName][$kurikulumName]['wajib'][$semesterName] = [];
                }
                $prodiData[$prodiName][$kurikulumName]['wajib'][$semesterName][] = $item;
            }
        }

        return view('rps', compact('prodiData', 'prodis'));
    }
}