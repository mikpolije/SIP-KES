<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;

class PoliController extends Controller
{
    private $title = 'UGD Sipkes | ';
    public function index()
    {
        try {
            $data['title'] = $this->title . 'Master Poli';

            $data['list'] = Poli::orderBy('id_poli', 'desc')
                ->get();

            return view('master.poli.index', compact('data'));
        } catch (Exception $e) {
            return $e;
        } catch (QueryException $e) {

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

        Poli::create($request->only('nama_poli'));

        return redirect()->route('poli.index')->with('success', 'Poli berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->nama_poli = $request->input('nama_poli');
        $poli->save();

        return redirect()->route('poli.index')->with('success', 'Data Poli berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect()->route('poli.index')->with('success', 'Poli berhasil dihapus.');
    }
}
