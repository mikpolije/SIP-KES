<?php

return [
    'attributes' => [
        'id_obat.*' => 'obat ke-:position',
        'tanggal_kadaluarsa.*' => 'tanggal kadaluarsa ke-:position',
        'stok_opname.*' => 'stok opname ke-:position',
        'stok_gudang.*' => 'stok gudang ke-:position',
    ],
    'required' => ':attribute harus diisi.',
    'max' => [
        'string' => 'Panjang :attribute maksimal :max karakter.',
        'integer' => 'Panjang :attribute maksimal :max karakter.',
    ],
    'min' => [
        'string' => 'Panjang :attribute minimal :min karakter.',
        'integer' => 'Panjang :attribute minimal :min karakter.',
    ],
    'integer' => ':attribute harus berupa angka yang valid.',
    'numeric' => ':attribute harus berupa angka yang valid.',
    'digits_between' => 'Panjang :attribute harus antara :min dan :max karakter.',
    'digits' => 'Panjang :attribute harus :digits karakter.',
    'in' => ':attribute tidak ditemukan/tidak sesuai.',
    'exists' => ':attribute tidak ditemukan/tidak sesuai.',
    'regex' => ':attribute harus mengandung minimal satu huruf kecil, satu huruf besar, dan satu angka.',
    'email' => ':attribute harus berupa email yang valid.',
    'confirmed' => 'Password dan konfirmasi password tidak sama.',
    'boolean' => ':attribute harus berupa 0 atau 1.',
    'after_or_equal' => ':attribute harus setelah atau sama dengan :date.',
];
