<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class LayananController extends Controller
{
    private $title = 'UGD Sipkes | ';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['title'] = $this->title . 'Master Layanan';
            
            $data['list'] = Layanan::orderBy('id', 'desc')
                ->get();
            
            return view('master.layanan.index', compact('data'));
        } catch (Exception $e) {
            return $e;
        } catch (QueryException $e) {

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title . 'Add Layanan';
        return view('master.layanan.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nama' => 'required',
                'tarif' => 'required'
            ], [
                'nama.required' => 'Nama harus diisi.',
                'tarif.required' => 'Tarif harus diisi.'
            ]);

            Layanan::create([
                    'nama_layanan' => $request->nama,
                    'tarif_layanan' => $request->tarif
                ]);
            DB::commit();

            return redirect()->route('layanan.index')->with('success', 'Berhasil menambahkan data layanan baru.');
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = $this->title . ' | Edit Layanan';
        $data['layanan'] = DB::table('layanan')
            ->where('id_layanan', $id)
            ->first();
        if (!$data['layanan']) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('master.layanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nama' => 'required',
                'tarif' => 'required'
            ], [
                'nama.required' => 'Nama harus diisi.',
                'tarif.required' => 'Tarif harus diisi.'
            ]);

            Layanan::where('id', $id)
                ->update([
                    'nama_layanan' => $request->nama,
                    'tarif_layanan' => $request->tarif
                ]);
            DB::commit();

            return redirect()->route('layanan.index')->with('success', 'Berhasil mengubah data layanan.');
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            Layanan::where('id', $id)
                ->delete();
            DB::commit();

            return redirect()->route('layanan.index')->with('success', 'Berhasil menghapus data layanan.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getByAjax(Request $request)
    {
        try {
            $id = $request->get('id');
            $layanan = Layanan::findOrFail($id);
            $response = [
                'message' => $layanan ? 'Data ditemukan.' : 'Data tidak ditemukan',
                'layanan' => $layanan
            ];

            return response()->json($response);
        } catch (Exception $e) {
            $message = $e->getMessage();
            $response = [
                'message' => $message,
                'layanan' => null
            ];

            return response()->json($response);
        } catch (QueryException $e) {
            $message = $e->getMessage();
            $response = [
                'message' => $message,
                'layanan' => null
            ];

            return response()->json($response);
        }
    }

    function getListLayanan (Request $request) 
    {
        $layanans = Layanan::select('id', 'nama_layanan')
            ->where('nama_layanan', 'like', '%'. $request->term . '%')
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($layanans, 200);
    }
}
