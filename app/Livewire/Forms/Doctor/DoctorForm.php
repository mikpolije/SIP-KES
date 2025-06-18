<?php

namespace App\Livewire\Forms\Doctor;

use App\Models\Dokter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Illuminate\Support\Str;

class DoctorForm extends Form
{
    public Dokter $doctor;

    public $email;

    public $nama;

    public $no_telepon;

    public $alamat;

    public $no_sip;

    public $nip;

    public $gelar_depan;

    public $gelar_belakang;

    public $jadwal_layanan;

    public $ttd;

    protected function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('dokter', 'email')->ignore($this->doctor->id ?? null),
            ],
            'nama' => 'required|max:100',
            'no_telepon' => 'required|max:20',
            'alamat' => 'required|max:100',
            'no_sip' => [
                'required',
                'max:20',
                Rule::unique('dokter', 'no_sip')->ignore($this->doctor->id ?? null),
            ],
            'nip' => 'required|max:20',
            'gelar_depan' => 'required|max:20',
            'gelar_belakang' => 'required|max:20',
            'jadwal_layanan' => 'required|max:100',
            'ttd' => 'required',
        ];
    }

    public function setDoctor(Dokter $doctor)
    {
        $this->doctor = $doctor;
        $this->email = $doctor->email;
        $this->nama = $doctor->nama;
        $this->no_telepon = $doctor->no_telepon;
        $this->alamat = $doctor->alamat;
        $this->no_sip = $doctor->no_sip;
        $this->nip = $doctor->nip;
        $this->gelar_depan = $doctor->gelar_depan;
        $this->gelar_belakang = $doctor->gelar_belakang;
        $this->jadwal_layanan = $doctor->jadwal_layanan;
        $this->ttd = $doctor->ttd;
    }

    public function update()
    {
        $this->validate();
        $uniqueFilename = 'signature-' . $this->doctor->id . '-' . time() . '-' . Str::uuid() . '.png';
        Storage::put('public/signatures/' . $uniqueFilename, base64_decode(Str::of($this->ttd)->after(',')));
        $this->ttd = Storage::url('public/signatures/' . $uniqueFilename);
        $this->doctor->update(
            $this->all()
        );
    }

    public function store()
    {
        $this->validate();
        $uniqueFilename = 'signature-' . time() . '-' . Str::uuid() . '.png';
        Storage::put('public/signatures/' . $uniqueFilename, base64_decode(Str::of($this->ttd)->after(',')));
        $this->ttd = Storage::url('public/signatures/' . $uniqueFilename);
        Dokter::create($this->all());
    }
}
