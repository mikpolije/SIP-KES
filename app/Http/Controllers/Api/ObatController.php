<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailPembelianObat;
use App\Models\DetailPengambilanObat;
use App\Models\Obat;
use App\Models\PembelianObat;
use App\Models\Pendaftaran;
use App\Models\PengambilanObat;
use App\Models\Racikan;
use App\Models\RiwayatStokObat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $data = Obat::select(
            'obat.*',More actions
            DB::raw('(CASE WHEN (SELECT SUM(stok_opname) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) IS NULL THEN 0 ELSE (SELECT SUM(stok_opname) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) END) as stok_opname'),
            DB::raw('(CASE WHEN (SELECT SUM(stok_gudang) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) IS NULL THEN 0 ELSE (SELECT SUM(stok_gudang) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) END) as stok_gudang'),
        );

        $search = $request->input('search.value', '');
        if (! empty($search)) {
            $data->where(function ($query) use ($search) {
               $query->where('nama', 'LIKE', "%$search%");
            });
        }

        $total_data = $data->count();
        $length = intval($request->input('length', 0));
        $start = intval($request->input('start', 0));

        $data = $data->orderBy('id_obat', 'desc');
        if (! $length && ! $start) {
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
            DB::raw("(CASE WHEN (SELECT MIN(tanggal_kadaluarsa) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) IS NULL THEN '-' ELSE (SELECT MIN(tanggal_kadaluarsa) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) END) as kadaluarsa"),
            DB::raw('(CASE WHEN (SELECT SUM(stok_opname) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) IS NULL THEN 0 ELSE (SELECT SUM(stok_opname) FROM detail_pembelian_obat WHERE id_obat = obat.id_obat) END) as stok')
        );
        
        if ($search) {
           $data->where('nama', 'LIKE', "%$search%");
        }

        $data = $data->orderBy('id_obat', 'desc')->paginate($length, ['*'], 'page', $page);

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
            ],
        ], 200);
    }

    public function rincian(Request $request)
    {
        $query = DetailPembelianObat::with(['obat', 'pembelian_obat']);

        $search = $request->input('search.value', '');
        if (! empty($search)) {
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

    public function detailPembelian(Request $request)
    {
        $query = DetailPembelianObat::with(['obat', 'pembelian_obat']);

        $search = $request->input('search', '');
        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('obat', function ($q2) use ($search) {
                    $q2->where('nama', 'LIKE', "%$search%");
                })
                    ->orWhereRaw("CONCAT('Exp ', tanggal_kadaluarsa, ' ~ Stok ', stok_opname) LIKE ?", ["%$search%"]);
            });
        }

        $total_data = $query->count();

        $length = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));

        $records = $query->orderBy('id_obat', 'asc')
            ->skip($start)
            ->take($length)
            ->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
            'data' => $records,
        ]);
    }

    public function koreksi(Request $request, $id)
    {
        $data = DetailPembelianObat::find($id);

        if (! $data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'data' => null,
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
                'message' => 'Terjadi Kesalahan',
                'data' => null,
                'errors' => $validator->errors(),
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
            'message' => 'Berhasil melakukan koreksi obats.',
            'data' => $data,
        ], 200);
    }

    public function akanKadaluarsa(Request $request)
    {
        $query = DetailPembelianObat::with(['obat', 'pembelian_obat'])
            ->whereBetween('tanggal_kadaluarsa', [Carbon::now(), Carbon::now()->addDays(7)]);

        $search = $request->input('search.value', '');
        if (! empty($search)) {
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
        if (! empty($search)) {
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

        if (! $data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'data' => null,
            ], 422);
        }

        $data->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus.',
            'data' => null,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer',
            'tanggal_kadaluwarsa' => 'required|date',
            'bentuk_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Terjadi Kesalahan',
                'data' => null,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Obat::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluwarsa,
            'bentuk_obat' => $request->bentuk_obat,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan.',
            'data' => $data,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data = Obat::find($id);

        if (! $data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'data' => null,
            ], 422);
        }

        $validator = Validator::make($request->all(), [
             'nama' => 'required|string|max:255',
            'stok' => 'required|integer',
            'tanggal_kadaluwarsa' => 'required|date',
            'bentuk_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Terjadi Kesalahan',
                'data' => null,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->update([
            'nama' => $request->nama,
             'stok' => $request->stok,
            'tanggal_kadaluwarsa' => $request->tanggal_kadaluwarsa,
            'bentuk_obat' => $request->bentuk_obat,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'message' => 'Data berhasil diubah.',
            'data' => null,
        ], 200);
    }

    public function delete(string $id)
    {
        $data = Obat::find($id);

        if (! $data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'data' => null,
            ], 422);
        }

        $data->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus.',
            'data' => null,
        ], 200);
    }

    public function rincianStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_faktur' => 'required|string',
            'tanggal_faktur' => 'required|date',

            'id_obat' => 'required|array',
            'id_obat.*' => 'required|exists:obat,id_obat',
                                     
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

    public function pengambilan(Request $request, $id)
    {
        $data = Pendaftaran::with('pengambilan_obat.detail_pengambilan_obat.detail_pembelian_obat.obat')->where('id_pendaftaran', $id)->first();

        if (! $data) {
            return response()->json([
                'message' => 'Data tidak ditemukan atau tidak valid.',
                'data' => null,
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'no_antrian' => 'required|string',
            'tanggal_penyerahan' => 'required|date',
            'catatan' => 'required|string',
            'id_detail_pembelian_obat' => 'required|array',
            'id_detail_pembelian_obat.*' => 'required|exists:detail_pembelian_obat,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|numeric|min:0',
            'harga' => 'required|array',
            'harga.*' => 'required|numeric|min:0',
            'tanggal' => 'required|array',
            'tanggal.*' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();
        try {
            if ($data->pengambilan_obat && $data->pengambilan_obat->detail_pengambilan_obat) {
                foreach ($data->pengambilan_obat->detail_pengambilan_obat() as $value) {
                    DetailPembelianObat::find($value->id_detail_pembelian_obat)->increment('stok_gudang', $value->jumlah);
                }
                $data->pengambilan_obat->detail_pengambilan_obat()->delete();
            }

            $pengambilanObat = PengambilanObat::updateOrCreate(
                ['id_pendaftaran' => $id],
                [
                    'no_antrian' => $request->no_antrian,
                    'tanggal_penyerahan' => $request->tanggal_penyerahan,
                    'catatan' => $request->catatan,
                ]
            );

            foreach ($request->id_detail_pembelian_obat as $index => $obatId) {
                $obat = DetailPembelianObat::find($obatId);
                $obat->decrement('stok_gudang', $request->jumlah[$index]);

                DetailPengambilanObat::create([
                    'id_pengambilan_obat' => $pengambilanObat->id,
                    'id_detail_pembelian_obat' => $obat->id,
                    'jumlah' => $request->jumlah[$index],
                    'harga' => $request->harga[$index],
                    'tanggal' => $request->tanggal[$index],
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
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    public function racikan(Request $request, $id)
    {
        $data = Pendaftaran::with('pengambilan_obat.racikan')->where('id_pendaftaran', $id)->first();

        if (! $data) {
            return response()->json([
                'message' => 'Data tidak ditemukan atau tidak valid.',
                'data' => null,
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'no_antrian' => 'required|string',
            'tanggal_penyerahan' => 'required|date',
            'catatan' => 'required|string',
            'id_detail_pembelian_obat' => 'required|array',
            'id_detail_pembelian_obat.*' => 'required|exists:detail_pembelian_obat,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|numeric|min:0',
            'harga' => 'required|array',
            'harga.*' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();
        try {
            if ($data->pengambilan_obat && $data->pengambilan_obat->racikan) {
                $data->pengambilan_obat->racikan()->delete();
            }

            $pengambilanObat = PengambilanObat::updateOrCreate(
                ['id_pendaftaran' => $id],
                [
                    'no_antrian' => $request->no_antrian,
                    'tanggal_penyerahan' => $request->tanggal_penyerahan,
                    'catatan' => $request->catatan,
                ]
            );

            foreach ($request->id_detail_pembelian_obat as $index => $obatId) {
                Racikan::create([
                    'id_pengambilan_obat' => $pengambilanObat->id,
                    'id_detail_pembelian_obat' => $obatId,
                    'jumlah' => $request->jumlah[$index],
                    'harga' => $request->harga[$index],
                    'tanggal' => date('Y-m-d'),
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
                'data' => $e->getMessage(),
            ], 500);
        }
    }
}
