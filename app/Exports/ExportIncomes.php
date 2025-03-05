<?php

namespace App\Exports;

use App\Models\Admins\Income;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportIncomes implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Income::all();
    // }

    protected $incomes;

    public function __construct( $incomes)
    {
        $this->incomes = $incomes;
    }

    public function view(): View
    {
        return view('admins.finances.incomes.export', [
            // 'cms' => CompanyMembership::all(),
            'incomes' => $this->incomes,
        ]);
    }
}
