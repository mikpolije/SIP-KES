@extends('layouts.master')
@section('title', 'SIP-Kes | Rawat Inap')

<!--

jadi untuk summed up-nya.
semua yang ada di rawat inap pake mix dari css dan scripts (yang ada di tiap section yg disediakan)
sisanya untuk logic dan layout page pake livewire + volt + pure bootstrap 5

-->

@section('pageContent')
@livewire('rawat-inap.main')
@endsection
