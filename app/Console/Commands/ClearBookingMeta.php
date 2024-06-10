<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Admin\MetaBooking;

class ClearBookingMeta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:bookingmeta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clear booking meta table every five minutes';

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
        $date = Carbon::now()->subMinute(5)->format('Y-m-d H:i');

        $request = MetaBooking::where( 'created_at', '<=', $date)->delete();

       $this->info('Meta Booking cleard ');   
    }
}
