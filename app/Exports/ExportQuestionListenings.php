<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\Admins\QuestionListening;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportQuestionListenings implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return QuestionListening::all();
    // }

    public function view(): View
    {
        return view('admins.question_managements.question_listenings.export', [
            // 'cms' => CompanyMembership::all(),
            'questions' => QuestionListening::with('questionCategory','adminUser')->get(),
        ]);
    }
}
