<?php

namespace App\Exports;

use App\Models\Admins\Student;
use App\Models\Admins\Question;
use Illuminate\Contracts\View\View;
use App\Models\Admins\QuestionAnswer;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuestionReadingsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Question::all();
    // }

    public function view(): View
    {
        return view('admins.question_managements.questions.export', [
            // 'cms' => CompanyMembership::all(),
            'questions' => Question::with('questionCategory','adminUser')->get(),
            'q_answers' => QuestionAnswer::get(),
        ]);
    }
}
