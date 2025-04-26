<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendafataranController extends Controller
{
    public function index()
    {
        return view('main.pendaftaran');
    }
}
