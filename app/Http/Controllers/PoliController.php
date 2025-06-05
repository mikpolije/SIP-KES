<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;

class PoliController extends Controller
{
    private $title = 'UGD Sipkes | ';

    public function index()
    {
        try {
            $data['title'] = $this->title . 'Master Poli';

            $data['list'] = DB::table('poli')
                ->orderBy('id_poli', 'desc')
                ->get();

            return view('master.poli.index', compact('data'));
        } catch (Exception $e) {
            return $e;
        } catch (QueryException $e) {
            return $e;
        }
    }

    public function create()
    {
        $data['title'] = $this->title . 'Add Poli';

        return view('master.poli.add', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
        ]);

        DB::table('poli')->insert([
            'nama_poli' => $request->nama_poli,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('poli.index')->with('success', 'Poli berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
        ]);

        DB::table('poli')->where('id_poli', $id)->update([
            'nama_poli' => $request->input('nama_poli'),
            'updated_at' => now(),
        ]);

        return redirect()->route('poli.index')->with('success', 'Data Poli berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('poli')->where('id_poli', $id)->delete();

        return redirect()->route('poli.index')->with('success', 'Poli berhasil dihapus.');
    }
}