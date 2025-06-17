<?php

namespace App\Http\Controllers;

use App\Models\DetailKondisi;
use App\Models\ICD;
use App\Models\Layanan;
use App\Models\Obat;
use App\Models\PemeriksaanUgd;
use App\Models\Pendaftaran;
use App\Models\RencanaKontrolUGD;
use App\Models\TransaksiAdlUgd;
use App\Models\TransaksiIcd9Ugd;
use App\Models\TransaksiIcdUgd;
use App\Models\TransaksiLayananUgd;
use App\Models\TransaksiObatUgd;
use App\Models\TransaksiPengkajianRisikoDewasa;
use App\Models\Triase;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class TriageController extends Controller
{
    private $title = 'SIP-Kes | ';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title.'Triase';
        // $data['data'] =
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $noRm = $request->get('no_rm');
        $data['title'] = $this->title.'Triase';

        return view('triase.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            $triase = Triase::where('id', $request->triase_id)->first();
            $pemeriksaanUgd = new PemeriksaanUgd();
            $layananUgd = new TransaksiLayananUgd();
            $pengkajianRisiko = new TransaksiPengkajianRisikoDewasa();
            $adlUgd = new TransaksiAdlUgd();
            $icdUgd = new TransaksiIcdUgd();
            $icd9Ugd = new TransaksiIcd9Ugd();
            $obatUgd = new TransaksiObatUgd();
            $rencanaKontrol = new RencanaKontrolUGD();

            if(!is_null($request->file('laboratorium_farmasi'))) {
                $fileLab = $request->file('laboratorium_farmasi');
                $filename = $fileLab->getClientOriginalName();
                $filepath = public_path().'/upload/laboratorium_farmasi/'.$triase->id;
                if (! File::isDirectory($filepath)) {
                    mkdir($filepath, 493, true);
                }
                $fileLab->move($filepath, $filename);
                $triase->laboratorium_farmasi = $filename;
                $triase->save();
            }

            $pemeriksaanUgd->triase_id = $triase->id;
            $pemeriksaanUgd->keluhan = $request->keluhan;
            $pemeriksaanUgd->sistole = $request->sistole;
            $pemeriksaanUgd->diastole = $request->diastole;
            $pemeriksaanUgd->berat_badan = $request->berat_badan;
            $pemeriksaanUgd->tinggi_badan = $request->tinggi_badan;
            $pemeriksaanUgd->suhu = $request->suhu;
            $pemeriksaanUgd->spo02 = $request->spo2;
            $pemeriksaanUgd->respiration_rate = $request->respiration_rate;
            $pemeriksaanUgd->nadi = $request->nadi;
            $pemeriksaanUgd->plan = $request->plan;
            $pemeriksaanUgd->assesment = $request->assesment;
            $pemeriksaanUgd->alat_bantu = $request->alat_bantu;
            $pemeriksaanUgd->protesa = $request->protesa;
            $pemeriksaanUgd->cacat_tubuh = $request->cacat_tubuh;
            $pemeriksaanUgd->mandiri = $request->mandiri;
            $pemeriksaanUgd->dibantu = $request->dibantu;
            $pemeriksaanUgd->adl = $request->adl;
            $pemeriksaanUgd->ku_dan_kesadaran = $request->ku_dan_kesadaran;
            $pemeriksaanUgd->kepala_dan_leher = $request->kepala_dan_leher;
            $pemeriksaanUgd->dada = $request->dada;
            $pemeriksaanUgd->perut = $request->perut;
            $pemeriksaanUgd->ekstrimitas = $request->ekstrimitas;
            $pemeriksaanUgd->status_lokalis = $request->status_lokalis;
            $pemeriksaanUgd->penatalaksanaan = $request->penatalaksanaan;
            $pemeriksaanUgd->umur_65 = $request->umur_65;
            $pemeriksaanUgd->keterbatasan_mobilitas = $request->keterbatasan_mobilitas;
            $pemeriksaanUgd->perawatan_lanjutan = $request->perawatan_lanjutan;
            $pemeriksaanUgd->bantuan = $request->bantuan;
            $pemeriksaanUgd->masuk_kriteria = $request->masuk_kriteria;
            $pemeriksaanUgd->hasil_pemeriksaan_fisik = $request->hasil_pemeriksaan_fisik;
            $pemeriksaanUgd->penunjang = $request->hasil_pemeriksaan_penunjang;
            $pemeriksaanUgd->hasil_asuhan = $request->hasil_asuhan;
            $pemeriksaanUgd->lain_lain = $request->lain_lain;
            $pemeriksaanUgd->diagnosis = $request->diagnosis;
            $pemeriksaanUgd->rencana_asuhan = $request->rencana_asuhan;
            $pemeriksaanUgd->hasil_pengobatan = $request->hasil_pengobatan;
            $pemeriksaanUgd->keterangan_edukasi = $request->keterangan_edukasi;
            $pemeriksaanUgd->rawat_jalan = $request->rawat_jalan;
            $pemeriksaanUgd->rawat_inap = $request->rawat_inap;
            $pemeriksaanUgd->rujuk = $request->rujuk;
            $pemeriksaanUgd->tanggal_pulang_paksa = $request->tanggal_pulang_paksa;
            $pemeriksaanUgd->meninggal = $request->meninggal;
            $pemeriksaanUgd->kondisi_saat_keluar = $request->kondisi_saat_keluar;
            $pemeriksaanUgd->created_at = now();
            $pemeriksaanUgd->save();

            $adlUgd->triase_id = $triase->id;
            $adlUgd->makan = $request->adl_makan;
            $adlUgd->berpindah = $request->adl_berpindah;
            $adlUgd->kebersihan_diri = $request->adl_kebersihan_diri;
            $adlUgd->aktiivitas_di_toilet = $request->adl_aktivitas_di_toilet;
            $adlUgd->mandi = $request->adl_mandi;
            $adlUgd->berjalan_di_datar = $request->adl_berjalan_di_datar;
            $adlUgd->naik_turun_tangga = $request->adl_naik_turun_tangga;
            $adlUgd->berpakaian = $request->adl_berpakaian;
            $adlUgd->mengontrol_bab = $request->adl_mengontrol_bab;
            $adlUgd->mengontrol_bak = $request->adl_mengontrol_bak;
            $adlUgd->created_at = now();
            $adlUgd->save();

            $pengkajianRisiko->triase_id = $triase->id;
            $pengkajianRisiko->riwayat_jatuh = $request->risiko_riwayat_jatuh;
            $pengkajianRisiko->diagnostik_sekunder = $request->risiko_diagnosa_sekunder;
            $pengkajianRisiko->alat_bantu = $request->risiko_alat_bantu;
            $pengkajianRisiko->terpasang_infuse = $request->risiko_terpasang_infuse;
            $pengkajianRisiko->gaya_berjalan = $request->risiko_gaya_berjalan;
            $pengkajianRisiko->status_mental = $request->risiko_status_mental;
            $pengkajianRisiko->created_at = now();
            $pengkajianRisiko->save();

            if (! is_null($request->get('layanan_id'))) {
                $layanans = [];
                foreach ($request->get('layanan_id') as $key => $item) {
                    array_push($layanans, [
                        'triase_id' => $triase->id,
                        'layanan_id' => $item,
                        'created_at' => now(),
                    ]);
                }

                $layananUgd->insert($layanans);
            }

            if (! is_null($request->get('obat_id'))) {
                $obatsUgd = [];
                foreach ($request->obat_id as $key => $item) {
                    array_push($obatsUgd, [
                        'triase_id' => $triase->id,
                        'obat_id' => $item,
                        'qty' => 1,
                        'created_at' => now(),
                    ]);
                }

                $obatUgd->insert($obatsUgd);
            }

            if (! is_null($request->get('alasan_kontrol'))) {
                $rencanaKontrols = [];
                foreach ($request->alasan_kontrol as $key => $item) {
                    array_push($rencanaKontrols, [
                        'triase_id' => $triase->id,
                        'alasan' => $item,
                        'tanggal' => $request->tanggal_kontrol[$key],
                        'created_at' => now(),
                    ]);
                }

                $rencanaKontrol->insert($rencanaKontrols);
            }

            if (! is_null($request->get('icd_id'))) {
                $icdUgds = [];
                foreach ($request->icd_id as $key => $item) {
                    array_push($icdUgds, [
                        'triase_id' => $triase->id,
                        'icd_id' => $item,
                        'created_at' => now(),
                    ]);
                }

                $icdUgd->insert($icdUgds);
            }

            if (! is_null($request->get('icd9_id'))) {
                $icd9Ugds = [];
                foreach ($request->icd9_id as $key => $item) {
                    array_push($icd9Ugds, [
                        'triase_id' => $triase->id,
                        'icd9_id' => $item,
                        'created_at' => now(),
                    ]);
                }

                $icd9Ugd->insert($icd9Ugds);
            }

            DB::commit();

            return redirect()->route('triase.show', $triase->id)->with('success', 'Berhasil menambahkan data.');
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
        $data['title'] = $this->title.'Outcome Triase';
        $data['data'] = Triase::where('id', $id)
            ->with('pemeriksaan', 'layanan', 'layanan.layanan', 'pengkajianRisiko', 'adl', 'icd', 'icd.icd', 'icd9', 'icd9.icd9', 'obat', 'obat.obat', 'rencanaKontrol')
            ->first();

        // return $data['data'];
        return view('triase.outcome', compact('data'));
    }

    public function printPdf($id)
    {
        $data['title'] = $this->title.'Outcome Triase';
        $data['data'] = Triase::where('id', $id)
            ->with('pemeriksaan', 'pendaftaran', 'pendaftaran.data_pasien', 'pendaftaran.wali_pasien', 'layanan', 'layanan.layanan', 'pengkajianRisiko', 'adl', 'icd', 'icd.icd', 'icd9', 'icd9.icd9', 'obat', 'obat.obat', 'rencanaKontrol')
            ->first();

        $filenamePdf = 'Outcome Triase UGD - '.$data['data']->pendaftaran->data_pasien->nama_lengkap.'.pdf';

        // $pdf = SnappyPdf::loadview('triase.print.print', compact('data'));
        // return $pdf->download($filenamePdf);
        return view('triase.print.print', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storePasien(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            if ($request->get('triase_id') == 0) {
                $triase = new Triase;
            } else {
                $triase = Triase::find($request->get('triase_id'));
            }
            $triase->pendaftaran_id = $request->get('pendaftaran_id');
            $triase->tanggal_masuk = $request->get('tanggal_masuk');
            $triase->sarana_transportasi_kedatangan = $request->get('sarana_transportasi_kedatangan');
            $triase->jam_masuk = $request->get('jam_masuk');
            $triase->kondisi_pasien_tiba = $request->get('kondisi_pasien_tiba');
            $triase->triase = $request->get('triase');
            $triase->riwayat_alergi = $request->get('riwayat_alergi');
            $triase->keluhan = $request->get('keluhan');
            $triase->berat_badan = $request->get('berat_badan');
            $triase->tinggi_badan = $request->get('tinggi_badan');
            $triase->lingkar_perut = $request->get('lingkar_perut');
            $triase->imt = $request->get('imt');
            $triase->nafas = $request->get('nafas');
            $triase->sistol = $request->get('sistol');
            $triase->diastol = $request->get('diastol');
            $triase->suhu = $request->get('suhu');
            $triase->nadi = $request->get('nadi');

            $triase->kepala = strtolower($request->get('kepala'));
            $triase->mata = strtolower($request->get('mata'));
            $triase->tht = strtolower($request->get('tht'));
            $triase->leher = strtolower($request->get('leher'));
            $triase->thorax = strtolower($request->get('thorax'));
            $triase->abdomen = strtolower($request->get('abdomen'));
            $triase->extemitas = strtolower($request->get('extemitas'));
            $triase->genetalia = strtolower($request->get('genetalia'));
            $triase->ecg = strtolower($request->get('ecg'));
            $triase->ronsen = strtolower($request->get('ronsen'));
            $triase->terapi = strtolower($request->get('terapi'));
            $triase->kie = strtolower($request->get('kie'));
            $triase->pemeriksaan_penunjang = strtolower($request->get('pemeriksaan_penunjang'));

            $triase->jalur_nafas = $request->get('jalur_nafas');
            $triase->pola_nafas = $request->get('pola_nafas');
            $triase->gerakan_dada = $request->get('gerakan_dada');
            $triase->kulit = $request->get('kulit');
            $triase->turgor = $request->get('turgor');
            $triase->akral = $request->get('akral');
            $triase->spo = $request->get('spo');
            $triase->kesadaran = $request->get('kesadaran');
            $triase->mata_neurologi = $request->get('mata_neurologi');
            $triase->motorik = $request->get('motorik');
            $triase->verbal = $request->get('verbal');
            $triase->kondisi_umum = $request->get('kondisi_umum');
            $triase->laborat = $request->get('laborat');
            // $triase->laboratorium_farmasi = $request->get('laboratorium_farmasi');
            $triase->aktivitas_fisik = $request->get('aktivitas_fisik');
            $triase->konsumsi_alkohol = $request->get('konsumsi_alkohol');
            $triase->makan_buah_sayur = $request->get('makan_buah_sayur');
            $triase->merokok = $request->get('merokok');
            $triase->riwayat_keluarga = $request->get('riwayat_keluarga');
            $triase->riwayat_penyakit_terdahulu = $request->get('riwayat_penyakit_terdahulu');
            $triase->created_at = now();
            $triase->save();

            DB::commit();

            return response()->json([
                'id' => $triase->id,
                'message' => 'Berhasil menambahkan data',
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['message' => $e->getMessage()]);
        } catch (QueryException $e) {
            DB::rollBack();

            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function getPasien()
    {
        $pendaftaran = Pendaftaran::with('data_pasien', 'wali_pasien')
            ->get();
        // return $pendaftaran;
        return DataTables::of($pendaftaran)
            ->addColumn('nama', function ($data) {
                return $data->data_pasien->nama_lengkap ?? '-';
            })
            ->addColumn('no_rm', function ($data) {
                return $data->no_rm ?? '-';
            })
            ->addColumn('alamat', function ($data) {
                return $data->data_pasien->alamat_pasien ?? '-';
            })
            ->addColumn('tanggal_registrasi', function ($data) {
                return date('d/m/Y', strtotime($data->created_at ?? now()));
            })
            ->addColumn('dokter', function ($data) {
                return $data->wali_pasien->nama_lengkap ?? '-';
            })
            ->addColumn('tipe_pasien', function ($data) {
                return '-';
            })
            ->addColumn('btnAksi', function ($data) {
                return view('triase.actions.button', compact('data'));
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function getListICD(Request $request)
    {
        $type = $request->get('type');
        if ($type == '10') {
            $icds = ICD::select('id', 'display', 'code')
                ->where('display', 'like', '%'.$request->term.'%')
                ->orWhere('code', 'like', '%'.$request->term.'%')
                ->get();
        } else if ($type == '9') {
            $icds = DB::table('icd9')
                ->select('id', 'display', 'code')
                ->where('display', 'like', '%'.$request->term.'%')
                ->orWhere('code', 'like', '%'.$request->term.'%')
                ->get();
        }

        return response()->json($icds, 200);
    }

    public function getObat(Request $request)
    {
        $obats = Obat::select('id', 'nama', 'harga')
            ->where('nama', 'like', '%'.$request->term.'%')
            ->get();

        return response()->json($obats, 200);
    }
}
