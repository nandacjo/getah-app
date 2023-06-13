<?php

namespace App\Http\Controllers;

use App\Models\Getah;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function dashboard()
    {
        $getahQuery = Getah::query();

        $countData = [
            'total_data' => $getahQuery->count(),
            'jumlah_pohon' => $getahQuery->sum('jml_pohon'),
            'jumlah_target' => $getahQuery->sum('target'),
            'jumlah_realisasi' => $getahQuery->sum('realisasi'),
        ];

        $data = $getahQuery->get();

        return view('dashboard.index', compact('countData', 'data'));
    }
}
