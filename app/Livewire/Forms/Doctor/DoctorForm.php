<?php

namespace App\Livewire\Forms\Doctor;

use App\Models\Master\Doctor;
use Illuminate\Validation\Rule;
use Livewire\Form;

class DoctorForm extends Form
{
    public Doctor $doctor;

    public $email;

    public $nama;

    public $no_telepon;

    public $alamat;

    public $no_sip;

    public $nip;

    public $gelar_depan;

    public $gelar_belakang;

    public $jadwal_layanan;

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
        ];
    }

    public function setDoctor(Doctor $doctor)
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
    }

    public function update()
    {
        $this->validate();
        $this->doctor->update([
            $this->all(),
        ]);
    }

    public function store()
    {
        $this->validate();
        Doctor::create($this->all());
    }
}
