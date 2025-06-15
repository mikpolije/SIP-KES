@extends('layouts.master')

@section('title', 'SIP-Kes - Laporan 10 Besar Penyakit')

@section('pageContent')
<div class="container">
        <h1 class="title">LAPORAN KUNJUNGAN</h1>

        <div class="row">
            <div class="col-half">
                <div class="card">
                    <div class="filter-header">
                        <button class="btn btn-blue">10 Besar Penyakit</button>
                        <button class="btn btn-gray">Laporan Kunjungan</button>
                    </div>
	 <!-- Form Section -->
			</div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
				<label class="form-label" for="Tanggal">Tanggal </label>
                                    <input type="Date" class="tanggal" placeholder="DD/MM/YYYY"><span>s/d</span>
				    <input type="Date" class=:tanggal" placeholder="DD/MM/YYYY">
			      </div>
                            </div>
				<div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Dokter">Dokter</label>
                                            <select class="form-select required" id="Dokter"
                                                name="dokter">
                                                <option value="dr. Jenie">dr. Jenie</option>
                                                <option value="dr. Jisoo">dr. Jisoo</option>
                                            </select>
                                        </div>
                                    </div>

      <!-- Cara Bayar -->
				</div>
				    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Cara Bayar">Cara Bayar</label>
                                            <select class="form-select required" id="Cara Bayar"
                                                name="carabayar">
                                                <option value="Umum">Umum</option>
                                                <option value="BPJS">BPJS</option>
						<option value="Asuransi">Asuransi</option>
                                            </select>
                                        </div>
                                    </div>
      <!-- Buttons -->
      <div class="row">
            <div class="col-half">
                <div class="card">
                    <div class="filter-header">
                        <button class="btn btn-blue">Tampilkan</button>
                        <button class="btn btn-yellow">Download</button>
                    </div>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
