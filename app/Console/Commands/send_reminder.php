<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Console\Command;

class send_reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */


    protected $signature = 'schedule:routine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Routine appointment Reminded';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $staffs = Staff::select('email','full_name','appointment_token','next_reminder')->where('next_reminder', '>', Carbon::now()->startOfMonth())
                ->where('next_reminder', '<', Carbon::now()->endOfMonth())
                ->get();
                foreach($staffs as $staff){
                    $email = $staff->email;
                    $next_reminder = $staff->next_reminder;
                    $full_name = $staff->full_name;
                    $appointment_token = $staff->appointment_token;
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\ReminderMail($email, $full_name,$next_reminder,$appointment_token));
                }
            echo "running";
        return Command::SUCCESS;
    }
}
