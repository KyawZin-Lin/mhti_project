<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Admins\Expend;
use Illuminate\Console\Command;

class ExpenseDeleteCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expensedelete:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expense Delete';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Cron Job running at ". now());

        Expend::where('date', '<', Carbon::now()->subDays(7))
                ->delete();

        // return back()->with('success','Auto Delete Successfully.');
    }
}
