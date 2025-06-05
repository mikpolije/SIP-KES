<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IcdController extends Controller
{
    public function icd10(Request $request)
    {
        $search = $request->icd10;

        $icd10 = DB::table('icd10')->when($search, function ($query) use ($search) {
            return $query->where('code', 'like', '%' . $search . '%');
        })->get();

        return response()->json([
            'message' => 'success',
            'data' => $icd10
        ]);
    }

    public function icd9(Request $request)
    {
        $search = $request->icd9;

        $icd9 = DB::table('icd9')->when($search, function ($query) use ($search) {
            return $query->where('code', 'like', '%' . $search . '%');
        })->get();

        return response()->json([
            'message' => 'success',
            'data' => $icd9
        ]);
    }
}
