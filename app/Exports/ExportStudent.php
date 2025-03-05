<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStudent implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $students;

    public function __construct( $students)
    {
        $this->students = $students;
    }

    public function view(): View
    {
        return view('admins.students.export', [
            // 'cms' => CompanyMembership::all(),
            'students' => $this->students,
        ]);
    }
}
