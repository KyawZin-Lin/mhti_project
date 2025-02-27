<?php

namespace App\Exports;

use App\Models\Admins\Absent;
use App\Models\Admins\Classroom;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAbsentLists implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     //
    // }

    public function view(): View
    {
        return view('admins.attendance_lists.export_absent', [
            // 'cms' => CompanyMembership::all(),
            'absents' => Absent::get(),
            'classrooms' => Classroom::get(),
        ]);
    }
}
