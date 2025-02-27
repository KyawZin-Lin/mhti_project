<?php

namespace App\Exports;

use App\Models\Admins\Expend;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExpends implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Expend::all();
    // }

    public function view(): View
    {
        return view('admins.finances.expends.export', [
            // 'cms' => CompanyMembership::all(),
            'expends' => Expend::with('teacher','adminUser')->get(),
        ]);
    }
}
