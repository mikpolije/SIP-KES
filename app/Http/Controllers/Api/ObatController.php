<?php

namespace App\Http\Controllers\Api;

use App\Models\Obat;
use Illuminate\Http\Request;
use App\Models\PembelianObat;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPembelianObat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $data = Obat::select(
            'obat.*',
            DB::raw('"-" as kadaluarsa'),
            DB::raw('0 as stok')
        );

        $search = $request->input('search.value', '');
        if (!empty($search)) {
            $data->where(function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%$search%")
                    ->orWhere('keterangan', 'LIKE', "%$search%");
            });
        }

        $total_data = $data->count();
        $length = intval($request->input('length', 0));
        $start = intval($request->input('start', 0));

        $data = $data->orderBy("id", "desc");
        if (!$length && !$start) {
            $data = $data->get();
        } else {
            $data = $data->skip($start)->take($length)->get();
        }

        return response()->json([
            'message' => 'Data berhasil diambil.',
            'data' => $data,
            'draw' => $request->input('draw'),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
        ], 200);
    }

    public function all(Request $request)
    {
        $search = $request->input('search');
        $length = intval($request->input('length', 10));
        $page = intval($request->input('page', 1));

        $data = Obat::select(
            'obat.*',
            DB::raw('"-" as kadaluarsa'),
            DB::raw('0 as stok')
        );

        if ($search) {
            $data->where('nama', 'LIKE', "%$search%")
                ->orWhere('keterangan', 'LIKE', "%$search%");
        }

        $data = $data->orderBy('id','desc')->paginate($length, ['*'], 'page', $page);

        return response()->json([
            'data' => $data->items(),
            'message' => 'Data berhasil diambil.',
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
            ]
        ], 200);
    }

    public function rincian(Request $request)
    {
        $query = DetailPembelianObat::with(['obat', 'pembelianObat']);

        $search = $request->input('search.value', '');
        if (!empty($search)) {
            $query->whereHas('obat', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%");
            });
        }

        $total_data = $query->count();
        $length = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));

        $data = $query->orderBy('id_obat', 'desc')
            ->skip($start)
            ->take($length)
            ->get()
            ->groupBy('id_obat');

        $formatted = [];
        $totalStokOpname = 0;
        $totalStokGudang = 0;

        foreach ($data as $namaObat => $items) {
            $totalStokOpnamePerObat = 0;
            $totalStokGudangPerObat = 0;

            foreach ($items as $item) {
                $formatted[] = [
                    'nama_obat' => $item->obat->nama ?? '-',
                    'tanggal_kadaluarsa' => \Carbon\Carbon::parse($item->tanggal_kadaluarsa)->format('d/m/Y'),
                    'no_faktur' => $item->pembelianObat->no_faktur ?? '-',
                    'tanggal_faktur' => \Carbon\Carbon::parse($item->pembelianObat->tanggal_faktur)->format('d/m/Y'),
                    'stok_opname' => $item->stok_opname,
                    'stok_gudang' => $item->stok_gudang,
                ];

                $totalStokOpnamePerObat += $item->stok_opname;
                $totalStokGudangPerObat += $item->stok_gudang;
            }

            $formatted[] = [
                'nama_obat' => 'Total ' . $namaObat,
                'tanggal_kadaluarsa' => '',
                'no_faktur' => '',
                'tanggal_faktur' => '',
                'stok_opname' => $totalStokOpnamePerObat,
                'stok_gudang' => $totalStokGudangPerObat,
            ];

            $totalStokOpname += $totalStokOpnamePerObat;
            $totalStokGudang += $totalStokGudangPerObat;
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
            'data' => $formatted,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
            'bentuk_obat' => 'required',
            'harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Terjadi Kesalahan",
                'data' => null,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Obat::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'bentuk_obat' => $request->bentuk_obat,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan.',
            'data' => $data
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data = Obat::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'data' => null
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
            'bentuk_obat' => 'required',
            'harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Terjadi Kesalahan",
                'data' => null,
                'errors' => $validator->errors()
            ], 422);
        }

        $data->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'bentuk_obat' => $request->bentuk_obat,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'message' => 'Data berhasil diubah.',
            'data' => null
        ], 200);
    }

    public function delete(string $id)
    {
        $data = Obat::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'data' => null
            ], 422);
        }

        $data->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus.',
            'data' => null
        ], 200);
    }
}
