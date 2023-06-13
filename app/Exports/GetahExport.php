<?php

namespace App\Exports;

use App\Models\Getah;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class GetahExport implements FromView
{
    use Exportable;

    public function __construct($dateFrom, $dateTo)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    public function view(): \Illuminate\Contracts\View\View
    {
        return view('dashboard.getah_list.print_pdf', [
            'getahList' => Getah::orderByDesc('id')
                ->when($this->dateFrom, function ($query) {
                    // where between date
                    $query->whereBetween('tanggal', [$this->dateFrom, $this->dateTo]);
                })
                ->get()
        ]);
    }
}

