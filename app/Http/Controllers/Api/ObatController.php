<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Obat;
use Illuminate\Http\Request;
use App\Models\PembelianObat;
use App\Models\RiwayatStokObat;
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
        $query = DetailPembelianObat::with(['obat', 'pembelian_obat']);

        $search = $request->input('search.value', '');
        if (!empty($search)) {
            $query->whereHas('obat', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%");
            });
        }

        $total_data = $query->count();

        $length = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));

        $records = $query->orderBy('id_obat', 'asc')
            ->skip($start)
            ->take($length)
            ->get()
            ->groupBy('id_obat');

        $result = [];
        foreach ($records as $id_obat => $items) {
            $firstItem = $items->first();
            $namaObat = $firstItem->obat->nama ?? '-';

            $details = $items->map(function ($item) {
                return [
                    'id_detail_pembelian_obat' => $item->id,
                    'tanggal_kadaluarsa' => \Carbon\Carbon::parse($item->tanggal_kadaluarsa)->format('d/m/Y'),
                    'no_faktur' => $item->pembelian_obat->no_faktur ?? '-',
                    'tanggal_faktur' => \Carbon\Carbon::parse($item->pembelian_obat->tanggal_faktur)->format('d/m/Y'),
                    'stok_opname' => $item->stok_opname,
                    'stok_gudang' => $item->stok_gudang,
                ];
            })->values();

            if ($details->count() > 0) {
                $result[] = [
                    'id_obat' => $id_obat,
                    'nama_obat' => $namaObat,
                    'details' => $details,
                ];
            }
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
            'data' => $result,
        ]);
    }

    public function koreksi(Request $request, $id)
    {
        $data = DetailPembelianObat::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'data' => null
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'tanggal_koreksi' => 'required|date',
            'stok_opname_baru' => 'required|numeric',
            'stok_gudang_baru' => 'required|numeric',
            'alasan_koreksi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Terjadi Kesalahan",
                'data' => null,
                'errors' => $validator->errors()
            ], 422);
        }

        if ($data->stok_opname != $request->stok_opname_baru) {
            RiwayatStokObat::create([
                'id_obat' => $data->id_obat,
                'id_detail_pembelian_obat' => $id,
                'tanggal' => $request->tanggal_koreksi,
                'jenis_transaksi' => 'koreksi',
                'jumlah' => $request->stok_opname_baru - $data->stok_opname,
                'dari_lokasi' => 'opname',
                'ke_lokasi' => null,
                'keterangan' => $request->alasan_koreksi,
            ]);
        }

        if ($data->stok_gudang != $request->stok_gudang_baru) {
            RiwayatStokObat::create([
                'id_obat' => $data->id_obat,
                'id_detail_pembelian_obat' => $id,
                'tanggal' => $request->tanggal_koreksi,
                'jenis_transaksi' => 'koreksi',
                'jumlah' => $request->stok_gudang_baru - $data->stok_gudang,
                'dari_lokasi' => 'gudang',
                'ke_lokasi' => null,
                'keterangan' => $request->alasan_koreksi,
            ]);
        }

        $data->update([
            'stok_opname' => $request->stok_opname_baru,
            'stok_gudang' => $request->stok_gudang_baru,
        ]);

        return response()->json([
            'message' => 'Berhasil melakukan koreksi obat.',
            'data' => $data
        ], 200);
    }

    public function akanKadaluarsa(Request $request)
    {
        $query = DetailPembelianObat::with(['obat', 'pembelian_obat'])
            ->whereBetween('tanggal_kadaluarsa', [Carbon::now(), Carbon::now()->addDays(7)]);

        $search = $request->input('search.value', '');
        if (!empty($search)) {
            $query->whereHas('obat', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%");
            });
        }

        $total_data = $query->count();

        $length = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));

        $data = $query->orderBy('id_obat', 'asc')
            ->skip($start)
            ->take($length)
            ->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
            'data' => $data,
        ]);
    }

    public function kadaluarsa(Request $request)
    {
        $query = DetailPembelianObat::with(['obat', 'pembelian_obat'])
            ->where('tanggal_kadaluarsa', '<', Carbon::now());

        $search = $request->input('search.value', '');
        if (!empty($search)) {
            $query->whereHas('obat', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%");
            });
        }

        $total_data = $query->count();

        $length = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));

        $data = $query->orderBy('id_obat', 'asc')
            ->skip($start)
            ->take($length)
            ->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
            'data' => $data,
        ]);
    }

    public function hapusObatKadaluarsa(string $id)
    {
        $data = DetailPembelianObat::find($id);

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

    public function rincianStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_faktur' => 'required|string',
            'tanggal_faktur' => 'required|date',

            'id_obat' => 'required|array',
            'id_obat.*' => 'required|exists:obat,id',

            'tanggal_kadaluarsa' => 'required|array',
            'tanggal_kadaluarsa.*' => 'required|date',

            'stok_opname' => 'required|array',
            'stok_opname.*' => 'required|numeric|min:0',

            'stok_gudang' => 'required|array',
            'stok_gudang.*' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();
        try {
            $faktur = PembelianObat::create([
                'no_faktur' => $request->no_faktur,
                'tanggal_faktur' => $request->tanggal_faktur,
            ]);

            foreach ($request->id_obat as $index => $obatId) {
                DetailPembelianObat::create([
                    'id_pembelian_obat' => $faktur->id,
                    'id_obat' => $obatId,
                    'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa[$index],
                    'stok_opname' => $request->stok_opname[$index],
                    'stok_gudang' => $request->stok_gudang[$index],
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Data berhasil disimpan.',
                'data' => null,
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'data' => null,
            ], 500);
        }
    }
}
