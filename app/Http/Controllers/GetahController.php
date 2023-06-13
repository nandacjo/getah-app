<?php

namespace App\Http\Controllers;

use App\Models\Getah;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateGetah;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GetahExport;

class GetahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getahList = Getah::orderByDesc('id')
            ->when($request->date_from, function ($query) use ($request) {
                // where between date
                $query->whereBetween('tanggal', [$request->date_from, $request->date_to]);
            })
            ->get();

        return view('dashboard.getah_list.index', compact('getahList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.getah_list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateGetah $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        if ($request->hasFile('foto_keterangan')) {
            $fileName = time() . '.' . $request->foto_keterangan->extension();
            $validated['foto_keterangan'] = $fileName;

            // move file
            $request->foto_keterangan->move(public_path('uploads/images'), $fileName);
        }

        $getah = Getah::create($validated);

        return redirect(route('getah-list.index'))->with('success', 'Getah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Getah::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getah = Getah::findOrFail($id);

        return view('dashboard.getah_list.edit', compact('getah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateGetah $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $getah = Getah::findOrFail($id);

        $validated['foto_keterangan'] = $getah->foto_keterangan;

        if ($request->hasFile('foto_keterangan')) {
            $fileName = time() . '.' . $request->foto_keterangan->extension();
            $validated['foto_keterangan'] = $fileName;

            // move file
            $request->foto_keterangan->move(public_path('uploads/images'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/images/' . $getah->foto_keterangan);
            if (file_exists($oldPath) && $getah->foto_keterangan != 'foto_keterangan.png') {
                unlink($oldPath);
            }
        }

        $getah->update($validated);

        return redirect(route('getah-list.index'))->with('success', 'Getah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getah = Getah::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/images/' . $getah->foto_keterangan);
        if (file_exists($oldPath) && $getah->foto_keterangan != 'foto_keterangan.png') {
            unlink($oldPath);
        }
        $getah->delete();

        return redirect(route('getah-list.index'))->with('success', 'Getah berhasil dihapus.');
    }

    public function printPDF(Request $request)
    {
        $getahList = Getah::orderByDesc('id')
            ->when($request->date_from, function ($query) use ($request) {
                // where between date
                $query->whereBetween('tanggal', [$request->date_from, $request->date_to]);
            })
            ->get();

        $customPaper = array(0, 0, 1000.00, 500.80);
        $pdf = \PDF::loadView('dashboard.getah_list.print_pdf', compact('getahList'))->setPaper($customPaper, 'potrait');
        return $pdf->download('getah_list.pdf');
    }

    public function printExcel(Request $request)
    {
        if ($request->has('date_from') && $request->has('date_to')) {
            return \Excel::download(new GetahExport($request->date_from, $request->date_to), 'daftar_getah.xlsx');
        }
        return \Excel::download(new GetahExport(null, null), 'daftar_getah.xlsx');
    }
}
