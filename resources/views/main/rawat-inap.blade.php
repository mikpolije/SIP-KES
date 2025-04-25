@extends('layouts.master', ['hideLogo' => true])
@section('title', 'SIP-Kes | Rawat Inap')

<!--

jadi untuk summed up-nya.
semua yang ada di rawat inap pake
livewire + volt + pure bootstrap 5

-->

@section('pageContent')
@livewire('rawat-inap.index')
@endsection
