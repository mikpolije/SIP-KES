<?php

namespace App\Http\Controllers;

use App\Models\AdlUgd;
use App\Models\DetailKondisi;
use App\Models\KondisiPasien;
use App\Models\Layanan;
use App\Models\Pasien;
use App\Models\ICD;
use App\Models\IcdUgd;
use App\Models\LayananUGD;
use App\Models\Obat;
use App\Models\ObatUGD;
use App\Models\PengkajianRisikoDewasa;
use App\Models\RencanaKontrolUGD;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class TriageController extends Controller
{
    private $title = 'UGD SipKes | ';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title . 'Triase';
        // $data['data'] = 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title . 'Tambah Triase';
        $data['listLayanan'] = Layanan::get();
        return view('triase.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $idPasien = $request->id_pasien;
            $pasien = Pasien::find($idPasien);
            $kondisi = KondisiPasien::where('pasien_id', $pasien->id)->first();
            $detailKondisi = new DetailKondisi();
            $layananUgd = new LayananUGD();
            $pengkajianRisiko = new PengkajianRisikoDewasa();
            $adlUgd = new AdlUgd();
            $icdUgd = new IcdUgd();
            $obatUgd = new ObatUGD();
            $rencanaKontrol = new RencanaKontrolUGD();

            $fileLab = $request->file('laboratorium_farmasi');
            $filename = $fileLab->getClientOriginalName();
            $filepath = public_path() . '/upload/laboratorium_farmasi/'  . $pasien->id;
            if (!File::isDirectory($filepath)) {
                mkdir($filepath, 493, true);
            }
            $fileLab->move($filepath, $filename);
            $kondisi->laboratorium_farmasi = $filename;
            $kondisi->save();

            $detailKondisi->pasien_id = $pasien->id;
            $detailKondisi->keluhan = $request->keluhan;
            $detailKondisi->sistole = $request->sistole;
            $detailKondisi->diastole = $request->diastole;
            $detailKondisi->berat_badan = $request->berat_badan;
            $detailKondisi->tinggi_badan = $request->tinggi_badan;
            $detailKondisi->suhu = $request->suhu;
            $detailKondisi->spo02 = $request->spo2;
            $detailKondisi->respiration_rate = $request->respiration_rate;
            $detailKondisi->nadi = $request->nadi;
            $detailKondisi->plan = $request->plan;
            $detailKondisi->assesment = $request->assesment;
            $detailKondisi->alat_bantu = $request->alat_bantu;
            $detailKondisi->protesa = $request->protesa;
            $detailKondisi->cacat_tubuh = $request->cacat_tubuh;
            $detailKondisi->mandiri = $request->mandiri;
            $detailKondisi->dibantu = $request->dibantu;
            $detailKondisi->adl = $request->adl;
            $detailKondisi->ku_dan_kesadaran = $request->ku_dan_kesadaran;
            $detailKondisi->kepala_dan_leher = $request->kepala_dan_leher;
            $detailKondisi->dada = $request->dada;
            $detailKondisi->perut = $request->perut;
            $detailKondisi->ekstrimitas = $request->ekstrimitas;
            $detailKondisi->status_lokalis = $request->status_lokalis;
            $detailKondisi->penatalaksanaan = $request->penatalaksanaan;
            $detailKondisi->umur_65 = $request->umur_65;
            $detailKondisi->keterbatasan_mobilitas = $request->keterbatasan_mobilitas;
            $detailKondisi->perawatan_lanjutan = $request->perawatan_lanjutan;
            $detailKondisi->bantuan = $request->bantuan;
            $detailKondisi->masuk_kriteria = $request->masuk_kriteria;
            $detailKondisi->hasil_pemeriksaan_fisik = $request->hasil_pemeriksaan_fisik;
            $detailKondisi->penunjang = $request->hasil_pemeriksaan_penunjang;
            $detailKondisi->hasil_asuhan = $request->hasil_asuhan;
            $detailKondisi->lain_lain = $request->lain_lain;
            $detailKondisi->diagnosis = $request->diagnosis;
            $detailKondisi->rencana_asuhan = $request->rencana_asuhan;
            $detailKondisi->hasil_pengobatan = $request->hasil_pengobatan;
            $detailKondisi->keterangan_edukasi = $request->keterangan_edukasi;
            $detailKondisi->rawat_jalan = $request->rawat_jalan;
            $detailKondisi->rawat_inap = $request->rawat_inap;
            $detailKondisi->rujuk = $request->rujuk;
            $detailKondisi->tanggal_pulang_paksa = $request->tanggal_pulang_paksa;
            $detailKondisi->meninggal = $request->meninggal;
            $detailKondisi->kondisi_saat_keluar = $request->kondisi_saat_keluar;
            $detailKondisi->created_at = now();
            $detailKondisi->save();

            $adlUgd->pasien_id = $pasien->id;
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

            $pengkajianRisiko->pasien_id = $pasien->id;
            $pengkajianRisiko->riwayat_jatuh = $request->risiko_riwayat_jatuh;
            $pengkajianRisiko->diagnostik_sekunder = $request->risiko_diagnosa_sekunder;
            $pengkajianRisiko->alat_bantu = $request->risiko_alat_bantu;
            $pengkajianRisiko->terpasang_infuse = $request->risiko_terpasang_infuse;
            $pengkajianRisiko->gaya_berjalan = $request->risiko_gaya_berjalan;
            $pengkajianRisiko->status_mental = $request->risiko_status_mental;
            $pengkajianRisiko->created_at = now();
            $pengkajianRisiko->save();

            if(!is_null($request->get('layanan_id'))) {
                $layanans = [];
                foreach ($request->get('layanan_id') as $key => $item) {
                    array_push($layanans, [
                        'pasien_id' => $pasien->id,
                        'layanan_id' => $item,
                        'created_at' => now()
                    ]);
                }

                $layananUgd->insert($layanans);
            }

            if(!is_null($request->get('obat_id'))) {
                $obatsUgd = [];
                foreach ($request->obat_id as $key => $item) {
                    array_push($obatsUgd, [
                        'pasien_id' => $pasien->id,
                        'obat_id' => $item,
                        'qty' => 1,
                        'created_at' => now()
                    ]);
                }
                
                $obatUgd->insert($obatsUgd);
            }

            if(!is_null($request->get('alasan_kontrol'))) {
                $rencanaKontrols = [];
                foreach ($request->alasan_kontrol as $key => $item) {
                    array_push($rencanaKontrols, [
                        'pasien_id' => $pasien->id,
                        'alasan' => $item,
                        'tanggal' => $request->tanggal_kontrol[$key],
                        'created_at' => now()
                    ]);
                }
                
                $rencanaKontrol->insert($rencanaKontrols);
            }

            if(!is_null($request->get('icd_id'))) {
                $icdUgds = [];
                foreach ($request->icd_id as $key => $item) {
                    array_push($icdUgds, [
                        'pasien_id' => $pasien->id,
                        'icd_id' => $item,
                        'created_at' => now()
                    ]);
                }
                
                $icdUgd->insert($icdUgds);
            }

            DB::commit();
            return redirect()->route('triase.show', $pasien->id)->with('success', 'Berhasil menambahkan data.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = $this->title . 'Outcome Triase';
        $data['data'] = Pasien::where('id', $id)
            ->with('kondisi', 'detail', 'layanan', 'layanan.layanan', 'pengkajianRisiko', 'adl', 'icd', 'icd.icd', 'obat', 'obat.obat', 'rencanaKontrol')
            ->first();
        // return $data['data'];
        return view('triase.outcome', compact('data'));
    }

    public function printPdf($id) 
    {
        $data['title'] = $this->title . 'Outcome Triase';
        $data['data'] = Pasien::where('id', $id)
            ->with('kondisi', 'detail', 'layanan', 'layanan.layanan', 'pengkajianRisiko', 'adl', 'icd', 'icd.icd', 'obat', 'obat.obat', 'rencanaKontrol')
            ->first();
            
        $filenamePdf = 'Outcome Triase UGD - ' . $data['data']->nama . '.pdf';
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

    public function storePasien (Request $request) 
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            if ($request->get('id_pasien') == 0) {
                $pasien = new Pasien;
                $kondisi = new KondisiPasien;
            } else {
                $pasien = Pasien::find($request->get('id_pasien'));
                $kondisi = KondisiPasien::where('pasien_id', $pasien->id)->first();
            }

            $pasien->nama = $request->get('nama_pasien');
            $pasien->usia = $request->get('usia_pasien');
            $pasien->no_jamkes = $request->get('no_jamkes');
            $pasien->nama_penanggung_jawab = $request->get('nama_penanggung_jawab');
            $pasien->save();
            
            $kondisi->pasien_id = $pasien->id;
            $kondisi->tanggal_masuk = $request->get('tanggal_masuk');
            $kondisi->sarana_transportasi_kedatangan = $request->get('sarana_transportasi_kedatangan');
            $kondisi->jam_masuk = $request->get('jam_masuk');
            $kondisi->kondisi_pasien_tiba = $request->get('kondisi_pasien_tiba');
            $kondisi->triase = $request->get('triase');
            $kondisi->riwayat_alergi = $request->get('riwayat_alergi');
            $kondisi->keluhan = $request->get('keluhan');
            $kondisi->berat_badan = $request->get('berat_badan');
            $kondisi->tinggi_badan = $request->get('tinggi_badan');
            $kondisi->lingkar_perut = $request->get('lingkar_perut');
            $kondisi->imt = $request->get('imt');
            $kondisi->nafas = $request->get('nafas');
            $kondisi->sistol = $request->get('sistol');
            $kondisi->diastol = $request->get('diastol');
            $kondisi->suhu = $request->get('suhu');
            $kondisi->nadi = $request->get('nadi');

            $kondisi->kepala = strtolower($request->get('kepala'));
            $kondisi->mata = strtolower($request->get('mata'));
            $kondisi->tht = strtolower($request->get('tht'));
            $kondisi->leher = strtolower($request->get('leher'));
            $kondisi->thorax = strtolower($request->get('thorax'));
            $kondisi->abdomen = strtolower($request->get('abdomen'));
            $kondisi->extemitas = strtolower($request->get('extemitas'));
            $kondisi->genetalia = strtolower($request->get('genetalia'));
            $kondisi->ecg = strtolower($request->get('ecg'));
            $kondisi->ronsen = strtolower($request->get('ronsen'));
            $kondisi->terapi = strtolower($request->get('terapi'));
            $kondisi->kie = strtolower($request->get('kie'));
            $kondisi->pemeriksaan_penunjang = strtolower($request->get('pemeriksaan_penunjang'));

            $kondisi->jalur_nafas = $request->get('jalur_nafas');
            $kondisi->pola_nafas = $request->get('pola_nafas');
            $kondisi->gerakan_dada = $request->get('gerakan_dada');
            $kondisi->kulit = $request->get('kulit');
            $kondisi->turgor = $request->get('turgor');
            $kondisi->akral = $request->get('akral');
            $kondisi->spo = $request->get('spo');
            $kondisi->kesadaran = $request->get('kesadaran');
            $kondisi->mata_neurologi = $request->get('mata_neurologi');
            $kondisi->motorik = $request->get('motorik');
            $kondisi->verbal = $request->get('verbal');
            $kondisi->kondisi_umum = $request->get('kondisi_umum');
            $kondisi->laborat = $request->get('laborat');
            // $kondisi->laboratorium_farmasi = $request->get('laboratorium_farmasi');
            $kondisi->aktivitas_fisik = $request->get('aktivitas_fisik');
            $kondisi->konsumsi_alkohol = $request->get('konsumsi_alkohol');
            $kondisi->makan_buah_sayur = $request->get('makan_buah_sayur');
            $kondisi->merokok = $request->get('merokok');
            $kondisi->riwayat_keluarga = $request->get('riwayat_keluarga');
            $kondisi->riwayat_penyakit_terdahulu = $request->get('riwayat_penyakit_terdahulu');
            $kondisi->created_at = now();
            $kondisi->save();

            DB::commit();
            return response()->json([
                'id' => $pasien->id,
                'message' => 'Berhasil menambahkan data'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()]);
        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    public function getPasien () {
        $pasien = Pasien::with('kondisi')
            ->get();

        return DataTables::of($pasien)
            ->addColumn('nama', function ($data) {
                return $data->nama;
            })
            ->addColumn('no_rm', function ($data) {
                return $data->id;
            })
            ->addColumn('alamat', function ($data) {
                return '-';
            })
            ->addColumn('tanggal_registrasi', function ($data) {
                return date('d/m/Y', strtotime($data->kondisi->tanggal_masuk));
            })
            ->addColumn('dokter', function ($data) {
                return $data->nama_penanggung_jawab;
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

    public function getListICD (Request $request)
    {
        $icds = ICD::select('id', 'display', 'kode_diagnosa')
            ->where('display', 'like', '%'. $request->term . '%')
            ->orWhere('kode_diagnosa', 'like', '%'. $request->term . '%')
            ->get();
        return response()->json($icds, 200);
    }

    public function getObat (Request $request) 
    {
        $obats = Obat::select('id', 'nama', 'harga')
            ->where('nama', 'like', '%'. $request->term . '%')
            ->get();
        return response()->json($obats, 200);
    }
}
