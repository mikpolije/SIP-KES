<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

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
        // $data['listLayanan'] = Layanan::get();
        return view('triase.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
