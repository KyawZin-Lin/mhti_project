<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\Admins\AttendanceList;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAttendanceLists implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return AttendanceList::all();
    // }

    public function view(): View
    {
        return view('admins.attendance_lists.export', [
            // 'cms' => CompanyMembership::all(),
            'attendance_lists' => AttendanceList::get(),
        ]);
    }
}
