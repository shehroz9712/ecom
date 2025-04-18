<?php

namespace App\Jobs;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DeleteGuestUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Get the current time minus 7 days
        $sevenDaysAgo = Carbon::now()->subDays(7);

        // Find guest users that are older than 7 days
        $guestUsers = User::where('email', 'like', '%@guest.com')
            ->where('created_at', '<', $sevenDaysAgo)
            ->get();

        foreach ($guestUsers as $user) {
            $user->delete();
        }
    }
}
